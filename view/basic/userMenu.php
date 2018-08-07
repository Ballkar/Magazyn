<?php
if (isset($_SESSION["zalogowany"])&&$_SESSION['zalogowany']=true) {
    require_once "logoutForm.php";
} else {
    require_once "logForm.php";
}
