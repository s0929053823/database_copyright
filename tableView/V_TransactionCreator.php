<?php
require_once 'config.php';
require_once 'querybook.php';
/**
 * Created by PhpStorm.
 * User: WeiLun
 * Date: 12/24/2016
 * Time: 12:45 AM
 */
class V_TransactionCreator
{
    static function GetNumberOfPeopleBuy($creatorID){
            $number = getNumberOfPeopleBuy($creatorID);
            return $number['COUNT(*)'];
    }

}