<?php
require_once 'config.php';
require_once 'querybook.php';
require_once 'model/Publisher.php';
require_once 'model/Textbook.php';
require_once 'model/Author.php';

class Discount
{
    public $id,$description,$rate,$startDate,$endDate,$type,$dependent;


    static function GetAll()
    {
        $result = array();
        $discounts= getDiscounts();
        foreach ($discounts as $discount){
            array_push($result,new Discount($discount));
        }
        return $result;
    }

    static function Insert($description,$s_time,$e_time,$rate,$type,$dependent){
        $id = insertDiscount($description,$s_time,$e_time,$rate);
        setDiscount($type,$id,$dependent);
    }

    static function Delete($id){
        deleteDiscount($id);
    }

    static function GetByID($id){
        return new Discount(getDiscountByID($id));
    }

    public function __construct($discount)
    {
        $this->id =$discount['Discount_ID'];
        $this->description =$discount['Description'];
        $this->rate = $discount['Rate'];
        $this->startDate = $discount['Start_Date'];
        $this->endDate = $discount['End_Date'];
        $this->GetTypeAndDependent();
    }

    private function GetTypeAndDependent(){
        $type = getDiscountType($this->id);
        if($type['Publisher_ID']!=null){
            $this->type = 0;
            $this->dependent = $type['Publisher_ID'];
        }
        elseif ($type['Author_ID']!=null){
            $this->type = 1;
            $this->dependent = $type['Author_ID'];
        }
        elseif($type['Textbook_ID']!=null){
            $this->type = 2;
            $this->dependent = $type['Textbook_ID'];
        }

    }

}


