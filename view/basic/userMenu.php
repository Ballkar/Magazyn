<?php
if (isset($_SESSION["logged"])&&$_SESSION['logged']=true) {
    require_once "logoutForm.php";
} else {
    require_once "logForm.php";
}
