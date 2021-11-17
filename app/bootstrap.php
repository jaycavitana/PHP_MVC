<?php
date_default_timezone_set('Asia/Manila');

//Load config file
require 'config/config.php';

//Load helpers
require 'helpers/upload_helper.php';
require 'helpers/response_helper.php';
require 'helpers/authentication_helper.php';
require 'helpers/email_helper.php';
require 'helpers/randomString_helper.php';
require 'helpers/s3_upload_helper.php';

//require 'helpers/pdf_helper.php';
//require 'helpers/word_helper.php';
//require 'helpers/ses_email_helper.php';
//require 'helpers/firebaseNotif_helper.php';
//require 'helpers/maps_helper.php';
//require 'helpers/firebaseAPI_helper.php';
//require 'helpers/semaphore_helper.php';

//Autoload core libraries
spl_autoload_register(function($className){
    try {
        if (! @include_once('libraries/' . $className . '.php')) // @ - to suppress warnings, 
        // you can also use error_reporting function for the same purpose which may be a better option
            throw new Exception ('File does not exist');
        // or 
        if (!file_exists('libraries/' . $className . '.php'))
            throw new Exception ('file does not exist');
        else
            require_once('libraries/' . $className . '.php'); 
    }
    catch(Exception $e) {
        
    }
});
