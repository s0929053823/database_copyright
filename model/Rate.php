<?php
require_once 'config.php';
require_once 'querybook.php';
require_once 'model/Member.php';
require_once 'model/Solution.php';

class Rate
{
    public $memberID,$solutionID,$score;

    static function GetAverageRateOfSolution($solutionID){
        $avgRate = getAverageRate($solutionID);
        return $avgRate;
    }

    static function GetByMemberID($memberID)
    {

    }

    static function GetBySolutionID($soltuionID)
    {

    }

    static function GetRateByMemberAndSolution($member,$solution)
    {

    }

    public function __construct($rate)
    {

    }
}


