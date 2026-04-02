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

$url = "http://confman.ndl.gov.in/testXpath.html";
$html = cURL($url);
// echo $html;
$dom = new DOMDocument();
libxml_use_internal_errors(true); // suppress warnings for imperfect HTML


 $dom->loadHTML($html) ;
// exit();

// libxml_clear_errors();

$div = $dom->getElementsByTagName('div')->item(1)->nodeValue ?? '';
echo "div: " . $div . PHP_EOL;

$a = $dom->getElementsByTagName('a')->item(1)->nodeValue ?? '';
echo "a: " . $a . PHP_EOL;

































 
// // JSON data
// $curl = curl_init();

// curl_setopt_array($curl , [
//     CURLOPT_RETURNTRANSFER => 1,
//     CURLOPT_URL => "https://jsonplaceholder.typicode.com/todos/1",
//     CURLOPT_USERAGENT => "yOUTUBE cURL"
// ]);

// $response  = curl_exec($curl);
// echo PHP_EOL;
// echo $response. PHP_EOL;