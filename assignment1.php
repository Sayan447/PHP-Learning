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

$url = "http://confman.ndl.gov.in/newSample.html";
$html = cURL($url);
// echo $html;

$dom = new DOMDocument();
libxml_use_internal_errors(true);


$dom->loadHTML($html) ;
libxml_clear_errors();


$xpath = new DOMXpath($dom);














// -----------------
// get all products
// $nodes = $xpath->query("//div[contains(@class,'product')]//h2");
// // print_r ($nodes); // length - 4
// // var_dump($nodes);
// // exit();

// foreach($nodes as $node){
//     echo $node->nodeValue . PHP_EOL;
// }



// get all products ids-------------

// $nodes = $xpath->query("//div/@data-id");
// // print_r ($nodes); // length - 4
 
// // exit();

// foreach($nodes as $node){
//     echo $node->nodeValue . PHP_EOL;
// }


// products above 800
// $nodes = $xpath->query("//span[contains(@class,'price')]");

// foreach ($nodes as $node) {
//     // echo ($node->nodeValue) . PHP_EOL;
//     $price =  (int)$node->nodeValue; 
//     if($price > 800){
//         echo "The grater than price are :- " .$price . PHP_EOL;
//     }
// }
 
















// make csv of product(mobile.csv,desktop.csv) 
// id,name price,link

// $nodes = $xpath->query("//div[contains(@data-cat,'mobile')]");
// $nodes = $xpath->query("//div[@data-cat='mobile']//div[contains(@class,'product')]");

// print_r($nodes);
// exit();
// $product = [];
// foreach($nodes as $node){
    // echo $node->nodeValue . PHP_EOL;
    // var_dump($node->nodeValue); // string 
    // $array = [];
    // foreach ($node->childNodes as $child){
    //     $text = trim($child->textContent);
    //     if ($text !== '') {
    //         $array[] = $text;
    //     }
    // }
    // print_r ($array);

    // -----------------------------
    
//     $nameNode = $xpath->query(".//h2", $node)->item(0);
//     $priceNode = $xpath->query(".//span[contains(@class,'price')]", $node)->item(0);
//     $linkNode = $xpath->query(".//a", $node)->item(0);
 

//     $product[] = [
//         'name'  => $nameNode ? trim($nameNode->nodeValue) : "",
//         'price' => $priceNode ? (int) $priceNode->nodeValue : 0,
//         'link'  => $linkNode ? $linkNode->nodeValue : "",
         
//     ];
// }
// print_r($product);


// $file = fopen("mobile.csv", "w");

// // header
// fputcsv($file, ['name', 'price', 'link']);

// // data
// foreach ($product as $row) {
//     fputcsv($file, $row);
// }

// fclose($file);

// echo "mobile.csv created!";




// -----------------------------------
// for desktop
$nodes = $xpath->query("//div[@data-cat='laptop']//div[contains(@class,'product')]");
$product = [];
foreach($nodes as $node){
    // echo $node->nodeValue . PHP_EOL;
    // var_dump($node->nodeValue); // string 
    // $array = [];
    // foreach ($node->childNodes as $child){
    //     $text = trim($child->textContent);
    //     if ($text !== '') {
    //         $array[] = $text;
    //     }
    // }
    // print_r ($array);

    // -----------------------------
    $id = $node->getAttribute('data-id');

    $nameNode = $xpath->query(".//h2", $node)->item(0);
    $priceNode = $xpath->query(".//span[contains(@class,'price')]", $node)->item(0);
    $linkNode = $xpath->query(".//a", $node)->item(0);
 

    $product[] = [
        'id'    => $id ? : "", 
        'name'  => $nameNode ? trim($nameNode->nodeValue) : "",
        'price' => $priceNode ? (int) $priceNode->nodeValue : 0,
        'link'  => $linkNode ? $linkNode->nodeValue : "",
         
    ];
}
print_r($product);
// exit();

$file = fopen("laptop.csv", "w");

// header
fputcsv($file, ['id','name', 'price', 'link']);

// data
foreach ($product as $row) {
    fputcsv($file, $row);
}

fclose($file);

echo "desktop.csv created!";
