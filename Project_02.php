<?php



// this for converting html format
$startYear = 2024;
$endYear   = 2000;

$baseUrl = "https://www.sci.gov.in/landmark-judgment-summaries/";

$saveDir = __DIR__ . "/judgments_html";

// create folder if not exists
if (!file_exists($saveDir)) {
    mkdir($saveDir, 0777, true);
}

$year = $startYear;

while ($year >= $endYear) {

    $url = $baseUrl . "?judgment_year=" . $year;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $html = curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode == 200 && $html) {

        $filePath = $saveDir . "/judgments_" . $year . ".html";

        file_put_contents($filePath, $html);

        echo "Saved: " . $filePath . PHP_EOL;

    } else {
        echo "Failed for year $year (HTTP $httpCode)" . PHP_EOL;
    }

    $year--;

    // optional delay to avoid server stress
    sleep(1);
}

 