<?php
require_once 'config.php';
require_once 'querybook.php';
require_once 'textbook.php';
require_once 'model/Member.php';
require_once 'model/WritingRelation.php';
class Solution
{
    public $id,$isActive,$isForbidden,$title,$price,$chapterNo,$textbookID,$creatorID,$createDate,$description;
    static function GetAll()
    {
        $result = array();
        $solutions =  getSolutions();
        foreach ($solutions as $solution){
            array_push($result,new Solution($solution));
        }
        return $result;
    }

    static function GetByID($id){
        return new Solution(getSolutionByID($id));
    }

    static function Update($id,$memberID,$title,$price,$textbook,$chapter,$description){
        updateSolution($id,$memberID,$title,$price,$textbook,$chapter,$description);
    }

    static function Insert($memberID,$title,$price,$textbook,$chapter,$description){
        insertSolution($memberID, $title, $price, $textbook, $chapter, $description);
    }
    static function BlockSoltuion($id){
        blockSolution($id);
    }

    static function UnblockSolution($id){
        unblockSolution($id);
    }

    static function ActiveSolution($id){
        activeSolution($id);
    }

    static function DeactiveSolution($id){
        deactiveSolution($id);
    }

    static function GetByMemberID($memberID){
        $result = array();
        $solutions = getSolutionsByCreator($memberID);
        foreach ($solutions as $solution){
            array_push($result,new Solution($solution));
        }
        return $result;
    }

    static function getURL($id)
    {
        return (APP_URL."solution.php?value=".$id);
    }

    public function __construct($solution)
    {
        $this->id = isset($solution['Solution_ID'])?$solution['Solution_ID']:null;
        $this->url= isset($solution['Solution_ID'])?APP_URL."solution.php?value=".$this->id:null;
        $this->isActive=  $solution['isActive'];
        $this->isForbidden = $solution['isForbidden'];
        $this->title = $solution['Title'];
        $this->price = $solution['Price'];
        $this->chapterNo =$solution['Chapter_Number'] ;
        $this->textbookID = $solution['Textbook_ID'];
        $this->creatorID = $solution['Creater_ID'];
        $this->createDate = $solution['Create_Date'];
        $this->description = $solution['Description'];
        $this->discountRate = 100;
        $this->discountID = null;
        $this->getMinRate();

    }

    public function getMinRate (){
        $textbook=Textbook::GetByID($this->textbookID);
        $authors = WritingRelation::GetAuthorByTextbookID($textbook->id);
        $discounts = getDiscountBySolution($textbook->publisher,$authors,$textbook->id);
        foreach ($discounts as $discount){
            if($this->discountRate>$discount['Rate']){
                $this->discountRate = $discount['Rate'];
                $this->discountID = $discount['Discount_ID'];
            }
        }
    }

}


