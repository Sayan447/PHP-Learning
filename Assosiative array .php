<?php

// $person = [
//     'name' => 'Rahul',
//     'age' => 21,
//     'city' => 'Mumbai',
// ];

// // print_r($person);

// echo $person['Mumbai'];






// $person = [
//     [
//         'first_name' => "Prakash",
//         'last name' => 'ghosh',
//         'email' => 'abcd@gmail.com',
//     ],

//     [
//         'first_name' => "P",
//         'last name' => 'ghosh',
//         'email' => 'abce@gmail.com',
//     ],
//     [
//         'first_name' => "Ph",
//         'last name' => 'ghosh',
//         'email' => 'abcf@gmail.com',
//     ],
// ];


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
// $user = [
//     "user_id" => 101,
//     "username" => "saptarshi",
//     "email" => "sap@example.com",
//     "address" => [
//         "city" => "Kolkata",
//         "state" => "West Bengal",
//         "pin" => 700001
//     ],
//     "orders" => [
//         [
//             "order_id" => 1,
//             "product" => "Laptop",
//             "price" => 55000
//         ],
//         [
//             "order_id" => 2,
//             "product" => "Mouse",
//             "price" => 700
//         ]
//     ]
// ];



// // user-id
// echo 'user-id'. ":-" . $user['user_id'];

// echo PHP_EOL;

// echo 'address'. ":-" . $user['address']['city'];

// echo PHP_EOL;

// foreach ($user['orders'] as $order) {
//     echo PHP_EOL;
//     echo "product: " . $order['product'] . ", price: " . $order['price'] ."\n" ;
// }


// Q:id,name,math marks,course,avg_marks --->each

$students = [
    [
        "id" => 1,
        "name" => "K.L.Rahul",
        "details" => [
            "age" => 21,
            "course" => "BCA",
            "marks" => [
                "math" => 85,
                "english" => 78
            ]
        ]
    ],
    [
        "id" => 2,
        "name" => "john doe",
        "details" => [
            "age" => 22,
            "course" => "BSc IT",
            "marks" => [
                "math" => 88,
                "english" => 81
            ]
        ]
    ]
];



// $id = $students['id'];
// $name = $students['name'];
// $course = $students['details']['course'];

// echo "ID: " . $id ;
// echo "Name: " . $name ;
// echo "Course: " . $course ;

// foreach ($students as $student){
// $id = $student['id'];
// $name = $students['name'];
// $course = $students['details']['course'];

// // echo "ID: " . $id ;
//     $marks = $student['details']['marks'];
//     if (!empty($marks)) {
//         $avg = array_sum($marks) / count($marks);
//     } else {
//         $avg = 0;
//     }
// };


































$students = [
    [
        "id" => 1,
        "name" => "Rohit Sharma",
        "details" => [
            "age" => 21,
            "course" => "BCA",
            "marks" => [
                "math" => 95,
                "english" => 88,
                "computer" => 91
            ]
        ]
    ],
    [
        "id" => 2,
        "name" => "Virat Kohli",
        "details" => [
            "age" => 22,
            "course" => "BSc IT",
            "marks" => [
                "math" => 72,
                "english" => 69,
                "computer" => 75
            ]
        ]
    ],
    [
        "id" => 3,
        "name" => "KL Rahul",
        "details" => [
            "age" => 20,
            "course" => "BCA",
            "marks" => [
                "math" => 40,
                "english" => 35,
                "computer" => 50
            ]
        ]
    ],
    [
        "id" => 4,
        "name" => "Hardik Pandya",
        "details" => [
            "age" => 23,
            "course" => "BSc IT",
            "marks" => [
                "math" => 85,
                "english" => 92,
                "computer" => 88
            ]
        ]
    ]
];

// total marks
// average marks

// Apply Grade System
//     Average    Grade
//     90+    A
//     75–89    B
//     60–74    C
//     40–59    D
//     <40    F

// Find Topper Student

// Print Only BCA Students with Grade


// total marks
// Get marks array

function getGrade($average) {
    if ($average >= 90) {
        return "A";
    } elseif ($average >= 75) {
        return "B";
    } elseif ($average >= 60) {
        return "C";
    } elseif ($average >= 40) {
        return "D";
    } else {
        return "F";
    }
};


$topper = "";
$highestAvg = 0;

//echo PHP_EOL;
$Bca = [];

foreach ($students as $student){


    $marks = $student['details']['marks'];
    // print_r($marks);

    // Calculate total marks
    $total = $marks['math'] + $marks['english'] + $marks['computer'];
    //echo PHP_EOL;
   // echo $total;
    // print_r (count($marks));
    

    // Calculate average marks

    $average = round(($total / 3),2); 

    // Grade
    $grade = getGrade($average);



    // echo PHP_EOL;
    // echo "Student: " . $student['name'] ;
    // echo PHP_EOL;
    // echo "Total Marks: " . $total;
    // echo PHP_EOL;
    // echo "Average Marks: " . $average ;



    // Apply Grade System
//     Average    Grade
//     90+    A
//     75–89    B
//     60–74    C
//     40–59    D
//     <40    F

// Find Topper Student

// Print Only BCA Students with Grade






//echo PHP_EOL;
 
if ($average > $highestAvg) {
        $highestAvg = $average;
        $topper = $student['name'];
    }

//echo 'Topper result:- ' . $topper . 'with avarage salary ' . $highestAvg;

// if ($average >= 90 and $grade = 'A'){
//     echo 'Topper Student '. " :- " . $student['name']. 'and the ID is ' . $student['id'];
// };





if ($student['details']['course'] === "BCA") {

        // $marks = $student['details']['marks'];
        // $total = array_sum($marks);
        // $average = round($total / count($marks),2);
        // $grade = getGrade($average);

        // echo "\nStudent: " . $student['name'];
        // echo "\nCourse: BCA";
        // echo "\nAverage: $average";
        // echo "\nGrade: $grade\n";

        $Bca[] = [
            "name"=>$student['name'],
            "id"=>$student['id'],
            "grade"=>$grade
        ];
        //print_r ($Bca);
    };
 




    
 
}
print_r($Bca);