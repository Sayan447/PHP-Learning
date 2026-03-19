
<?php
//  <!-- Find the length of a given string --> 
//  $name = readline("Enter your name: ");
//  echo $name;



//  Count total characters excluding spaces

// // $count = mb_strlen("Sonu");
// // echo $count;
// $x  = "sonu hello";
// $y = str_replace( " ","",$x);
// echo ($y); 
// // echo strlen($y);
















// // q3 - Convert a string to uppercase
// $name = readline('Enter the Name ');
// echo strtoupper($name);
// // output: - SAYAN


//  question 4 : - Convert a string to uppercase
// $name = readline('Enter the Name ');
// echo strtolower($name);
// 


// question 5 :- Convert the first character to uppercase
// $name = readline('Enter the Name ');
// echo ucfirst($name);




//  question 6 -Convert the first letter of each word to uppercase
// $name = "hello world from iit kgp";
// echo ucwords($name);



// question 7-> reverse the string
// $name = readline('Enter the Name ');
// echo strrev($name);






// question 8 ->  Remove leading and trailing spaces from a string
// $name = '     Hello World    ';
// echo trim($name);





// question 9 :- Remove all white spaces from a string
// $name = "Hello    world  ";
// echo str_replace(" ", "", $name);




// question 10:-Shuffle characters of a string 

// $name = readline("Enter the name ");
// echo str_shuffle($name); 





// question 11 : Extract a substring from a given string

// $str = "Hello Bubu";
// $substr = substr($str,0,7);
// echo $substr;





// question 12 :- Search for a word in a string
// $name = "hello sonu";
// $searching = str_contains($name , 'sonu' );
// echo $searching;
// echo PHP_EOL;
// var_dump($searching);








// question 13 :-  Find the position of a word in a string
// $name = "Vini Vedi Vici";
// echo strpos($name,'Vedi');




// Question 14 : - Count the number of occurrences of a word
// $name = "Vini Vedi Vici Vedi";
// $sub_name = "Vedi";
// echo substr_count($name , $sub_name);











// question 15 : - Check whether a string starts with a given word
// $name = "Hello How are You";
// echo str_starts_with($name , "Hello");
// echo PHP_EOL;
// var_dump( str_starts_with($name , "Hello"));







// Question 16-> Check whether a string ends with a given word
// $name = "Hello How are You";
// echo str_starts_with($name , "Hello");
// echo PHP_EOL;
// var_dump(str_ends_with($name , "Hello"));











// question 17:- Replace a word in a string
// $str = "replace word in string";
// echo str_replace("word" , "WORD", $str);








// question 18:- Replace multiple unwanted words

// $str = "Hello where are You , How are you";
// $search = ['are' , 'You'];
// $replace = ['ARE' , 'u'];
// echo str_ireplace($search , $replace , $str);








// question 19:- Remove special characters from a string

// $str = "Hello@# World!";
// $str1 = str_replace(['#' , "@" , "!"],"" , $str);
// echo $str1;





// Count total words in a string
// $count = count(readline('Enter the name :'));
// ------------==========
// The problem is count() does not work on a string.
// readline() returns a string.
// count() is for arrays.
// If your goal is to get the length of the input string, you should use strlen() instead



// $name = readline('Enter the name: ');
// $count = strlen($name);
// echo "Length: " . $count;


// Count total sentences in a string
// Count total vowels
// $str = "Hello Sonu";
// $vowel = ['a','e','i', 'o' ,'u' , 'A' , 'E' , 'I' , "O" , "U"];
// $count = 0;

// for($i = 0 ; $i < strlen($str) ; $i++){
//     // echo $str[$i];
//     if(in_array($str[$i], $vowel)){
//         echo $str[$i];
//         $count ++;
//     }
// }

// echo $count;





// count the digit in the string
// $str = 'My number is 123456789';
// $count = 0;
// for($i = 0; $i< strlen($str); $i++){
//     if(is_numeric($str[$i])){
//         echo $str[$i];
//         $count++;
//     }
// }
// echo PHP_EOL;
// echo $count;







































// ARRAY--------------------------
// Find the maximum and minimum value
// $arr = [1,2,3,4,5,36,45];
// echo max($arr);
// echo(PHP_EOL);
// echo min($arr);


// Remove duplicate values
// $str = ['sonu','bittu','sonu','bittu'];
// print_r (array_unique($str));

// Array
// (
//     [0] => sonu
//     [1] => bittu
// )



// Sort an array in ascending & descending order
$arr = [45 , 178 , 54 ,698 , 254];
// echo ksort($arr); // it return true or false 
// $arr = [45 , 78 , 54 ,698 , 254];
// echo ksort($arr);

// print_r($arr); // ksort is  sort the keys 
// sort($arr);

// print_r(krsort($arr));  // it return true or false


// asort($arr); // sort array asscending order 
// print_r($arr);
// arsort($arr); // sort array decending order 
// print_r($arr);





// Check if a value exists in an array
$arr = [1,4,7,1,5,9];

// if (in_array(7 , $arr)){
//     echo 'Exists';
// }
// else{
//     echo "Not Exists";
// }


// merge two array

// $arr2 = [38,46,97];
// print_r(array_merge($arr , $arr2));





// Find common elements between two arrays
// $arr1 = [1, 2, 3, 4];
// $arr2 = [3, 4, 5, 6];
// $result = array_intersect($arr2,$arr1);
// print_r($result);




// Reverse an array without built-in function

// $arr = [1,2,3,4,5,6];
// $rev = [];
// for ($i = count($arr) - 1; $i>= 0 ; $i--){
//     $rev[] = $arr[$i];
// };

// print_r($rev);