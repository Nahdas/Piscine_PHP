<?php

class Jaime extends Lannister {

    public function sleepWith($people) {

        if ($people != "" || !isset($people))
            switch ($people) {
            case "Tyrion" :
                print("Not even if I'm drunk !\n");
                return;
            case "Cersei":
                print("With pleasure, but only in a tower in Winterfell, then.\n");
                return;
            }
            print("Let's do this.\n");
            return;   
    }

    public function __toString (){
        return "Jaime";
    }
}



?>