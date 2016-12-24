<?php
require_once 'config.php';
require_once 'querybook.php';
require_once 'model/Textbook.php';
require_once 'model/Author.php';

class WritingRelation
{
    public $textbookID,$authorID;

    static function GetByAuthorID()
    {

    }

    static function Insert($textbookID,$authorID){
        insertWritingRelation($textbookID,$authorID);
    }

    static function Delete(){

    }

    static function DeleteByTextbookID($textbookID){
        deleteWRbyTextbookID($textbookID);
    }

    static function GetAuthorByTextbookID($textbookID)
    {
        $result = array();
        $authors= getAuthorsByTextbookID($textbookID);
        foreach ($authors as $author){
            array_push($result,Author::GetByID($author['Author_ID']));
        }
        return $result;
    }

    static function GetTextbookByAuthorID($authorID){
        $result =array();
        $textbooks = getTextbooksByAuthorID($authorID);
        foreach ($textbooks as $textbook){
            array_push($result,Textbook::GetByID($textbook['Textbook_ID']));
        }
        return $result;

    }

    public function __construct($WR)
    {
        $this->textbookID = $WR['Textbook_ID'];
        $this->authorID = $WR['Author_ID'];
    }
}


