<?php

/*
 *  App Core Class
 *  Creates URL & loads core controller
 *  URL Format - /controller/method/params
 */

class Core {
    protected $currentController = 'API_Default';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();

        //Look in controllers for first index
        if(isset($url[0])){
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                $this->currentController = ucwords($url[0]);

                //Unset 0 index
                unset($url[0]);
            }
        }

        //Require the controller
        require '../app/controllers/' . $this->currentController . '.php';

        //Instantiate controller
        $this->currentController = new $this->currentController;

        //Check for 2nd part of the URL
        if(isset($url[1])){
            //Check if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];

                //Unset index 1
                unset($url[1]);
            }
            else{
                $this->currentMethod = 'index_details'; 
            }
        }

        //Get params 
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return  $url;
        }
    }
}