
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

$str = "Hello where are You , How are you";
$search = ['are' , 'You'];
$replace = ['ARE' , 'u'];
echo str_ireplace($search , $replace , $str);
