<?php

date_default_timezone_set('America/Chicago');

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

set_include_path(implode(PATH_SEPARATOR, array(
        dirname(__FILE__) . '/../library',
        get_include_path()
        )
    )
);

function autoload($class)
{
    include str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
}

function namespaceAutoload($class) 
{
    include str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
}

spl_autoload_register('namespaceAutoload');
spl_autoload_register('autoload');