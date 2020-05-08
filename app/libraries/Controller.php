<?php
    /*
     *  Base controller
     *  Loads the models and views
     */

    class Controller {
        //Load model
        public function model($model){
            //Require model file
            require '../app/models/' . $model . '.php';

            //Instantiate the model
            return new $model();
        }

        //Load view
        public function view($view, $data = []){
            //Check for the view file
            if(file_exists('../app/views/' . $view . '.php')){
                require '../app/views/' . $view . '.php';
            }   
            else {
                die('View does not exist');
            }
        }
    }