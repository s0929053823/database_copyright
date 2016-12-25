<?php
require_once 'config.php';
require_once 'querybook.php';
class Publisher
{
    public $id,$companyName,$owner,$website,$telephone,$foundDate,$imgSrc;


    static function GetAll(){
        $result = array();
        $publishers =  getPublishers();
        foreach ($publishers as $publisher){
            array_push($result,new Publisher($publisher));
        }
        return $result;
    }

    static function GetByID($id){
        return new Publisher(getPublisherByID($id));
    }

    static function Delete($id){
        deletePublisher($id);
    }

    static function Update($id,$companyName,$owner,$website,$telephone,$foundDate,$imgSrc,$description){

        updatePublisher($id,$companyName,$owner,$website,$telephone,$foundDate,$imgSrc,$description);
    }

    static function Insert($companyName,$owner,$website,$telephone,$foundDate,$imgSrc,$description){
        insertPublisher($companyName,$owner,$website,$telephone,$foundDate,$imgSrc,$description);
    }

    public function __construct($publisher)
    {
        $this->id = $publisher['Publisher_ID'];
        $this->url= APP_URL."publisher.php?value=".$this->id;
        $this->companyName = $publisher['Name'];
        $this->owner = $publisher['Owner'];
        $this->website = $publisher['Website'];
        $this->telephone = $publisher['Telephone'];
        $this->foundDate = $publisher['Founded_Date'];
        $this->description =  $publisher['Description'];
        $this->imgSrc = $publisher['ImgSrc']!=null?$publisher['ImgSrc']:"img/no_image.jpg";
    }

}