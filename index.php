<?php
//  project Name: Banking System
// Features:
//     create bank account
//     deposit money
//     withdraw money
//     savings account earns interest



// project structure:
// bank-
//     |--bankAccount.php
//        |-- deposit,withdraw,show
       
//        |--savingsAccount.php
//           |--addInterest
    
//     |--index
        


// sample O/p:

// Account Holder: saptarshi
// Current Balance: 5000

// Deposited: 2000
// Withdrawn: 1500

// Interest Added: 275
// Account Holder: saptarshi
// Current Balance: 5775 

// ----------------------------------------------------------------
require_once 'savingsAccount.php';

// Create account
$account = new savingsAccount("soptarshi", 5000,5.5);

// Show initial balance

while(true){
    $choice = (int)readline("Enter your choice (1-4): ");
    switch ($choice) {
    case 1:
        $amount = (int)readline("Enter amount to deposit: ");
        $account->deposit($amount);
        break;

    case 2:
        $amount = (int)readline("Enter amount to withdraw: ");
        $account->withdraw($amount);
        break;

    case 3:
        $balance = $account->show();
        print_r($balance);        
        break;

    case 4:
        $account->addInterest();
        break;
        
    case 5:
        exit();

    default:
        echo "Invalid choice! Please select 1-4.\n";
        break;

}

}

?>

