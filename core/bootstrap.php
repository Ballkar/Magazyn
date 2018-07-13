<?php

App::bind('config',require_once "config.php");
App::bind('database', new querybuilder(connector::create(App::get('config')['database'])));

