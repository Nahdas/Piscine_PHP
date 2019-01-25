<?php

if (isset($_GET))
{
    foreach($_GET as $key => $value)
    {
        switch($key){
            case "action":
            if ($value === "set")
                setcookie($_GET["name"], $_GET["value"], time() + 3600);
            if ($value === "get")
            {
                $cook = $_GET["name"];
                if (isset($_COOKIE[$cook]))
                    echo $_COOKIE[$cook]."\n";
            }
            if ($value === "del")
            {
            $cook = $_GET["name"];
            setcookie($cook, "0", time() -1);
            }
        }
    }
} 
?>