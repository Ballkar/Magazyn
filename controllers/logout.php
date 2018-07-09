<?php

if (isset($_SESSION['zalogowany'])&&$_SESSION["zalogowany"]=true){
    unset($_SESSION['zalogowany']);
    unset($_SESSION['admin']);
    session_destroy();
}

require_once "view/logout.php";