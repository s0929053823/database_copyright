<?php
require_once 'config.php';
require_once 'querybook.php';
/**
 * Created by PhpStorm.
 * User: WeiLun
 * Date: 12/24/2016
 * Time: 12:45 AM
 */
class V_SolutionRate
{

    static function GetAverageRateByCreatorID($creatorID){
        $result = array();
        $avgRate = getMemberAverageRate($creatorID);
        return $avgRate['Average'];
    }

}