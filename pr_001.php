<?php

// $url = "https://en.wikipedia.org/wiki/December_10";

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

// $response = curl_exec($ch);
// curl_close($ch);
// // echo($response);
// // exit();
// // only HTLM is extracted from the website 








// // Find Births section
// $start = stripos($response, 'id="Births"');
// $end = stripos($response, '<h2', $start);
// // echo($start);  // 154471
// // echo($end);   // 207114
// // exit();

// $htmlSection = substr($response, $start, $end - $start);
// // print($htmlSection);
// // exit();






// // Get list items (non-greedy!)
// preg_match_all('@<li>(.*?)</li>@s', $htmlSection, $matches);
// $listItems = $matches[1];
// print_r($listItems);
// // exit();

// // $dom = new DOMDocument();

// // // 2. Ignore HTML warnings
// // libxml_use_internal_errors(true);

// // // 3. Load HTML
// // $dom->loadHTML($response);

// // libxml_clear_errors();


// // // 4. Create XPath object (THIS WAS MISSING IN YOUR CODE)
// // $xpath = new DOMXPath($dom);
// // // Get all <li> inside the Births section
// $listItems = $xpath->query("/id='Births'.*?<ul>(.*?)<\/ul>/s', $response, $section");

// foreach ($listItems as $item) {
//     echo $item->textContent . "\n";
// }
// // exit();

// echo "Who was born on December 10th\n";
// echo "=============================\n\n";


// foreach ($listItems as $item) {

//     //  SAFE year extraction
//     if (preg_match('@\d{3,4}@', $item, $yearMatch)) {
//         $year = $yearMatch[0];
//     } else {
//         $year = "Unknown";
//     }

//     //  SIMPLER name extraction (first <a>)
//     if (preg_match('@<a[^>]*>(.*?)</a>@', $item, $nameMatch)) {
//         $name = strip_tags($nameMatch[1]);
//     } else {
//         $name = "Unknown";
//     }

//     echo "{$name} was born in {$year}\n";
// }
 

// $url = "https://en.wikipedia.org/wiki/December_10";

// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);

// libxml_use_internal_errors(true);
// $dom = new DOMDocument();
// $dom->loadHTML($response);
// $xpath = new DOMXPath($dom);

// $items = $xpath->query('*//main//ul[4]/li');

// print_r($items);
// exit();
// foreach ($items as $item) {
//     echo $item->textContent . "\n";
// }



 

$url = "https://en.wikipedia.org/wiki/December_10";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
$response = curl_exec($ch);
curl_close($ch);

// get Births section
$start = stripos($response, 'id="Births"');
$end   = stripos($response, '<h2', $start);
$section = substr($response, $start, $end - $start);

// extract list items
preg_match_all('/<li>(.*?)<\/li>/s', $section, $matches);

print_r($matches[1]);
exit();

echo "Who was born on December 10th\n";
echo "=============================\n\n";

foreach ($matches[1] as $item) {

    preg_match('/\d{3,4}/', $item, $y);
    preg_match('/<a[^>]*>(.*?)<\/a>/', $item, $n);

    $year = $y[0] ?? "Unknown";
    $name = isset($n[1]) ? strip_tags($n[1]) : "Unknown";

    echo "$name was born in $year\n";
}