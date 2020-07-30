<?php 

class HomeController
{

    public function __construct()
    {

    }

    public function index()
    {
        $this->getXMLData();
        
        include('../view/home.php');
    }

    public function calculate()
    {
        $this->getXMLData();

        $basecurrency = $_POST['basecurrency'];
        $acurrency = $_POST['acurrency'];
        $bcurrency = $_POST['bcurrency'];

        $abase = $acurrency / $basecurrency;
        $bbase = $bcurrency / $basecurrency ;

        $GLOBALS['crossrate'] = $abase / $bbase;

        include('../view/home.php');

    }

    private function getXMLData() {
        $url = "http://www.cbr.ru/scripts/XML_daily.asp";
        $xml = simplexml_load_file($url);

        $newXML = [];

        foreach($xml->children() as $valute) {
            array_push($newXML, $valute);
        }        
        
        $GLOBALS['newXML'] = $newXML;
    }
}

?>