<?php

$links = [

    "https://www.wipo.int/en/web/standards/part_03_standards",
];

$outputCsv = "result_data.csv";


// ------------------------------
// CSV HEADERS
// ------------------------------
$headers = [
    "Standard",
    "Title",
    "Latest Update",
    "Document Link",
    "Extra Links"
];

// ------------------------------
// cURL FUNCTION
// ------------------------------
function cURL($url)
{
    echo "Fetching: $url\n";

    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_USERAGENT => "Mozilla/5.0"
    ]);

    $response = curl_exec($curl);

    if ($response === false) {
        echo "cURL Error: " . curl_error($curl) . "\n";
    }

    curl_close($curl);
    return $response ?: '';
}

// ------------------------------
// MAKE ABSOLUTE URL
// ------------------------------
function makeAbsoluteUrl($base, $relative)
{
    if (parse_url($relative, PHP_URL_SCHEME)) return $relative;

    if (substr($relative, 0, 1) === '/') {
        $parsed = parse_url($base);
        return $parsed['scheme'] . '://' . $parsed['host'] . $relative;
    }

    return rtrim(dirname($base), '/') . '/' . $relative;
}

// ------------------------------
// SCRAPE FUNCTION
// ------------------------------
function scrapePage($url)
{
    $results = [];

    $html = cURL($url);
    if (!$html) return $results;

    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);

    $rows = $xpath->query("//table[@id='stdtable']//tr");

    $lastStandard = "";

    foreach ($rows as $row) {

        // Skip section headers
        if ($row->getAttribute("class") === "section") continue;

        $cells = $row->getElementsByTagName("td");
        $cellCount = $cells->length;

        if ($cellCount == 0) continue;

        $standard = "";
        $titleCell = null;
        $date = "";

        // ------------------------------
        // CASE 1: NORMAL ROW (3 columns)
        // ------------------------------
        if ($cellCount == 3) {

            $standardText = trim(preg_replace('/\s+/', ' ', $cells->item(0)->textContent));

            if ($standardText != "") {
                $lastStandard = $standardText;
            }

            $standard = $lastStandard;
            $titleCell = $cells->item(1);
            $date = trim(preg_replace('/\s+/', ' ', $cells->item(2)->textContent));
        }

        // ------------------------------
        // CASE 2: CONTINUATION ROW (2 columns)
        // ------------------------------
        elseif ($cellCount == 2) {

            $standard = $lastStandard;
            $titleCell = $cells->item(0);
            $date = trim(preg_replace('/\s+/', ' ', $cells->item(1)->textContent));
        }

        // ------------------------------
        // CASE 3: SKIP COLSPAN / RELATED RESOURCE
        // ------------------------------
        elseif ($cellCount == 1 || $cells->item(0)->hasAttribute("colspan")) {
            continue;
        }

        // ------------------------------
        // EXTRACT LINKS
        // ------------------------------
        $title = "";
        $docLink = "";
        $extraLinks = [];

        if ($titleCell) {

            $aTags = $titleCell->getElementsByTagName("a");

            if ($aTags->length > 0) {

                // Main document
                $main = $aTags->item(0);
                $title = trim(preg_replace('/\s+/', ' ', $main->textContent));
                $docLink = makeAbsoluteUrl($url, $main->getAttribute("href"));

                // Extra links (Annex etc.)
                foreach ($aTags as $i => $a) {
                    if ($i == 0) continue;

                    $text = trim(preg_replace('/\s+/', ' ', $a->textContent));
                    $href = makeAbsoluteUrl($url, $a->getAttribute("href"));

                    $extraLinks[] = $text . " => " . $href;
                }
            }
        }

        // ------------------------------
        // SAVE ROW
        // ------------------------------
        $results[] = [
            $standard,
            $title,
            $date,
            $docLink,
            implode(" | ", $extraLinks)
        ];
    }

    return $results;
}

// ------------------------------
// PROCESS URLS
// ------------------------------
$newRows = [];

foreach ($links as $url) {

    $pageData = scrapePage($url);

    foreach ($pageData as $row) {
        $newRows[] = $row;
    }

    echo "Processed: $url\n";

    sleep(1);
}

// ------------------------------
// WRITE CSV
// ------------------------------
$f = fopen($outputCsv, "w");

fputcsv($f, $headers);

foreach ($newRows as $row) {
    fputcsv($f, $row);
}

fclose($f);

echo " CSV created: $outputCsv\n";