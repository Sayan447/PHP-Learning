<?php

$file = __DIR__ . "/judgments_html/judgments_2026.html";

if (!file_exists($file)) {
    die("2026 file not found");
}

$html = file_get_contents($file);

libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

libxml_clear_errors();

$xpath = new DOMXPath($dom);

// get all summaries
$summaryNodes = $xpath->query("//span[contains(@class,'bt-content')]//div[contains(@class,'long-content')]");

// create CSV
$csvFile = fopen(__DIR__ . "/judgments_2026_summary.csv", "w");

// header
fputcsv($csvFile, ["Sr No", "Judgemental Summary"]);

echo "Total summaries found: " . $summaryNodes->length . PHP_EOL;
echo "--------------------------------------" . PHP_EOL;

foreach ($summaryNodes as $index => $node) {

    // extract text
    $text = trim($node->textContent);

    // clean text
    $text = preg_replace('/\s+/', ' ', $text);
    $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $text = str_replace("\xC2\xA0", ' ', $text);
    $text = str_replace("Read More", "", $text);
    $text = trim($text);

    // write to CSV
    fputcsv($csvFile, [
        $index + 1,
        $text
    ]);

    // optional debug
    echo "Saved Summary " . ($index + 1) . PHP_EOL;
}

fclose($csvFile);

echo "CSV created: judgments_2026_summary.csv" . PHP_EOL;