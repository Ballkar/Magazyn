<?php
App::get('database')->log('user', $_POST["login"],$_POST["password"]);



require "view/index.view.php";
