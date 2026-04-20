<?php
 

$dir = __DIR__ . "/judgments_html";

// get all html files
$files = glob($dir . "/judgments_*.html");

if (!$files) {
    die("No files found in directory");
}

foreach ($files as $file) {

    echo "Processing: " . basename($file) . PHP_EOL;

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

    // Example: get all table rows
    $rows = $xpath->query("//table//tr");

    echo "Rows found: " . $rows->length . PHP_EOL;

    foreach ($rows as $row) {

        $cells = $row->getElementsByTagName("td");

        if ($cells->length < 4) continue;

        $srNo    = trim($cells->item(0)->textContent);
        $date    = trim($cells->item(1)->textContent);
        $title   = trim($cells->item(2)->textContent);
        $subject = trim($cells->item(3)->textContent);

        echo "$srNo | $date | $title | $subject" . PHP_EOL;
    }

    echo "-----------------------------------" . PHP_EOL;
}