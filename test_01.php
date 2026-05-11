<?php

$url = "UG.html";

// Load HTML
$html = file_get_contents($url);

libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

// Find all h4 headings
$headings = $xpath->query('//div[@class="dw-content"]//h4');

$csvFile = fopen("exam_papers.csv", "w");

// CSV Header
fputcsv($csvFile, ['Category', 'Exam Name', 'PDF Name', 'PDF Link']);

foreach ($headings as $heading) {

    $category = trim($heading->textContent);

    // Get next table after heading
    $table = $xpath->query('./following-sibling::div[1]//table', $heading)->item(0);

    if (!$table) {
        continue;
    }

    // Get rows
    $rows = $xpath->query('.//tr', $table);

    foreach ($rows as $row) {

        $examName = trim($xpath->query('./td[1]', $row)->item(0)?->textContent);

        // Multiple PDFs may exist in one td
        $links = $xpath->query('./td[2]//a', $row);

        foreach ($links as $link) {

            $pdfName = trim($link->textContent);

            $href = $link->getAttribute('href');

            // Convert relative URL to absolute
            $pdfLink = "https://gmcsurat.edu.in" . $href;

            fputcsv($csvFile, [
                $category,
                $examName,
                $pdfName,
                $pdfLink
            ]);
        }
    }
}

fclose($csvFile);

echo "CSV file created successfully!";
?>