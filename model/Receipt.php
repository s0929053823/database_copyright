<?php
require_once 'config.php';
require_once 'querybook.php';

class Receipt
{
    public $id,$buyerID,$buyingDate,$total,$amount,$destination,$description;

    static function GetByBuyerID($memberID)
    {
        $result = array();
        $receipts = getReceiptByMemberID($memberID);
        foreach ($receipts as $receipt){
            array_push($result, new Receipt($receipt));
        }
        return $result;
    }

    static function GetByID($id){
        $receipt = getReceiptByID($id);
        return new Receipt($receipt);
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

