<?php
if (!isset($_POST["login"]) || !isset($_POST["passwd"]) || !isset($_POST["submit"]))
{    
    echo("ERROR<br>");
    echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
    exit();
}
if ($_POST["login"] == null || $_POST["passwd"] == null || $_POST["submit"] == null || !isset($_POST))
{    
    echo("ERROR<br>");
    echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
    exit();
} 
if (file_exists("../../docs/private/password"))
{
    $series = file_get_contents("../../docs/private/password");
    $tab = unserialize($series);
    foreach ($tab as $row)
    {
        foreach ($row as $key=>$value)
        if ($key === "login" && $value === $_POST["login"])
        {
            echo("Login déjà utilisé<br>");
            echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
            exit();
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
echo("OK<br>");
echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
exit();
?>