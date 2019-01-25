<?php

include_once('UnholyFactory.class.php');
include_once('Fighter.class.php');

class UnholyFactory{
    public $army = array();

    public function absorb($name)
    {
       // echo "aaa".$name->__construct(). "\n\n\n\n\n";
        if ($name instanceof Fighter)
        {
            foreach ($this->army as $soldier)
            {
                $present = $soldier->post;
                $new = $name->post;
                if ($present === $new)
                {
                    print ("(Factory already absorbed a fighter of type " . $new . ")" . PHP_EOL);
                    return;
                }
                               
            }
            $this->army[] = $name;
            print ("(Factory absorbed a fighter of type " . $name->post . ")" . PHP_EOL);
        }
        else
            print ("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
        return;
    }
    public function fabricate($name)
    {
        foreach ($this->army as $model)
        {
            if ($model->post === $name)
            {
                print("(Factory fabricates a fighter of type " . $name . ")" . PHP_EOL);
                return ($model);
            }
        }
        print("(Factory hasn't absorbed any fighter of type " . $name . ")" . PHP_EOL);
        return;
    }
}


?>