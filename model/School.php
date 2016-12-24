<?php
require_once 'config.php';
require_once 'querybook.php';
class School
{
    public $id,$nameCHT,$nameENG;

    static function GetAll()
    {
        $result = array();
        $schools=  getSchools();
        foreach ($schools as $school){
            array_push($result,new School($school));
        }
        return $result;
    }

    static function GetByID($id){
        $school = getSchoolByID($id);
        return new School($school);
    }

    public function __construct($school)
    {
        $this->id = isset($school['school_id'])?$school['school_id']:null;
        $this->nameCHT = $school['name_cht'];
        $this->nameENG = $school['name_eng'];
    }
}


