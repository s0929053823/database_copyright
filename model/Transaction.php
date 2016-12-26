<?php
require_once 'config.php';
require_once 'querybook.php';

class Transaction
{
    public $id,$solutionID,$price,$quantity,$receiptID,$description;

    static function Insert($solutionID,$price,$receiptID,$description){
        insertTransaction($solutionID,$price,$receiptID,$description);
    }

    public function __construct($receipt)
    {
        $this->id = $receipt['Receipt_ID'];
        $this->buyerID = $receipt['Buyer_ID'];
        $this->buyingDate = $receipt['Buying_Date'];
        $this->total = $receipt['Total'];
        $this->amount = $receipt['Amount'];
        $this->destination = $receipt['Destinaton'];
        $this->description = $receipt['Description'];
    }

}

