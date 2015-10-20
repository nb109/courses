<?php
class Slideset
{
    protected $data = array();

    protected $title = null;

    protected $style = null;

    public function __construct()
    {
	    if (empty($theme) && !empty($_GET['theme'])) {
		    $theme = $_GET['theme'];
	    }

	    if (empty($theme) && !empty($_SERVER['REQUEST_URI'])) {
		    $theme = $_SERVER['REQUEST_URI'];
	    }

        if(file_exists(__DIR__.'/'.$theme.'/slides.xml')) {
            $this->loadXml(__DIR__.'/'.$theme.'/slides.xml');
        }
    }

    public function loadXml($xmlFile)
    {
        $xml = simplexml_load_file($xmlFile);
        if(!$xml) {
            return false;
        }

        $this->title = (string)$xml->title;
        $this->style = (string)$xml->style;

        foreach($xml->slideset as $slideset) {
            $this->data[] = (array)$slideset;
        }

        return true;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStyle()
    {
        return $this->style;
    }
}

class Slideshow extends Slideset
{
    public $id = null;

    public function __construct($id = null)
    {
        if (empty($id) && !empty($_GET['id'])) {
            $this->id = $_GET['id'];
        }

        parent::__construct();
    }

    public function getTitle()
    {
        $this->loadSlideshow();
        return $this->title;
    }

    public function getStyle()
    {
        $this->loadSlideshow();
        $style = $this->cleanString($this->style);
        return $style;
    }

    public function getFile()
    {
        $this->loadSlideshow();
        $file = $this->cleanString($this->file);
        $file = realpath('./'.$file.'.md');

        if(empty($file) || file_exists($file) == false) {
            die('Non-existant file: '.$file);
        }

        if(stristr($file, __DIR__) == false) {
            die('Invalid path: '.$file);
        }

        return $file;
    }

    public function loadSlideshow()
    {
        if(!empty($this->title) && !empty($this->file)) {
            return true;
        }

        if(empty($this->id)) {
            die('no slide');
        }

        foreach($this->getData() as $slideset) {
            if($slideset['id'] == $this->id) {
                $this->file = $slideset['file'];
                $this->title = $slideset['title'];
                $this->speaker = $slideset['speaker'];
                break;
            }
        }

        return true;
    }

    protected function cleanString($string)
    {
        return preg_replace('/([^a-zA-Z0-9\_\.\-\/]+)/', '', $string);
    }
}
