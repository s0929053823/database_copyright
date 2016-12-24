<?php
require_once 'config.php';
require_once 'querybook.php';

class Textbook
{
    public $id,$categoryID,$title,$imgSrc,$ISBN10,$ISBN13,$edition,$publisherID,$publishYear,$description;
    static function GetAll()
    {
        $result = array();
        $textbooks =  getTextbooks();
        foreach ($textbooks as $textbook){
            array_push($result,new Textbook($textbook));
        }
        return $result;
    }

    static function GetByID($id){
        return new Textbook(getTextbookByID($id));
    }

    static function Insert($categoryID,$isbn10,$isbn13,$title,$edition,$publisher,$publishYear,$description,$imgSrc){
        return insertTextbook($categoryID,$isbn10,$isbn13,$title,$edition,$publisher,$publishYear,$description,$imgSrc);
    }

    static function Update($textbookID,$categoryID,$isbn10,$isbn13,$title,$edition,$publisher,$publishYear,$description,$imgSrc){
        updateTextbook($textbookID,$categoryID,$isbn10,$isbn13,$title,$edition,$publisher,$publishYear,$description,$imgSrc);
    }

    static function Delete($textbookID){
        deleteTextbook($textbookID);
    }

    public function __construct($textbook)
    {
        $this->id = $textbook['Textbook_ID'];
        $this->url = APP_URL."textbook.php?value=".$this->id;
        $this->categoryID = $textbook['Category_ID'];
        $this->title = $textbook['Title'];
        $this->imgSrc = ($textbook['ImgSrc']!=null)?$textbook['ImgSrc']:"img/no_image.jpg";
        $this->ISBN10 = $textbook['ISBN_10'];
        $this->ISBN13 = $textbook['ISBN_13'];
        $this->edition = $textbook['Edition'];
        $this->publisher = isset($textbook['Publisher_ID'])?$textbook['Publisher_ID']:null;
        $this->publishYear = $textbook['Publish_Year'];
        $this->description = $textbook['Description'];
    }

}


