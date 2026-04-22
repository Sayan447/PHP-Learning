<?php

$dir = __DIR__ . "/judgments_html";
$files = glob($dir . "/judgments_*.html");

if (!$files) {
    die("No files found in directory");
}

$csvFile = fopen(__DIR__ . "/judgments_output_02.csv", "w");

// CSV header
fputcsv($csvFile, [
    "Year",
    "Sr No",
    "Date",
    "Title",
    "Subject",
    "Judgemental_Status",
    "Link URL",
    "Judgemental Summary"
]);

foreach ($files as $file) {

    echo "Processing: " . basename($file) . PHP_EOL;

    // extract year
    preg_match('/judgments_(\d{4})/', basename($file), $match);
    $year = $match[1] ?? "Unknown";

    if ($year >= 2000 && $year <= 2016) {
        echo "Skipping year: $year" . PHP_EOL;
        continue;
    }

    $html = file_get_contents($file);

    if (!$html) {
        echo "Failed to read: $file" . PHP_EOL;
        continue;
    }

    libxml_use_internal_errors(true);

    $dom = new DOMDocument();
    $dom->loadHTML($html);

    libxml_clear_errors();

    $xpath = new DOMXPath($dom);

    $rows = $xpath->query("//table//tr");

    echo "Rows found: " . $rows->length . PHP_EOL;

    $hasData = false;

    foreach ($rows as $row) {

        $cells = $row->getElementsByTagName("td");

        if ($cells->length < 4) continue;

        $hasData = true;

        $srNo    = trim($cells->item(0)->textContent);
        $date    = trim($cells->item(1)->textContent);
        $title   = trim($cells->item(2)->textContent);
        $subject = trim($cells->item(3)->textContent);

        $linkText = "";
        $linkUrl  = "";

        $links = $row->getElementsByTagName("a");

        if ($links->length > 0) {
            $link = $links->item(0);

            $linkText = trim($link->textContent);
            $linkText = str_replace("\xC2\xA0", ' ', $linkText);
            $linkText = html_entity_decode($linkText, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $linkText = trim(preg_replace('/\s+/', ' ', $linkText));

            if (stripos($linkText, 'view judgment') !== false) {
                $linkText = 'View Judgment';
            }

            $linkUrl = $link->getAttribute("href");
        }

        // ---------------- FIXED JUDGEMENTAL SUMMARY ----------------
        $judgementalSummary = "";

        $summaryNodes = $xpath->query(
            ".//div[contains(@class,'long-content')]",
            $row
        );

        if ($summaryNodes && $summaryNodes->length > 0) {

            $node = $summaryNodes->item(0);

            $text = trim($node->textContent);

            // clean text
            $text = preg_replace('/\s+/', ' ', $text);
            $text = str_replace("\xC2\xA0", ' ', $text);
            $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $text = str_replace("Read More", "", $text);

            $judgementalSummary = trim($text);

            echo "Summary extracted for row $srNo (" . strlen($judgementalSummary) . " chars)" . PHP_EOL;

        } else {
            echo "No summary found for row $srNo" . PHP_EOL;
        }

        // ---------------- WRITE CSV ----------------
        fputcsv($csvFile, [
            $year,
            $srNo,
            $date,
            $title,
            $subject,
            $linkText,
            $linkUrl,
            $judgementalSummary
        ]);
    }

    // if no rows
    if (!$hasData) {
        fputcsv($csvFile, [$year, "", "", "", "", "", "", ""]);
    }

    echo "-----------------------------------" . PHP_EOL;
}

fclose($csvFile);

echo "CSV file created successfully." . PHP_EOL;