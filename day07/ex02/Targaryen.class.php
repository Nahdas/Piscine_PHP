<?php

class Targaryen {

    public function resistsFire(){
        return FALSE;
    }

    public function getBurned(){
        if ($this->resistsFire() !== True)
            return ("burns alive");
        else
            return ("emerges alive naked but unharmed");
    }
}