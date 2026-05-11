<?php

function cURL($url)
{
    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0',
        CURLOPT_TIMEOUT => 300
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        die("cURL Error: " . curl_error($ch));
    }

    curl_close($ch);

    return $response;
}

$url = "http://www2.kuhs.ac.in/kuhs_new/index.php?id=14&folder=MEDICAL";

// Fetch HTML
$html = cURL($url);

// Save into HTML file
$file = "Kerala University Of Health Science.html";

if (file_put_contents($file, $html)) {
    echo "HTML saved successfully into {$file}";
} else {
    echo "Failed to save HTML file";
}

?>
