<?php

$url = "http://confman.ndl.gov.in/sample.json";
$responce = file_get_contents($url);

$data = json_decode($responce,true);
// print_r( $data['status']).PHP_EOL;
// echo PHP_EOL;
// print_r($data['company']['name']);
// echo PHP_EOL;
// print_r($data['company']['gst']);
// echo PHP_EOL;
// print_r($data['company']['address']);
// echo PHP_EOL;


// print id,name,email,city
// print_r($data['users'][0]['id']);
// echo PHP_EOL;
// print_r($data['users'][0]['name']);
// echo PHP_EOL;
// print_r($data['users'][0]['email']);
// echo PHP_EOL;
// print_r($data['users'][0]['address']['city']);
// echo PHP_EOL;


foreach ($data['users'] as $user) {
    echo "ID: " . $user['id'];
    echo PHP_EOL;
    echo "Name: " . $user['name'];
    echo PHP_EOL;
    echo "Email: " . $user['email'];
    echo PHP_EOL;
    echo "City: " . $user['address']['city'] ;
    echo PHP_EOL;
    echo "-------------------;";
};