<?php

include_once('IFighter.class.php');

class   NightsWatch{

    public static $recruits;

    public function recruit($people){
        self::$recruits[] = $people;
        return;
    }
    public function fight(){
        foreach(self::$recruits as $fighter)
        {
            if (($fighter instanceof IFighter) == true)     
                $fighter->fight();
        }
        return;
    }
}

?>