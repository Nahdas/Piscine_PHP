<?php
if (!isset($_POST["login"]) || !isset($_POST["oldpw"]) || !isset($_POST["newpw"]) || !isset($_POST["submit"]))
{
    echo("ERROR<br>");
    echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
    exit();
}
if ($_POST["login"] == null || $_POST["oldpw"] == null || $_POST["newpw"] == null || $_POST["submit"] == null || !isset($_POST) || !file_exists("../../docs/private/password"))
{ 
    echo("ERROR<br>");
    echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
    exit();
}
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
        echo("OK<br>");
        echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
        exit();
    }
}    
echo("ERROR<br>");
echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";
exit();
