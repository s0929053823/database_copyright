<?php
require_once 'config.php';
require_once 'querybook.php';

class Trace
{
    public $memberID,$solutionID;

    static function GetByMemberID($member)
    {
        $result = array();
        $traces = getTraceByMemberID($member);
        foreach ($traces as $trace){
          array_push($result,new Trace($trace));
        }
        return $result;
    }

    static function Insert($memberID,$solutionID){
        insertTrace($memberID,$solutionID);
    }

    static function  Delete($memberID,$solutionID){
        deleteTrace($memberID,$solutionID);
    }

    public function __construct($trace)
    {
       $this->memberID = $trace['Member_ID'];
       $this->solutionID = $trace['Solution_ID'];
    }

}


