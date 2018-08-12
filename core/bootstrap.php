<?php

use App\core\App;
use App\core\database\QueryBuilder;
use App\core\database\Connector;

App::bind('config', require_once "config.php");
App::bind('database', new querybuilder(connector::create(App::get('config')['database']), App::get('config')));
