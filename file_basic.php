<?php 
// for create mode 
// $file = fopen("sample.txt", "x");
// fclose($file);



// write mode
// $file = fopen('example.txt' , 'w');
// fwrite($file , "Immanual Macro");
// fclose($file);




// just open ,want  to know what's inside it 
// $file = fopen("example.txt", "r");               // Open file
// $content = fread($file, filesize("example.txt")); // Read entire file
// fclose($file);                                   // Close file
// echo $content;   




// Append the existing file 
// $filename = "example.txt";          // Your existing file
// $file = fopen($filename, "a");      // Open file in append mode

// fwrite($file, "\nPresident of UN!!");  // Add text at the end
// fclose($file);                        // Close the file

// echo "Text appended successfully!";

// // for reading
// $file1 = fopen("example.txt", "r");               // Open file
// $content = fread($file1, filesize("example.txt")); // Read entire file
// fclose($file1);                                   // Close file
// echo $content;   


// for short method ------------
// $content = file_get_contents('example.txt');
// echo $content;



//delete the file
// $filename = "example.txt";  // Name of the file you want to delete

// if (file_exists($filename)) {  // Check if the file exists
//     unlink($filename);          // Delete the file
//     echo "File deleted successfully!";
// } else {
//     echo "File does not exist!";
// }


// or just you can write just
// unlink('sample.txt');




// parsing the string to an array
// $string = "Amit,25,Mumbai";

// $result = str_getcsv($string);

// print_r($result);

// $filename = 'myfile.txt';
// $content = file_get_contents($filename);
// if ($content === false){
//     echo "\nError handling ---";
// } else{
//     echo 'File content : ' . $content;
// }




// fgets()
// Displays the first line of the file
// This code reads only the first line, not the whole file.
// $file = fopen('myfile.txt' , 'r');
// $str = fgets($file);
// echo $str;
// fclose($file);




// fgetc()
// return a single character from the cuurent positions 
// $file = fopen("myfile.txt", "r");
//    $str = fgetc($file);
//    echo $str;
//    fclose($file);




// $file = fopen("day.csv", "r"); 


// while (($row = fgetcsv($file)) !== false) {
//     print_r ($row[0] . " - " . $row[1] . " - " . $row[2]);
// }





// $fptr = fopen ('myopen.txt' , 'w');
// fwrite($fptr , "this is  the best file on this planet. Please son't argue with me on this one .");
// fwrite($fptr,'Ursula von der Leyen
// is the German politician serving as the first female President of the European Commission since December 2019');
// fclose($fptr);


$a = readfile('myfile.txt');
echo $a;