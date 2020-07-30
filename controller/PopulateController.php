<?php 

class PopulateController
{

    public function __construct()
    {

    }

    public function index()
    {
        include('../view/populate.php');
    }

    public function populateDatabase()
    {
        $url = "http://www.cbr.ru/scripts/XML_daily.asp";
        $xml = simplexml_load_file($url);

        $newXML = [];

        foreach($xml->children() as $valute) {
            array_push($newXML, $valute);
        }   

        $database = new Database("vanillaphpapp");

        foreach ($newXML as $value) {
            $database->insert("currency", [
                "numCode"=>$value->NumCode,
                "charCode"=>$value->CharCode,
                "name"=>$value->Name,
                "value"=>$value->Value, 
                "date"=>"now()",
            ]);
        }
       
        include('../view/populate.php');
    }
}

?>