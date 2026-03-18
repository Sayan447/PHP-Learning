



<?php
//  PHP variables can be declared anywhere in the PHP code.

// The scope of a variable is the part of the script where the variable can be referenced/used.

// PHP has three different variable scopes: -->

// <!-- global
// local
// static
// A variable declared outside a function has a GLOBAL SCOPE and can only be accessed outside a function: 

// $x = 5; // global scope

// function myTest() {
//   // using x inside this function will not work
// //   echo "Variable x inside function is: $x";
// }
// myTest();

// // echo  PHP_EOL . "Variable x outside function is: $x";
// echo   " Variable x outside function is: $x\n";




// local scope
// function myTest() {
//   $x = 5; // local scope
//   echo "\nVariable x inside function is: $x";
// }
// myTest();

// // using x outside the function will not work
// echo "\nVariable x outside function is: $x";





// /////////////// static scoping

// function myTest() {
//   static $x = 0; // static scope
//   echo "\n $x";
//   $x++;
// }

// myTest();
// myTest();
// myTest();










// //////////////////// --- global keyword
// $x = 15;

// function addTen() {
//     global $x;
//     $x += 10;
// }

// addTen();
// echo $x; // 15

/////////// superGlobal 
// $x = 50;
// function showX() {
//     echo $GLOBALS['x']; // access global $x without using global keyword
// }

// showX();



// $x = 5;
// $y = 10;

// function myTest() {
//   return $GLOBALS['x'] + $GLOBALS['y'];
// }

// $test = myTest();
// echo $test;





//// Indexed or numeric array
// $colors = array("Red", "Green", "Blue");
// // or 
// $colors = ["Red", "Green", "Blue"];

// echo $colors[0];







// $x = 5;
// var_dump($x);

// $x = "Hello";
// var_dump($x);









// $x = 5;
// $x = (string) $x;
// var_dump($x);


?>