<?php
require_once 'config.php';
require_once 'querybook.php';


class Category
{
    public $id,$name;



    static function GetAll()
    {
        $result = array();
        $categorys =  getCategorys();
        foreach ($categorys as $category){
            array_push($result,new Category($category));
        }
        return $result;
    }

    static function GetByID($id){
        return new Category(getCategoryByID($id));
    }

    static function Delete($id){
        deleteCategory($id);
    }

    static function Update($id,$name){
        updateCategory($id,$name);
    }

    static function Insert($name){
        insertCategory($name);
    }

    public function __construct($category)
    {
        $this->id =$category['Category_ID'];
        $this->name = $category['Category_Name'];
    }

    public function GetSolutionNumber()
    {
        $solution = getNumberOfSolutionInCategory($this->id);
        return $solution['SolutionNumber'];
    }

    public function GetTextbookNumber()
    {
        $bookNumber = getNumberOfTextbookInCategory($this->id);
        return $bookNumber['Number'];
    }
}


