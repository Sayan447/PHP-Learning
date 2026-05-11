<?php

// libxml_use_internal_errors(true);

// $html = file_get_contents("PG.html");

// $dom = new DOMDocument();
// $dom->loadHTML($html);

// $xpath = new DOMXPath($dom);

// // Get all tables
// $tables = $xpath->query('//div[@class="table-responsive"]/table');

// $csv = fopen("pg_exam_papers.csv", "w");

// // CSV Header
// fputcsv($csv, ['Category', 'Subject', 'PDF Name', 'PDF Link']);

// foreach ($tables as $table) {

//     // Get heading from <th>
//     $headingNode = $xpath->query('.//thead/tr/th', $table)->item(0);

//     if ($headingNode) {
//         $category = trim($headingNode->textContent);
//     } else {

//         // Fallback for tables without <thead>
//         $firstTd = $xpath->query('.//tr[1]/td[1]', $table)->item(0);

//         $category = $firstTd
//             ? trim($firstTd->textContent)
//             : 'Unknown';
//     }

//     // Get all rows
//     $rows = $xpath->query('.//tr', $table);

//     foreach ($rows as $row) {

//         // Skip heading row
//         if ($xpath->query('.//th', $row)->length > 0) {
//             continue;
//         }

//         // Get all TDs
//         $tds = $xpath->query('./td', $row);

//         foreach ($tds as $td) {

//             // Subject name
//             $subject = trim($td->textContent);

//             // Find all PDFs inside TD
//             $links = $xpath->query('.//a', $td);

//             foreach ($links as $link) {

//                 $pdfName = trim($link->textContent);

//                 $href = $link->getAttribute('href');

//                 $pdfLink = "https://gmcsurat.edu.in" . $href;

//                 // Previous TD as subject
//                 $prevTd = $td->previousSibling;

//                 while ($prevTd && $prevTd->nodeType != XML_ELEMENT_NODE) {
//                     $prevTd = $prevTd->previousSibling;
//                 }

//                 $subjectName = $prevTd
//                     ? trim($prevTd->textContent)
//                     : $subject;

//                 fputcsv($csv, [
//                     $category,
//                     $subjectName,
//                     $pdfName,
//                     $pdfLink
//                 ]);
//             }
//         }
//     }
// }

// fclose($csv);

// echo "CSV Created Successfully";


// ==-======================================================











libxml_use_internal_errors(true);

$html = file_get_contents("PG.html");

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

// Get all tables
$tables = $xpath->query('//div[@class="table-responsive"]/table');

$csv = fopen("pg_exam.csv", "w");

// CSV Header
fputcsv($csv, ['Category', 'Subject', 'PDF Name', 'PDF Link']);

foreach ($tables as $table) {

    // Get heading from <th>
    $headingNode = $xpath->query('.//thead/tr/th', $table)->item(0);

    if ($headingNode) {
        $category = trim($headingNode->textContent);
    } else {

        // Fallback for tables without <thead>
        $firstTd = $xpath->query('.//tr[1]/td[1]', $table)->item(0);

        $category = $firstTd
            ? trim($firstTd->textContent)
            : null;
    }

    // Get all rows
    $rows = $xpath->query('.//tr', $table);

    foreach ($rows as $row) {

        // Skip heading row
        if ($xpath->query('.//th', $row)->length > 0) {
            continue;
        }

        // Get all TDs
        $tds = $xpath->query('./td', $row);

        foreach ($tds as $td) {

            // Find all PDFs inside TD
            $links = $xpath->query('.//a', $td);

            foreach ($links as $link) {

                $pdfName = trim($link->textContent);

                $href = $link->getAttribute('href');

                $pdfLink = "https://gmcsurat.edu.in" . $href;

                // Get previous TD
                $prevTd = $td->previousSibling;

                while ($prevTd && $prevTd->nodeType != XML_ELEMENT_NODE) {
                    $prevTd = $prevTd->previousSibling;
                }

                // Subject name handling
                $subjectName = null;

                if ($prevTd) {

                    $tempSubject = trim($prevTd->textContent);

                    // If previous td has no links and has text
                    if (!empty($tempSubject) && $xpath->query('.//a', $prevTd)->length == 0) {
                        $subjectName = $tempSubject;
                    }
                }

                fputcsv($csv, [
                    $category ?: null,
                    $subjectName,
                    $pdfName ?: null,
                    $pdfLink ?: null
                ]);
            }
        }
    }
}

fclose($csv);

echo "CSV Created Successfully";





?>