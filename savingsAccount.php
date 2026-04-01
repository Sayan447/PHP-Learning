<?php
require_once 'bankAccount.php';

class savingsAccount extends bankAccount {
    public function addInterest() {
        // $interestRate = 2;
        $interest = ($this->balance*2)/100;
        echo "Interest Added: $interest\n";

    }
}
// $objsaving = new savingsAccount();
// $objsaving->addInterest();
?>
