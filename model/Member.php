<?php
require_once 'config.php';
require_once 'querybook.php';
class Member
{
    public $id,$account,$password,$point,$email,$start_date,$type,$birthday,$sd_id,$img ;
    private  $userType = array("管理員", "一般用戶", "高級用戶");

    static function Insert(){

    }

    static function Update($id,$account,$password,$email,$birthday){
        updateMember($id,$account,$password,$email,$birthday);
    }

    static function GetAll()
    {
        $result = array();
        $members =  getMembers();
        foreach ($members as $member){
            array_push($result,new Member($member));
        }
        return $result;
    }

    static function GetByID($id)
    {
        return new Member(getMember($id));
    }

    public function __construct($member)
    {
        $this->id = isset($member['Member_ID'])?$member['Member_ID']:null;
        $this->url= isset($member['Member_ID'])?APP_URL."profile.php?userid=".$this->id:null;
        $this->account =  $member['Account'];
        $this->password = $member['Password'];
        $this->point = $member['Point'];
        $this->email = $member['Email'];
        $this->start_date =$member['Start_Date'] ;
        $this->type = $member['Type'];
        $this->birthday = $member['Birthday'];
        $this->sd_id = $member['sd_id'];
        $this->img = "https://ssl.gstatic.com/accounts/ui/avatar_2x.png";

    }

}


