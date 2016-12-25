<?php
require_once 'config.php';
require_once 'querybook.php';


class Department
{
    public $id,$nameCHT,$nameENG;

    static function GetAll()
    {
        $result = array();
        $departments=  getDepartments();
        foreach ($departments as $department){
            array_push($result,new Department($department));
        }
        return $result;
    }

    static function GetByID($id){
        $departement = getDepartmentByID($id);
        return new Department($departement);
    }

    static function GetBySchoolID($school_id)
    {
        return getDepartmentsBySchoolID($school_id);
    }

    public function __construct($department)
    {
        $this->id = isset($department['school_id'])?$department['school_id']:null;
        $this->nameCHT = $department['name_cht'];
        $this->nameENG = $department['name_eng'];
    }
}


