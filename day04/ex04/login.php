<?php
session_start();
include("auth.php");
if (isset($_POST) && $_POST["login"] !== null && $_POST["passwd"] !==  null)
{
    if (auth($_POST["login"], $_POST["passwd"]))
    {
        $_SESSION["loggued_on_user"] = $_POST["login"];
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Le 42 Chat</title>
            <meta charset="utf-8">
        </head>
        <body>
        <H1>&nbsp&nbspLe 42 Chat</H1>
        <center>
        <iframe id="chat" name="chat" src="chat.php"
                scrolling="yes" frameborder="2"                        
                style="height: 550px; width: 90%; float: down; " align="up">
        </iframe>
        <br>
        <iframe name="speak" src="speak.php" frameborder="0" 
                style="overflow: hidden; height: 50px; width: 90%" align="bottom">
        </iframe>
        <br>
        <a href='logout.php'>Se déconnecter</a>
        <a href='javascript:refresh();'>Rafraîchir</a>
        <script langage="javascript">
        var frame = document.getElementById('chat');
        frame.onload = function() {
            frame.contentWindow.scrollTo(0, frame.contentWindow.document.getElementsByTagName('body')[0].scrollHeight);
        }

        function refresh () {
            frame.src = 'chat.php';
        }
        </script>
        </center>
        </body>
        </html>
        <?php
        exit();
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        echo "Identifiants non reconnus :/<br><br><br>";
        echo "<a href='create.html'>Créer un compte ?</a><br><br>";
        echo "<a href='index.html'>Rééssayer</a><br>";
        exit();
    }
}
echo "<a href='index.html'>Connectez vous d'abord ! :)</a><br><br><br>";
exit();
?>