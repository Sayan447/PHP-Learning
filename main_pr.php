<?php

$dir = __DIR__ . "/judgments_html";
$files = glob($dir . "/judgments_*.html");

if (!$files) {
    die("No files found in directory");
}

$csvFile = fopen(__DIR__ . "/judgments_output.csv", "w");

// CSV header (added Year column)
fputcsv($csvFile, ["Year", "Sr No", "Date", "Title", "Subject", "Judgemental_Status", "Link URL", "Judgemental Summary"]);

foreach ($files as $file) {

    echo "Processing: " . basename($file) . PHP_EOL;

    // ---- extract year from filename ----
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


        //------------------ judgmental summary ---------------

        $judgementSummaryArr = [];

if (!empty($linkUrl)) {

    $fullUrl = $linkUrl;

    if (strpos($fullUrl, 'http') !== 0) {
        $base = "https://www.sci.gov.in/landmark-judgment-summaries/"; 
        $fullUrl = $base . $fullUrl;
    }

    $detailHtml = @file_get_contents($fullUrl);

    if ($detailHtml) {

        libxml_use_internal_errors(true);

        $d = new DOMDocument();
        $d->loadHTML($detailHtml);

        libxml_clear_errors();

        $dx = new DOMXPath($d);

        // grab ALL text blocks (safe generic approach)
        $nodes = $dx->query("//p | //li | //div");

        foreach ($nodes as $n) {

            $text = trim(preg_replace('/\s+/', ' ', $n->textContent));

            if (!$text) continue;

            // keep only meaningful sections
            if (
                stripos($text, 'Judgement') !== false ||
                stripos($text, 'Factual') !== false ||
                stripos($text, 'Background') !== false ||
                stripos($text, 'Facts') !== false
            ) {
                $judgementSummaryArr[] = $text;
            }
        }
    }
}



























        $links = $row->getElementsByTagName("a");

        if ($links->length > 0) {
            $link = $links->item(0);
            $linkText = trim($link->textContent);
                        // convert non-breaking spaces to normal space
            $linkText = str_replace("\xC2\xA0", ' ', $linkText);

            // decode HTML entities (like &nbsp;)
            $linkText = html_entity_decode($linkText, ENT_QUOTES | ENT_HTML5, 'UTF-8');

            // trim + remove extra spaces
            $linkText = trim(preg_replace('/\s+/', ' ', $linkText));

            // optional: force consistent label
            if (stripos($linkText, 'view judgment') !== false) {
                $linkText = 'View Judgment';
            }




            $linkUrl  = $link->getAttribute("href");
        }

        fputcsv($csvFile, [
            $year,
            $srNo,
            $date,
            $title,
            $subject,
            $linkText,
            $linkUrl,
            json_encode($judgementSummaryArr, JSON_UNESCAPED_UNICODE),
        ]);
    }

    // ---- if NO rows exist, still write the year ----
    if (!$hasData) {
        fputcsv($csvFile, [
            $year,
            "", "", "", "", "", ""
        ]);
    }

    echo "-----------------------------------" . PHP_EOL;
}

fclose($csvFile);

echo "CSV file created with all years included." . PHP_EOL;