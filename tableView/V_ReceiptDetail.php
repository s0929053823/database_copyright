<?php
require_once 'config.php';
require_once 'querybook.php';
/**
 * Created by PhpStorm.
 * User: WeiLun
 * Date: 12/24/2016
 * Time: 12:45 AM
 */
class V_ReceiptDetail
{
    public $receiptID,$buyerID,$account,$solutionID,$solutionTitle,$transactionPrice,$description;

    static function GetByReceiptID($receiptID){
        $result = array();
        $details =  getReceiptDetail($receiptID);
        foreach ($details as $detail){
            array_push($result,new v_ReceiptDetail($detail));
        }
        return $result;
    }

    public function __construct($v_receipt)
    {
        $this->receiptID = $v_receipt['Receipt_ID'];
        $this->buyerID = ['Buyer_ID'];
        $this->account = $v_receipt['Account'];
        $this->solutionID = $v_receipt['Solution_ID'];
        $this->solutionTitle= $v_receipt['Title'];
        $this->transactionPrice = $v_receipt['Price'];
        $this->description = $v_receipt['Description'];
    }


}