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

// $header = fgetcsv($handle);


 

// find customer respect by  subscription date
// $firstname = array_search("First Name", $header);
// $lastname = array_search("Last Name", $header);
// $dateIndex = array_search("Subscription Date", $header);

// while (($row = fgetcsv($handle)) !== false) {
//     if ($row[$dateIndex] > "2021-01-01") {
//         print_r( $row[$firstname].'-'.$row[$lastname]. PHP_EOL); 
//     }
 
// }

// fclose($handle);





// // Display First Name, Last Name, Email,Company for customers whose country is Macao
$macao = [];

if (($handle = fopen('test_set.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        $macao[] = [
            'FirstName' => $data[2],
            'Last Name' => $data[3],
            'Company' => $data[4],
            'city' => $data[5],
            "Email" => $data[9],
        ];
        // if ($date[6] === "Macao") {
        // echo "First Name: $firstName | Last Name: $lastName | Email: $email | Company: $company\n";
        // }
    }
    fclose($handle);
}

// Optional: print to check
print_r($macao);