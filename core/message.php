<?php
namespace App\core;

class message
{

    public static function ShowAndDelete($message,$class){
        if (isset($_SESSION[$message])){
            echo "<span class=$class>".$_SESSION[$message]."</span>";
            unset($_SESSION[$message]);
        }
    }
    public static function ShowValueAndDelete($message){
        if (isset($_SESSION[$message])) {
            echo $_SESSION[$message];
            unset($_SESSION[$message]);
        }
    }
    public static function ShowMassage($message,$class){
            echo "<span class=$class>".$message."</span>";
        }

}