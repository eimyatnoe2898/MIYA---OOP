<?php

spl_autoload_register('myAutoLoader');

// function myAutoLoader($className)
// {
    
//     $path = "classes/";
//     $extension = ".class.php";
//     $fullPath = $path. $className. $extension;

//     include_once $fullPath;
// }

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
    if(strpos($url,'includes') !== false)
    {
        $path = '../classes/';
    }
    else
    {
        $path = "classes/";
    }
    $extension = ".class.php";
    $fullPath = $path. $className. $extension;

    include_once $fullPath;
}