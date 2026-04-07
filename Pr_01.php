<?php
function cURL($url)
{
    $curl_options = [
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_USERAGENT => "Mozilla/5.0"
    ];

    $curl = curl_init($url);
    curl_setopt_array($curl, $curl_options);

    $response = curl_exec($curl);
    if ($response === false) {
        echo "Error: " . curl_error($curl);
        curl_close($curl);
        return '';
    }

    curl_close($curl);
    return $response;
}

$url = "https://www.wipo.int/en/web/standards/part_03_standards";
$html = cURL($url);

// Save HTML locally (optional)
file_put_contents('output.txt', $html);

// Load HTML
$html = file_get_contents('output.txt');
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXpath($dom);
$base = "https://www.wipo.int/en/web/standards/part_03_standards";

$data = [];


$rows = $xpath->query("//tr[td[2][starts-with(normalize-space(), 'ST.')]]");

foreach ($rows as $row) {
    $cells = $row->getElementsByTagName("td");
    if ($cells->length < 2) continue;

    $standard = trim($cells->item(0)->textContent);
    if ($standard === '' || strpos($standard, 'ST.') !== 0) continue;

    $titleCell = $cells->item(1);
    $latestUpdate = trim($cells->item($cells->length - 1)->textContent);

    // Main link and title
    $firstLink = $titleCell->getElementsByTagName("a")->item(0);
    $title = $firstLink ? trim($firstLink->textContent) : '';
    $mainLink = $firstLink ? $firstLink->getAttribute("href") : '';
    if ($mainLink && strpos($mainLink, "http") !== 0) $mainLink = $base . $mainLink;

    $miscLinks = [];
    $annexLinks = [];

    //   Annexes in the same <td>
    foreach ($titleCell->getElementsByTagName("a") as $a) {
        $linkText = trim($a->textContent);
        $href = $a->getAttribute("href");
        if (strpos($href, "http") !== 0) $href = $base . $href;

        if (stripos($linkText, 'Annex') !== false) {
            $annexLinks[] = ['name' => $linkText, 'url' => $href];
        } else {
            if ($href !== $mainLink) $miscLinks[] = $href;
        }
    }

//  Annexes inside <ul> lists
    foreach ($titleCell->getElementsByTagName("ul") as $ul) {
        foreach ($ul->getElementsByTagName("a") as $a) {
            $linkText = trim($a->textContent);
            $href = $a->getAttribute("href");
            if (strpos($href, "http") !== 0) $href = $base . $href;

            $annexLinks[] = ['name' => $linkText, 'url' => $href];
        }
    }

    // Save row
    $data[] = [
        'standard' => $standard,
        'title' => $title,
        'latest_update' => $latestUpdate,
        'link' => $mainLink,
        'misc_links' => implode("; ", $miscLinks),
        'annex' => $annexLinks
    ];
}


 
print_r ($data);
exit();

// ======= CSV EXPORT =======
$csvFile = 'wipo_standards_full.csv';
$fp = fopen($csvFile, 'w');

// Headers
fputcsv($fp, ['Standard', 'Title', 'Latest Update', 'Link', 'Miscellaneous Link', 'Annex Name', 'Annex URL']);

// Write rows
foreach ($data as $row) {
    if (!empty($row['annex'])) {
        foreach ($row['annex'] as $annex) {
            fputcsv($fp, [
                $row['standard'],
                $row['title'],
                $row['latest_update'],
                $row['link'],
                $row['misc_links'],
                $annex['name'],
                $annex['url']
            ]);
        }
    } else {
        fputcsv($fp, [
            $row['standard'],
            $row['title'],
            $row['latest_update'],
            $row['link'],
            $row['misc_links'],
            '',
            ''
        ]);
    }
}

fclose($fp);

echo "CSV file created successfully: $csvFile\n";
























































































// new code

// <?php

// // --------------------
// // cURL Function
// // --------------------
// function cURL($url)
// {
//     $curl_options = [
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_SSL_VERIFYHOST => false,
//         CURLOPT_TIMEOUT => 300,
//         CURLOPT_USERAGENT => "Mozilla/5.0"
//     ];

//     $curl = curl_init($url);
//     curl_setopt_array($curl, $curl_options);

//     $response = curl_exec($curl);
//     if ($response === false) {
//         echo "Error: " . curl_error($curl);
//         curl_close($curl);
//         return '';
//     }

//     curl_close($curl);
//     return $response;
// }

// $url = "https://www.wipo.int/en/web/standards/part_03_standards";
// $html = cURL($url);

// // Load HTML
// $dom = new DOMDocument();
// libxml_use_internal_errors(true);
// $dom->loadHTML($html);
// libxml_clear_errors();

// $xpath = new DOMXpath($dom);
// $base = "https://www.wipo.int/en/web/standards/part_03_standards";

// $data = [];

// // --------------------
// // Extract all TR rows containing ST.x entries
// // --------------------
// $rows = $xpath->query("//tr[td[2][starts-with(normalize-space(), 'ST.')]]");

