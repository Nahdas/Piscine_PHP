<?php

if (isset($_GET) && $_GET["id"] != null && $_GET["id"] != "")
{
    if (file_exists("list.csv"))
    {
        print($_GET["id"]."id");
        $fd = fopen("list.csv", "r");
        flock($fd, LOCK_EX);
        $tab = array();
        while ($csv = fgetcsv($fd, 0, ";")) {
            $tab[] = $csv;
        }
        fclose($fd);
        flock($fd, LOCK_UN);

        $fd = fopen("list.csv", "w");
        flock($fd, LOCK_EX);
        $duck = 1;
        $i = 0;
        while ($i < count($tab)) {
            if ($tab[$i][0] == $_GET["id"]) {
                $duck = 12;
                break;
            }
            $i++;
        }
        array_splice($tab, $i, 1);
        foreach ($tab as $line)
            fputcsv($fd, $line, ";");
        flock($fd, LOCK_UN);
        fclose($fd);
        if ($duck === 12)
        {
            echo "DELETED\n";
            return(true);
        }
        else
        {
            echo "UNFOUND\n";
            return(false);
        }
    }
}
else
    return(false);
    
?>