<?php
require_once 'config.php';
require_once 'querybook.php';

class Author
{
    public $id,$name,$description,$imgSrc;

    static function GetAll()
    {
        $result = array();
        $authors = getAuthors();
        foreach ($authors as $author){
            array_push($result,new Author($author));
        }
        return $result;
    }

    static function GetURL($id){
        return APP_URL."author.php?value=".$id;
    }

    static function Insert($name,$description,$imgSrc){
        insertAuthor($name,$description,$imgSrc);
    }

    static function Update($id,$name,$description,$imgSrc){
        updateAuthor($id,$name,$description,$imgSrc);
    }

    static function Delete($id){
        deleteAuthor($id);
    }

    static function GetByID($id){
        return new Author(getAuthorByID($id));
    }


    public function __construct($author)
    {
        $this->id =$author['Author_ID'];
        $this->name=$author['Name'];
        $this->description =$author['Description'];
        $this->imgSrc= ($author['ImgSrc']!=null)?$author['ImgSrc']:"img/no_image.jpg";
        $this->url = APP_URL."author.php?value=".$this->id;
    }

}


