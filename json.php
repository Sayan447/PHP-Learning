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
// exit();

// print id,name,email,city
// print_r($data['users'][0]['id']);
// echo PHP_EOL;
// print_r($data['users'][0]['name']);
// echo PHP_EOL;
// print_r($data['users'][0]['email']);
// echo PHP_EOL;
// print_r($data['users'][0]['address']['city']);
// echo PHP_EOL;


// foreach ($data['users'] as $user) {
    
//     echo "ID: " . $user['id'];
//     echo PHP_EOL;
//     echo "Name: " . $user['name'];
//     echo PHP_EOL;
//     echo "Email: " . $user['email'];
//     echo PHP_EOL;
//     echo "City: " . $user['address']['city'] ;
//     echo PHP_EOL;
//     echo "-------------------;";
// };
// exit();





// // Handle user with no order 
// foreach($data['users'] as $user){
//     // echo 'name:- ' . $user['name']. PHP_EOL; 
     
//     // Handle user with no order 
//     if(empty($user['orders'])){
//         echo ('name'. $user['name']).PHP_EOL;
//     };
// }
// exit();





//Count total order per customer

// $totalcount = [];
// foreach ($data['users'] as $user) {
//     echo $user['name'] . " - Total Orders: " . count($user['orders']) . PHP_EOL;
// }
// echo PHP_EOL;
// // echo($counter).PHP_EOL;
// exit();


 








// Create a CSV data
// --user_id,name,email,city,total orders amount
$details = [];

foreach($data['users'] as $user){
    $totalAmount = 0;
    if (!empty($user['orders'])) {
        foreach ($user['orders'] as $order) {
            $totalAmount += $order['payment']['amount'];
        }
    }
    // $totalcount = 0;
    // here is totoal order 
    
    // $counter = count($user['orders']);
    // print_r ($user);
        // foreach($user['orders'] as $orders){
        // // print_r(($orders));
        // foreach($orders['payment'] as $Payment){
        //     echo($Payment);
        // }
        // print_r ( $orders['payment']['amount']);
    // $totalcount += $orders['payment']['amount'];
        // exit();
    $details[] = [
    'user_id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email'],
    'City' => $user['address']['city'],
    'Total Order' => $totalAmount,
    ];
    }
     
 

echo PHP_EOL;
print_r($details).PHP_EOL;
// exit();
//     // print_r ('name:- ' . $user['name']).PHP_EOL;
   

 
// print_r($details);
// exit();



// creating csv file 
$filename = "details.csv";
// open file 
$file = fopen($filename , 'w');


fputcsv($file, ['user_id', 'name' , 'email' , 'City' , 'Total Order']);


// write data
foreach($details as $row){
    fputcsv($file, [$row['user_id'], $row['name'] , $row['email'] , $row['City'] , $row['Total Order']]);
}
fclose($file);

echo "CSV created...........";







// make a json only active users
// --id,name,phone

// $details=[];
//  foreach ($data['users'] as $user){
//     // id , name , phone
//     // echo $user['id'] , $user['name'] , $user['phone'];

//     if($user['is_active'] == true)
//     $details[] = [
//         "Name -" =>  $user['name'],
//         "User_ID" => $user['id'],
//         "Phone" => $user['phone'],
//     ];

// }

// // print_r($details);
// // exit();

// $json = json_encode($details,JSON_PRETTY_PRINT);
// echo $json;

