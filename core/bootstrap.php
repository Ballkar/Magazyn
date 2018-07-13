<?php
use App\core\App;
use App\core\database\querybuilder;
use App\core\database\connector;


App::bind('config',require_once "config.php");
App::bind('database', new querybuilder(connector::create(App::get('config')['database'])));

