<?php

$url = "https://www.nmc.org.in/information-desk/for-colleges/pg-curricula-2/";



$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_USERAGENT => "Mozilla/5.0"
]);

$html = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL Error: " . curl_error($ch));
}

curl_close($ch);



libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

libxml_clear_errors();

$xpath = new DOMXPath($dom);



$csvFile = fopen("nmc_pg_curricula.csv", "w");

/* CSV Header */
fputcsv($csvFile, [
    "course_type",
    "serial_number",
    "title",
    "url"
]);



$strongs = $xpath->query("//strong");

foreach ($strongs as $strong) {

    $category = trim($strong->textContent);

    

    $table = $strong->parentNode->nextSibling;

    while ($table && $table->nodeName !== "table") {
        $table = $table->nextSibling;
    }

    if (!$table) {
        continue;
    }

    

    $rows = $xpath->query(".//tr", $table);

    foreach ($rows as $row) {

        $tds = $xpath->query("./td", $row);

        if ($tds->length < 2) {
            continue;
        }

        $number = trim($tds->item(0)->textContent);

        $a = $xpath->query(".//a", $tds->item(1))->item(0);

        if (!$a) {
            continue;
        }

        $title = trim($a->textContent);
        $link = trim($a->getAttribute("href"));

        fputcsv($csvFile, [
            $category,
            $number,
            $title,
            $link
        ]);
    }
}

fclose($csvFile);

echo "CSV created successfully: nmc_pg_01.csv\n";