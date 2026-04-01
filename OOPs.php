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



// class TestClass {
//   public $value;

//   // Constructor Method
//   public function __construct($val) {
//     $this->value = $val;
//   }

//   // Destructor Method
//   public function __destruct() {
//     echo "Object is being destroyed.";
//   }
// }

// $obj = new TestClass("Hello World");
// echo $obj->value; 



// classes and object
// class class1{
//   public $x = 1;
//   function fun1(){

//     // echo ++$this->x;
//     return $this->x++;
//     echo PHP_EOL;
//   }

//   function fun2(){
//     echo "func2";
//   }

// }

// $obj = new class1();
// // $obj->fun1();
// echo $obj->x++;


class class1{
  public $x = 1;
  // ------------------
  function fun1(){
    return $this->x++;
  }
}
// this->x++ :- means: “use the current object”

// we are creating two different objects, each with its own $x.
$obj1=new class1();
$obj2=new class1();


$obj1->fun1();
echo $obj2->x;
