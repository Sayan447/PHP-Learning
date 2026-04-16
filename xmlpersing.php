<?php
// $xmlString = '<books>
// <book id= "1">
//     <title> PHP Basic </title>
//     </book>
// </books>';
// $xml = simplexml_load_string($xmlString);



// file conversion 
 
$xml = simplexml_load_file("books.xml");

// foreach($xml->book as $b){
//     echo $b->title;
//     echo PHP_EOL;
//     echo $b->author.PHP_EOL;
// }


// accessing element values
$title = $xml->book->title;
// echo $title;

// convert to string explicitly
$titleString = (string) $xml->book->title;





// working with attributes ------------------
// access attribute value
$bookId = $xml->book[0]['id'];
// echo $bookId;

// it's two different way to do this  

// using attributes() method
$attrs = $xml->book[1]->attributes();
// echo $attrs['id'];


foreach($xml->book as $book){
    echo $book->title . '\n';
    echo $book->author . '\n';
    echo $book['id']. '\n';
}