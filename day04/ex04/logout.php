<?php
header("Location: index.html");
session_start();
if (isset($_SESSION) && isset($_SESSION["loggued_on_user"]))
{
    unset($_SESSION["loggued_on_user"]);
    unset($_SESSION);
}

?>