// foreach ($rows as $row) {
//     $cells = $row->getElementsByTagName("td");
//     if ($cells->length < 2) continue;

//     $standard = trim($cells->item(0)->textContent);
//     if ($standard === '' || strpos($standard, 'ST.') !== 0) continue;

//     $titleCell = $cells->item(1);
//     $latestUpdate = trim($cells->item($cells->length - 1)->textContent);

//     // -------------------------
//     // Extract FULL TITLE (including version)
//     // -------------------------
//     $rawTitle = trim(preg_replace('/\s+/', ' ', $titleCell->textContent));

//     // Remove annex text from title
//     $cleanTitle = preg_replace('/Annex[^,;\)\]]*/i', '', $rawTitle);
//     $cleanTitle = trim(preg_replace('/\s+/', ' ', $cleanTitle));

//     // -------------------------
//     // Extract Main Link
//     // -------------------------
//     $firstLink = $titleCell->getElementsByTagName("a")->item(0);
//     $mainLink = "";

//     if ($firstLink) {
//         $mainLink = $firstLink->getAttribute("href");
//         if ($mainLink && strpos($mainLink, "http") !== 0) {
//             $mainLink = $base . $mainLink;
//         }
//     }

//     // -------------------------
//     // MISC + ANNEX LINKS
//     // -------------------------
//     $miscLinks = [];
//     $annexLinks = [];

//     // A) Annexes inside main TD
//     foreach ($titleCell->getElementsByTagName("a") as $a) {
//         $linkText = trim($a->textContent);
//         $href = $a->getAttribute("href");

//         if (strpos($href, "http") !== 0)
//             $href = $base . $href;

//         if (stripos($linkText, 'Annex') !== false) {
//             $annexLinks[] = ['name' => $linkText, 'url' => $href];
//         } else {
//             if ($href !== $mainLink)
//                 $miscLinks[] = $href;
//         }
//     }

//     // B) Annexes in <ul><li>
//     foreach ($titleCell->getElementsByTagName("ul") as $ul) {
//         foreach ($ul->getElementsByTagName("a") as $a) {
//             $linkText = trim($a->textContent);
//             $href = $a->getAttribute("href");

//             if (strpos($href, "http") !== 0)
//                 $href = $base . $href;

//             $annexLinks[] = ['name' => $linkText, 'url' => $href];
//         }
//     }

//     // -------------------------
//     // SAVE ROW
//     // -------------------------
//     $data[] = [
//         'standard' => $standard,
//         'title' => $cleanTitle,
//         'latest_update' => $latestUpdate,
//         'link' => $mainLink,
//         'misc_links' => implode("; ", $miscLinks),
//         'annex' => $annexLinks
//     ];
// }

// // Debug
// // print_r($data);
// // exit();

// // ----------------------------
// // CSV EXPORT
// // ----------------------------
// $csvFile = 'wipo_standards_full.csv';
// $fp = fopen($csvFile, 'w');

// // Header row
// fputcsv($fp, [
//     'Standard',
//     'Title',
//     'Latest Update',
//     'Main Link',
//     'Misc Links',
//     'Annex Name',
//     'Annex URL'
// ]);

// // Rows
// foreach ($data as $row) {
//     // If annex exists, repeat row for each annex
//     if (!empty($row['annex'])) {
//         foreach ($row['annex'] as $annex) {
//             fputcsv($fp, [
//                 $row['standard'],
//                 $row['title'],
//                 $row['latest_update'],
//                 $row['link'],
//                 $row['misc_links'],
//                 $annex['name'],
//                 $annex['url']
//             ]);
//         }
//     } else {
//         // Normal row
//         fputcsv($fp, [
//             $row['standard'],
//             $row['title'],
//             $row['latest_update'],
//             $row['link'],
//             $row['misc_links'],
//             '',
//             ''
//         ]);
//     }
// }

// fclose($fp);

// echo "CSV file created successfully: wipo_standards_full.csv\n";

















































































// ✅ 1. XPath for the Entire Standards Table

// If you want the full <table>:

// //table[@class='standard-table']
// ✅ 2. XPath: Access All Rows (tr)
// //table[@class='standard-table']/tbody/tr
// ✅ 3. XPath: Access Rows Starting From ST.2 to ST.88

// The first column contains the standard code (e.g., ST.2, ST.3, … ST.88).

// 👉 Select only rows whose first <td> starts with ST.
// //table[@class='standard-table']/tbody/tr[starts-with(td[1], 'ST.')]
// ✅ 4. XPath: Select a Specific Standard (Example: ST.2)
// //table[@class='standard-table']/tbody/tr[td[1]='ST.2']
// ✅ 5. XPath: Select All Standards From ST.2 to ST.88

// Since XPath cannot compare string-numbers easily, use a range match with regex (XPath 2.0+):

// //table[@class='standard-table']/tbody/tr[
//     matches(td[1], '^ST\.(2|[3-9]|[1-7][0-9]|8[0-8])$')
// ]

// This matches:

// ST.2
// ST.3 – ST.9
// ST.10 – ST.79
// ST.80 – ST.88
