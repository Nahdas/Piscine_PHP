<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION["loggued_on_user"]) || $_SESSION["loggued_on_user"] == "")
{
    echo "Vous êtes déconnecté\n<br><br><a href=index.html>Connectez vous ! :) </a>";
    exit();
}
if (isset($_POST) && isset($_POST["msg"])){
    if (!file_exists("../../docs/private/chat"))
        file_put_contents('../../docs/private/chat', "");
    date_default_timezone_set("CET");
    $fp = fopen("../../docs/private/chat", "r+");
    if (flock($fp,LOCK_EX)){
        $data = file_get_contents("../../docs/private/chat");
        $tab = unserialize($data);
        $time = time();
        $tab[] = array("login"=>$_SESSION["loggued_on_user"], "time"=> $time, "msg"=>$_POST["msg"]);
        $str = serialize($tab);
        file_put_contents('../../docs/private/chat', $str);
        flock($fp, LOCK_UN);
    }
    else{
        echo "Fichier non verrouillé\n";
    }
}
?>
<!DOCTYPE html>
    <html>
        <head>
        <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
            <meta charset="utf-8" />
            <style>
                input {
                    width:99%;
                    height:100%;
                    border:"2";
                }
            </style>
        </head>
    <body>
        <form action="speak.php" method="post">
             <input type="text" name="msg"><br>
        </form>
    </body>
    </html>