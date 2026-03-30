<?php
// class User {
//     public $name;

//     function sayHello() {
//         echo "Hello " . $this->name;
//     }
// }

// $user1 = new User();
// $user1->name = "Rahul";
// $user1->sayHello();

// class Person {
//     public function speak() {
//         echo "Speaking...";
//     }
// }

// class Student extends Person {
// }

// $s = new Student();
// $s->speak(); // inherited





// class Student {
//     public $name;

//     function __construct($n) {
//         $this->name = $n;
//         echo "Constructor called ";
//     }
// }

// $s1 = new Student("Rahul");
// echo ($s1->name);



class TestClass {
  public $value;

  // Constructor Method
  public function __construct($val) {
    $this->value = $val;
  }

  // Destructor Method
  public function __destruct() {
    echo "Object is being destroyed.";
  }
}

$obj = new TestClass("Hello World");
echo $obj->value; 
