<?php
//Load config file
require 'config/config.php';

//Autoload core libraries
spl_autoload_register(function($className){
    require 'libraries/' . $className . '.php';
});
