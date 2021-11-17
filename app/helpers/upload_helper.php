<?php
    function upload($file){
        //Check that we have a file
        if((!empty($file)) && ($file['error'] == 0)) {
    
            //Check if the file is JPEG image and it's size is less than 10mb
            $filename = strtolower(basename($file['name']));
            $ext = substr($filename, strrpos($filename, '.') + 1);
            
            if (
                ($ext == "jpg") && 
                ($file["type"] == "image/jpeg") && 
                ($file["size"] < 10000000)
                ) {
              
                  //Determine the path to which we want to save this file
                  $newname = dirname(__FILE__).'/uploads/'.$filename;
                
                  //Check if the file with the same name is already exists on the server
                  if (!file_exists($newname)) {
                      
                      //Attempt to move the uploaded file to it's new place
                      move_uploaded_file($file['tmp_name'],$newname);
                  } 
              }
          }
    }