<?php 
// $file = fopen("test_set.csv", "r"); 

// // display full name and read csv
// while (($row = fgetcsv($file)) !== false) {
//     echo ('Full Name:- '.$row[2]."-".$row[3]).PHP_EOL;
    
// };


// Count Total Customers
// $filename = 'test_set.csv';
// $count = 0;
// // $country = [];
// if(($file = fopen($filename, 'r')) !== FALSE){
//     while(fgetcsv($file) !== FALSE){
//         $count++;
//         
//     }
//     fclose($file);
// }

// echo PHP_EOL;
// echo 'Total Customer '. $count.PHP_EOL;

// -----------=====================------------------
// $countries = [];

// if (($file = fopen($filename, 'r')) !== FALSE) {
//     while (($data = fgetcsv($file)) !== FALSE) {
//         if (!empty($data[6])) {           //  
//             //$countries[] = $data[6]; 
//             $key = $data[6];
//             $countries[$key] = true;
//         }
//     }
//     fclose($file);



//     //$uniqueCountries = array_unique($countries);
//     $uniqueCountries = array_keys($countries);
//     print_r ($uniqueCountries);
//     // exit();

     
//     // echo PHP_EOL;

//     // to show the format of array 
//     foreach ($uniqueCountries as $country){
//         print_r($country, '\n');
//     }
//     // echo "Unique Countries: " . implode(', ', $uniqueCountries).'\n' . PHP_EOL;
// }









// $filename = 'test_set.csv';










// $handle = fopen("test_set.csv", "r");
// $count = 0;
// $header = fgetcsv($handle);

// // // find customer respect by  subscription date
// $firstname = array_search("First Name", $header);
// $lastname = array_search("Last Name", $header);
// $dateIndex = array_search("Subscription Date", $header);

// while (($row = fgetcsv($handle)) !== false) {
   
//     // print_r(strtotime($row[$dateIndex]));
//     // exit();
    
// if (strtotime($row[$dateIndex]) > strtotime("2021-01-01")) {
        
//         // print_r( $row[$firstname].'-'.$row[$lastname]. PHP_EOL); 
//         // $count= $count + 1;
//         // echo $count.PHP_EOL;
//     }
 
// }

// fclose($handle);
// exit();





// Display First Name, Last Name, Email,Company for customers whose country is Macao
// $macao = [];

// if (($handle = fopen('test_set.csv', 'r')) !== FALSE) {
//     while (($data = fgetcsv($handle)) !== FALSE) {
     
//         if ($data[6] === "Macao") {
//            $macao[] = [
//             'FirstName' => $data[2],
//             'Last Name' => $data[3],
//             'Company' => $data[4],
//             'city' => $data[5],
//             "Email" => $data[9],
//         ];
//         }
//     }
//     fclose($handle);
// }

// // Optional: print to check
// print_r($macao);


// exit();







 
// Find Customers with HTTPS Websites 
 
// $csvUrls = [];
 
// $handle = fopen("test_set.csv", "r");

// $header = fgetcsv($handle);

// while (($data = fgetcsv($handle)) !== FALSE) {
//     if (str_contains($data[11], "https")) {
//         // with storing an array
//         // $csvUrls[] = [
//         //     'name' => $data[0],
//         //     'URL' => $data[11]
//         // ];
//         // without storing an array
//         echo $data[2]. '-'. $data[3] . " --- " . $data[11]. PHP_EOL;
//     }
     
// }
// fclose($handle);
// print_r($csvUrls);









// Count Customer Per Country

// $filename = "test_set.csv";
// $countrycount = [];

// if(($file = fopen($filename , 'r'))!== FALSE){
//     // header skip
//     fgetcsv($file);

//     while(($data = fgetcsv($file)) !== FALSE){
//         $country = $data[6];
//         if(empty($countrycount[$country])){
//             $countrycount[$country] = 1;
//         }
//         else { 
//             $countrycount[$country]++;
//         }
//     }
// }

// fclose($file);


// foreach($countrycount as $country => $count){
//     // without array ---------------------------
//     // print_r($country . " : " . $count. PHP_EOL);
//     // -------------------
//     // with array ---------------------------
//     $countrycount[] = [
//         'Country' => $country,
//         "Count" => $count,
//     ];
//     print_r($countrycount);
// }




// Export Customer fro asia 
$asiaCountries = [
    "China","Japan","Nepal","Macao","India","Sri Lanka","Thailand",
    "Vietnam","Indonesia","Pakistan","Bangladesh","Singapore","Malaysia"
];

$asia = [];
$filename = 'test_set.csv';

if (($file = fopen($filename, 'r')) !== FALSE) {
    // Skip header
    fgetcsv($file);

    while (($data = fgetcsv($file)) !== FALSE) {
        $country = $data[6]; // assuming column 7 is country

        if (in_array($country, $asiaCountries)) {
             
            $asia[] = [
                "ID" => $data[1],
                'CountryName' => $country
                ];
            
            // echo "$country is in Asia" . PHP_EOL;
        } else {
           
            // echo "$country is not in Asia" . PHP_EOL;
        }
    }
    fclose($file);
}

// Print the final array
print_r($asia);
// exit();

// csv file
$filename1 = "question.csv";
// open file 
$file = fopen($filename1, 'w');
 
fputcsv($file, [
    "Customer Id" , "Country"
]);

// write data 
foreach($asia as $row) {
        fputcsv($file, [$row['ID'], $row['CountryName']]);
};
 
fclose($file);

echo 'CSV created..........';