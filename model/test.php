<?php

// require_once  __DIR__ . '/../up.php';
use model as m;

// require_once __DIR__ . "../../up.php";
// require_once __DIR__."/../up.php";


$path = realpath(__DIR__ . "../");
echo $path ."<hr>";

$base_dir = __DIR__;

$base_url = preg_replace("!^${doc_root}!", '', $base_dir);

echo $base_dir . "<hr>";



require_once __DIR__.'/../util/autoloader.php';







$blogmanager = new m\BlogManager();
//$usermanager = new model\UserManager();



?>