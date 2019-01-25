<?php
if (file_exists("list.csv"))
{
    $fd = fopen("list.csv", "a+");
    flock($fd, LOCK_EX);
    $str = file_get_contents("list.csv");
    $tab = array();
    while ($csv = fgetcsv($fd, 0, ";")) {
        $tab[] = $csv;
    }
    flock($fd, LOCK_UN);
    fclose($fd);
    echo json_encode($tab);
    }
?>