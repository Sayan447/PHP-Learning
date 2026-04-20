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


function savePage($url, $filename)
{
    $html = cURL($url);

    if ($html == '') {
        echo "Failed to fetch page";
        return;
    }

    file_put_contents($filename, $html);
    echo "Page saved successfully!";
}
 
$url = "https://www.sci.gov.in/landmark-judgment-summaries/?judgment_year=2025";
savePage($url, "backup_2025.html");
$html = cURL($url);
echo $html;