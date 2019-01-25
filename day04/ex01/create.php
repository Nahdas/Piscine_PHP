<?php
if (!isset($_POST["login"]) || !isset($_POST["passwd"]) || !isset($_POST["submit"]))
    exit("ERROR\n");
if ($_POST["login"] == null || $_POST["passwd"] == null || $_POST["submit"] == null || !isset($_POST))
    exit("ERROR\n");
if (file_exists("../../docs/private/password"))
{
    $series = file_get_contents("../../docs/private/password");
    $tab = unserialize($series);
    foreach ($tab as $row)
    {
        foreach ($row as $key=>$value)
        {
        if ($key === "login" && $value === $_POST["login"]) 
                exit("ERROR\n");
        }
    }
    $data = hash("whirlpool", $_POST["passwd"]);
    $tab[] = array("login"=>$_POST["login"], "passwd"=>$data);
    $base = serialize($tab);
    file_put_contents('../../docs/private/password', $base);
}
else
{
    echo"asd";
    $data = hash("whirlpool", $_POST["passwd"]);
    $tab[] = array("login"=>$_POST["login"], "passwd"=>$data);
    $base = serialize($tab);
    file_put_contents('../../docs/private/password', $base);
}
exit ("OK\n");
?>