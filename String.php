<?php
// find the length of the string 
// $text = 'Hello world';
// echo strlen($text);
// echo PHP_EOL.str_word_count($text);



// echo strpos("Hello world!", "world");
//  searches for a specific text within a string.





// /The str_starts_with() function checks if a string starts with a specific substring.
// Tip: The str_starts_with() function is only available in PHP 8.0 and later.
// If a match is found, the function returns a boolean true. If no match is found, it will return a boolean false.

// $txt = "I really love PHP!";
// var_dump(str_starts_with($txt, "i really"));
// it return bool value










// // The str_ends_with() function checks if a string ends with a specific substring.
// If a match is found, the function returns a boolean true. If no match is found, it will return a boolean false.





// The str_ends_with() function checks if a string ends with a specific substring.



// $txt = "I really love PHp!";
// var_dump(str_ends_with($txt, "PHP!"));



// Modify string --------------------------------------------
// The strtoupper() function returns a string in upper case.
// $x = "Hello World!";
// echo strtoupper($x);
// HELLO WORLD!




// echo PHP_EOL.strtolower("SONU");


// The str_replace() function replaces some characters with some other characters in a string.
$x = "Hello World!";
// echo str_replace("World", "Dolly", $x);








// ----------------- strrev()- for reverse the function 
// $s = "hello Bhi";
// echo strrev($s);





// TRIM()---------------

// Whitespace is the space before and/or after the actual text, and very often you want to remove this space.



$x = "    Hello World!    ";
echo trim($x);
