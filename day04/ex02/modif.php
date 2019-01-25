<?php
if (!isset($_POST["login"]) || !isset($_POST["oldpw"]) || !isset($_POST["newpw"]) || !isset($_POST["submit"]))
    exit("ERROR\n");
if ($_POST["login"] == null || $_POST["oldpw"] == null || $_POST["newpw"] == null || $_POST["submit"] == null || !isset($_POST) || !file_exists("../../docs/private/password"))
    exit("ERROR\n");
$series = file_get_contents("../../docs/private/password");
$tab = unserialize($series);
$old = hash("whirlpool", $_POST["oldpw"]);
foreach ($tab as $key=>$row)
{
    if ($row["login"] === $_POST["login"] && $row["passwd"] === $old)
    {
        $data = hash("whirlpool", $_POST["newpw"]);
        $tab[$key]["passwd"] = $data;
        $base = serialize($tab);
        file_put_contents('../../docs/private/password', $base);
        exit("OK\n");
    }
}    
exit("ERROR\n");
