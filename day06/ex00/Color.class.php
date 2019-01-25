<?php
Class Color{

    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = false;

    function __construct( array $kwargs) {
        if (array_key_exists('red', $kwargs))
            $this->red = $kwargs["red"];
        if (array_key_exists('green', $kwargs))
            $this->green = $kwargs["green"];
        if (array_key_exists('blue', $kwargs))
            $this->red = $kwargs["blue"];
        echo "Color( red: ".$this->red.",green: ".$this->green.", blue: ".$this->blue;
        echo " constructed";
        return;
    }

    function __toString() {
        if ($verbose = true)
        {
            echo "Color( red: ".$this->red.",green: ".$this->green.", blue: ".$this->blue;
        }
        return;
    }

    function static doc () {
        $str = file_get_contents("Color.doc.txt");
        echo $str;
        return;
    }


    function add(){
        return;
    }

    function sub(){
        return;
    }

    function mult(){
        return;
    }
    function __destruct(){
        echo "Color( red: ".$this->red.",green: ".$this->green.", blue: ".$this->blue;
        echo " deconstruted";
        return;
    }

}




?>