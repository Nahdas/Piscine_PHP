<?php

class Tyrion extends Lannister {

    public function sleepWith($people) {

        if ($people != "" || !isset($people))
            switch ($people) {
            case "Jaime" :
                print("Not even if I'm drunk !\n");
                return;
            case "Cersei":
                print("Not even if I'm drunk !\n");
                return;
            }
            print("Let's do this.\n");
            return;    
    }

    public function __toString (){
        return "Tyrion";
    }
}
?>