<?php 
// echo 'Sayan';
// $x = 5;
// echo  PHP_EOL;  // for new line
// var_dump($x); 

///////



// var_dump(5);
// var_dump("John");
// var_dump(3.14);
// var_dump(true);
// var_dump([2, 3, 56]);
// var_dump(NULL);


// output:- 
// int(5)
// string(4) "John"
// float(3.14)
// bool(true)
// array(3) {
//   [0]=>
//   int(2)
//   [1]=>
//   int(3)
//   [2]=>
//   int(56)
// }
// NULL
// $ar[] = [1,2];
// print($ar);


#saYaN /\ chaKraBorty #

//sayan Chakraborty

$str = '#saYaN /\ chaKraBorty #';
$sub_str = str_replace(["#", "/" , "\\" ],"" ,$str);
// echo $sub_str;
$sub_str = trim($sub_str);
$sub_str = strtolower($sub_str);
// echo($sub_str);
$word = explode(" " , $sub_str);
// print_r($word);

// echo ($word[0]);

$cap = $word[0] . " " . ucfirst($word[2]);
// print_r($cap);
echo $cap;