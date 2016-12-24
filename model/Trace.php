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

    public function __construct($trace)
    {
       $this->memberID = $trace['Member_ID'];
       $this->solutionID = $trace['Solution_ID'];
    }

}


