<?php
    class API_Default extends Controller {
        public function index(){
            send_error_message('An error occured. There is no API endpoint in the URL you provided.');
        }
    }