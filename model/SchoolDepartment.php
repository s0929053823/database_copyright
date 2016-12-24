<?php
require_once 'config.php';
require_once 'querybook.php';
require_once 'model/School.php';
require_once 'model/Department.php';

class SchoolDepartment
{
    public $id,$schoolID,$departmentID;

    static function GetByID($id){
        $SD = getSchoolDepartmentByID($id);
        return new SchoolDepartment($SD);
    }

    static function GetDepartmentsBySchoolID($schoolID){
        $result = array();
        $departments = getDepartmentsBySchoolID($schoolID);
        foreach ($departments as $department){
            array_push($result, Department::GetByID($department['department_id']));
        }
        return $result;
    }

    public function __construct($SD)
    {
        $this->id = $SD['sd_id'];
        $this->schoolID = $SD['school_id'];
        $this->departmentID = $SD['department_id'];
    }
}


