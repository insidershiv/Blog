<?php

function autoloadClass($className)
{
    $path =  $_SERVER["DOCUMENT_ROOT"];  // getting path of server or ROOT 
   
    $path = $path   . "/model";
      
    $className = explode('\\', $className);    //Exploading because when using namespce we get the namespace\classname
                                                             
    $className = end($className);             //so to get the classname out of what we got we use end() and update the classname


    $filename = $path  . "/". strtolower($className) . ".php";
    
    if (is_readable($filename)) {;
        
        require_once $filename;
    }
}



// to load classes which are in the Util Directory
function loadutilClass($className)

{
    
    $path =  $_SERVER["DOCUMENT_ROOT"];
    $path = $path . "/util";
    

    $filename = $path . '/' . strtolower($className) . '.php';

    if (is_readable($filename)) {
        require_once $filename;
    }
}

spl_autoload_register("loadutilClass");

spl_autoload_register("autoloadClass");
