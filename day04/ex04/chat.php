<?php
session_start();
if (file_exists("../../docs/private/chat")){
    date_default_timezone_set("CET");
    $fp = fopen("../../docs/private/chat", "r");
    if (flock($fp,LOCK_SH)){
        $data = file_get_contents("../../docs/private/chat");
        $tab = unserialize($data);
        foreach($tab as $row)
        {
            $date = date("d/m H:i:s", $row["time"]);
            echo "<i>";
            echo $date;
            echo "</i></br>         ";
            echo "<b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo $row["login"];
            echo "</b>: ";
            echo $row["msg"]."<br><br>";
        }
        flock($fp, LOCK_UN);
    }
    else{
        echo "Fichier non verrouillé\n";
    }
}

?>