<?php
require_once 'config.php';
require_once 'querybook.php';

class Author
{
    public $id,$name,$description;

    static function GetAll()
    {
//        $result = array();
//        $schools=
//        foreach ($schools as $school){
//            array_push($result,new School($school));
//        }
//        return $result;
    }


    static function GetByID($id){
        return new Author(getAuthorByID($id));
    }


    public function __construct($author)
    {
        $this->id =$author['Author_ID'];
        $this->name=$author['Name'];
        $this->description =$author['Description'];
    }


}


