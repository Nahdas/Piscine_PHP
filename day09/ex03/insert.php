<?php

if ($_POST["id"] != "" && $_POST["name"] != "")
{
    if (!file_exists("list.csv"))
    {
        $fd = fopen("list.csv", "a+");
        flock($fd, LOCK_EX);
        $tab = array("id"=>$_POST["id"], "item"=>$_POST["name"]);
        fputcsv($fd, $tab, ";");
        flock($fd, LOCK_UN);
        fclose($fd);
        echo(true);
    }
    else
    {
        $add = $_POST['id'] . ";" . $_POST['name'] . "\n";
        file_put_contents("list.csv", file_get_contents("list.csv") . $add);
        echo(true);
    }
}
else
    echo(false);
?>