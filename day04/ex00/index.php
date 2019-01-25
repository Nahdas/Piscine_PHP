<?php
session_start();
if (isset($_GET) && $_GET["login"] !== null && $_GET["passwd"] !==  null && $_GET["submit"] === "OK")
{
    $_SESSION["login"] = $_GET["login"];
    $_SESSION["passwd"] = $_GET["passwd"];
}
if (!isset($_SESSION["login"]))
{
?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
        </head>
    <body>
        <form action="." method="get">
            Identifiant: <input type="text" name="login"><br>
            Mot de passe: <input type="passwd" name="passwd"><br>
            <input type="submit" name="submit" value="OK">
        </form>
    </body>
    </html>
<?php
}
else
{
?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
        </head>
    <body>
        <form action="." method="get">
            Identifiant: <input type="text" name="login" value="<?php session_start(); echo $_SESSION["login"]; ?>"><br>
            Mot de passe: <input type="passwd" name="passwd" value="<?php session_start(); echo $_SESSION["passwd"]; ?>"><br>
            <input type="submit" name="submit" value="OK">
        </form>
    </body>
    </html>
<?php
}
?>