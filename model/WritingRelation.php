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

    static function GetAuthorByTextbookID($textbookID)
    {
        $result = array();
        $authors= getAuthorsByTextbookID($textbookID);
        foreach ($authors as $author){
            array_push($result,Author::GetByID($author['Author_ID']));
        }
        return $result;
    }

    public function __construct($WR)
    {
        $this->textbookID = $WR['Textbook_ID'];
        $this->authorID = $WR['Author_ID'];
    }
}


