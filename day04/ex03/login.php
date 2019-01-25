<?php
session_start();
include("auth.php");
if (isset($_GET) && $_GET["login"] !== null && $_GET["passwd"] !==  null)
{
    if (auth($_GET["login"], $_GET["passwd"]))
    {
        $_SESSION["loggued_on_user"] = $_GET["login"];
        exit("OK\n");
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        exit("ERROR\n");
    }
}
exit("ERROR\n");
?>