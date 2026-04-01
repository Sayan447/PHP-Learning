<?php
require_once 'savingsAccount.php';

// class BankAccount {
//   public $name;
//   public $balance;
// // 

//   function __construct($name, $balance) {
//     $this->name = $name;
//     $this->balance = $balance;
//   }
// }

// $acc1 = new BankAccount("Saptarshi", 5000);
// print_r ($acc1);



   

class BankAccount {
    private $accountHolder;
  protected $balance;


    // it takes the initial value 
    public function __construct($name, $balance = 0) {
        $this->accountHolder = $name;
        $this->balance = $balance;
    }

     public function deposit($amount) {
        $this->balance += $amount;
        echo "Deposited: $amount\n";
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawn: $amount\n";
        }
    }

    public function show() {
        // echo "Account Holder: {$this->accountHolder}\n";
        // echo "Current Balance: {$this->balance}\n";
        return $this->balance;
    }
}


// $result = new BankAccount("Saaptarshi" , 5000);
// $result = new savingsAccount('saptarshi' , 8000);
// print_r($result);
?>