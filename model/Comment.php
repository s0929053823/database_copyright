<?php
require_once 'config.php';
require_once 'querybook.php';
require_once 'model/Member.php';
require_once 'model/Solution.php';

class Comment
{
    public $memberID,$solutionID,$comment,$commentDate;


    static function GetByMemberID($memberID)
    {

    }

    static function GetBySolutionID($solutionID)
    {
        $result = array();
        $comments = getCommentsBySolutionID($solutionID);
        foreach ($comments as $comment) {
            array_push($result, new Comment($comment));
        }
        return $result;
    }

    static function GetCommentByMemberAndSolution($member,$solution)
    {

    }

    public function __construct($comment)
    {
        $this->memberID = $comment['Member_ID'];
        $this->solutionID = $comment['Solution_ID'];
        $this->comment = $comment['Comment'];
        $this->commentDate = $comment['Comment_Date'];
    }
}


