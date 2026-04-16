<?php
setcookie('fruit','apple',time()+3600);
echo "Hello";
setcookie('color','gold',time()+3600);


echo PHP_EOL;
// print_r($_COOKIE);
// how to verify the cookei is present or not 


if (isset($_COOKIE['fruit'])){
    echo 'cuurent cookei is ' .$_COOKIE['fruit'];
}
else{
    echo 'no such fruit';
}

echo PHP_EOL;
echo PHP_EOL;

if (isset($_COOKIE['color'])){
    echo 'cuurent cookei is ' .$_COOKIE['color'];
}
else{
    echo 'no such color';
}

print_r($_COOKIE);