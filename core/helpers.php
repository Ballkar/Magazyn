<?php

function view($name, $data = [])
{
    extract($data);
    return require "view/{$name}.view.php";
}


function redirect($path)
{
    return header("Location: /{$path}");
}
