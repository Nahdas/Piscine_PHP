<?php

function auth($login, $passwd)
{
    if (isset($login) && isset($passwd) && $login !== null && $passwd !== null && file_exists("../../docs/private/password"))
    {
        $series = file_get_contents("../../docs/private/password");
        $tab = unserialize($series);
        $pass = hash("whirlpool", $passwd);
        foreach ($tab as $key=>$row)
        {
            if ($row["login"] === $login && $row["passwd"] === $pass)
            {
                return(true);
                exit();
            }
        }  
    }
    return(false);
    exit();
}
?>