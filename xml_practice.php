<?php
$xml = simplexml_load_file("dataset.xml");

// foreach ($xml->record as $data) {
//     if (!isset($data->first_name)) continue; // skip empty record
    

//     echo "First name: " . $data->first_name . " ";
//     echo "Last name: " . $data->last_name . "<br>";
    
//     } 



// echo var_dump($xml->record);
// exit();

// extract all the attributes
// foreach($xml->record as $Data){
//     echo "ID: " . $Data->id . "<br>";
//     echo "Name: " . $Data->first_name . " " . $Data->last_name . "<br>";
//     echo "Email: " . $Data->email . "<br>";
//     echo "Gender: " . $Data->gender . "<br>";
//     echo "IP: " . $Data->ip_address . "<br><br>";
// }

// echo var_dump($xml->record);
// exit();



$records = [];

foreach ($xml->record as $data) {
    $records[] = [
        "id" => (string)$data->id,
        "first_name" => (string)$data->first_name,
        "last_name" => (string)$data->last_name,
        "email" => (string)$data->email,
        "gender" => (string)$data->gender,
        "ip_address" => (string)$data->ip_address
    ];
}


// echo "<pre>";
// print_r($records);
// echo "</pre>";





// use of filter  data to csv file



// now convert it into csv format
//  ------------------------------------------------------
$filename = "output.csv";

// open file in write mode
// $file = fopen($filename, "w");

// // add header row (column names)
// fputcsv($file, ["ID", "First Name", "Last Name", "Email", "Gender", "IP Address"]);

// foreach ($records as $row) {
//     fputcsv($file, [
//         $row["id"],
//         $row["first_name"],
//         $row["last_name"],
//         $row["email"],
//         $row["gender"],
//         $row["ip_address"]
//     ]);
// }

// fclose($file);

// echo "CSV file created successfully!";
 





// for filter data into the csv file 
// foreach ($records as $r) {
//     if ($r['gender'] == 'Female') {
//         echo $r['first_name']."<br>";
//     }
// }

// $input = fopen('output.csv', 'r');
// $output = fopen('output3.csv', 'w');

// $header = fgetcsv($input);
// fputcsv($output, $header);

// while ($row = fgetcsv($input)) {
//     if ($row[4] == 'Female') {   // change index if gender is in another column
//         fputcsv($output, $row);
//     }
// }

// fclose($input);
// fclose($output);








// CSV to JSON convertion 

$input = fopen('output3.csv', 'r');

$header = fgetcsv($input); // first row (column names)
$data = [];

while ($row = fgetcsv($input)) {
    $data[] = array_combine($header, $row);
}

fclose($input);

// convert to JSON
$json = json_encode($data, JSON_PRETTY_PRINT);

// save to file
file_put_contents('filter_data.json', $json);

echo "JSON file created!";