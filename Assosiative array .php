<?php

// $person = [
//     'name' => 'Rahul',
//     'age' => 21,
//     'city' => 'Mumbai',
// ];

// // print_r($person);

// echo $person['Mumbai'];






$person = [
    [
        'first_name' => "Prakash",
        'last name' => 'ghosh',
        'email' => 'abcd@gmail.com',
    ],

    [
        'first_name' => "P",
        'last name' => 'ghosh',
        'email' => 'abce@gmail.com',
    ],
    [
        'first_name' => "Ph",
        'last name' => 'ghosh',
        'email' => 'abcf@gmail.com',
    ],
];


// print_r ($person[1]['email']);



// P-1:
//     Q:name,age,course
// $student = [
//     "name" => "K.L.Rahul",
//     "age" => 21,
//     "course" => "BCA"
// ];




// print_r($student['name']);
// print_r($student['age']);
// print_r($student['course']);



// foreach ($student as $key => $value) {
//     print_r ($key." : ".$value .',');
// }



// P-2:
    // Q:name,age,course,computer-marks
// $student = [
//     "name" => "K.L.Rahul",
//     "age" => 21,
//     "course" => "BCA",
//     "marks" => [
//         "math" => 85,
//         "english" => 78,
//         "computer" => 92
//     ]
// ];

// foreach($student as $key => $value){
//     if($key == 'marks'){
//         echo PHP_EOL;
//         echo "Computer marks: " . $value['computer'];
//     } else 
//     {
//         echo PHP_EOL;
//         echo $key. " : " . $value.',';
//     };




// };





P4:
    // Q:user_id,city,product[name,price]
$user = [
    "user_id" => 101,
    "username" => "saptarshi",
    "email" => "sap@example.com",
    "address" => [
        "city" => "Kolkata",
        "state" => "West Bengal",
        "pin" => 700001
    ],
    "orders" => [
        [
            "order_id" => 1,
            "product" => "Laptop",
            "price" => 55000
        ],
        [
            "order_id" => 2,
            "product" => "Mouse",
            "price" => 700
        ]
    ]
];



// user-id
// echo 'user-id'. ":-" . $user['user_id'];

// echo PHP_EOL;

// echo 'address'. ":-" . $user['address']['city'];

// echo PHP_EOL;

// foreach ($user['orders'] as $order) {
//     echo PHP_EOL;
//     echo "product: " . $order['product'] . ", price: " . $order['price'] ."\n" ;
// }
// just hit and try------------------------------------------------------------------------------------

// foreach ($user['orders'] as $order) {
//     foreach ($order['product'] as $p) {
//         echo "product: " . $p['name'] . 
//              ", price: " . $p['price'] . PHP_EOL;
//     }
// }
