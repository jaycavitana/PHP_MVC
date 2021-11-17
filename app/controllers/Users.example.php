<?php
    class Users extends Controller {
        public $username;
        public $email;
        public $jwt;
        
        /*
            Initialization of user model
            Implementation of token checks

            Status: Done
        */
        public function __construct(){
            $this->userModel = $this->model('User');

            //implement token checks
            $this->jwt = getToken();
            
            try{
                $this->username = getUsernameFromToken($this->jwt, SECRET_KEY);
                $this->email = getEmailFromToken($this->jwt, SECRET_KEY);
            }
            catch(Exception $e){
                send_response_msg($e->getMessage().'. Unauthorized access.');
                die();
            }
        }

        /*
            Changing password from forgot password option
            No validation of token required

            Status: Done
        */
        public function change_password(){
            if(isset($_POST['Password']) && isset($_POST['Email'])){
                $password = $_POST['Password'];
                $email = $_POST['Email'];

                if($this->userModel->changePassword($password, $email)){
                    send_response_msg('Successfully changed password.');
                }
                else{
                    send_response_msg('An error occured. Please try again.');
                }
            }
            else{
                send_response_msg('No valid endpoint.');
            }           
        }

        /*
            Approving account registration
            Validation of token is required

            Status: Done
        */
        public function approve(){
            if(!isset($_GET['id'])){
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
                
                $id = $_GET['id'];
                
                if($this->userModel->approve($id)){
                    //get email using userid
                    $userdata = $this->userModel->getUser($id);
                    $email = $userdata[0]->EmailAddress;

                    $message = "Congratulations! You have been approved by your company's administrator. You may now access the portal using your registered username and password. Thank you!";

                    $subject = 'Registration';

                    if(send_email_notif($email, $message, $subject)){
                        send_response_msg('Successfully approved registration.');
                    }
                    else{
                        send_response_msg('Successfully approved registration but email was not sent.');
                    }
                }
                else{
                    send_response_msg('An error occured.');
                }  
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Checking email for forgot password
            No validation of token required

            Status: Done
        */
        public function check_email(){
            if(isset($_POST['Email'])){
                $email = $_POST['Email'];

                if($this->userModel->emailExists($email)){
                    $random_code = generateRandomString(6);
    
                    $this->userModel->saveCode($random_code, $email);
    
                    $subject = 'Verification Code';

                    $message = "Your password verification code is:
                        </p>
                        <h3 style='text-align:center;letter-spacing:1px;margin-top:-10px;'><u>$random_code</u></h3>
                        <p style='text-align:center'><i>
                            Please input the verification code above in the app to reset your password.
                        </i>";
                     
                    if(send_email_notif($email, $message, $subject)){
                        send_response_msg('Email exists.'); 
                    }   
                    else{
                        send_response_msg('Email exists but email can\'t be sent.');
                    }
                }
                else{
                    send_response_msg('Email does not exist'); 
                }
            
            }
        }
        
        /*
            Creating of users
            No validation of token required

            Status: Done
        */
        public function index(){
            if(
                isset($_POST['username']) &&
                isset($_POST['email']) &&
                isset($_POST['first_name']) &&
                isset($_POST['last_name']) &&
                isset($_POST['contact']) &&
                isset($_POST['password']) &&
                isset($_POST['company']) &&
                isset($_POST['isSubscribed'])
            ){
                $this->userModel->create($_POST);

                switch($this->userModel->response){
                    case 1: 
                        send_response_msg('Successfully created user.'); 
                        break;
                    case 2:
                        send_response_msg('Username already used.');
                        break;
                    case 3:
                        send_response_msg('Email address already used.');
                        break;
                    default:
                        send_response_msg('An error occured.');
                }
            }
            else{
                send_response_msg('An error occured.');
            }
        }

        /*
            Declining account registration
            Validation of token required

            Status: Done
        */
        public function decline(){
            if(!isset($_GET['id'])){
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
                
                $id = $_GET['id'];
                
                if($this->userModel->decline($id)){
                    //get email using userid
                    $userdata = $this->userModel->getUser($id);
                    $email = $userdata[0]->EmailAddress;

                    $message = "Sorry! Your registration have been declined by your company's administrator. You may contact your Human Resource Officer to clarify this matter. Thank you!";

                    $subject = 'Registration';

                    if(send_email_notif($email, $message, $subject)){
                        send_response_msg('Successfully declined registration.');
                    }
                    else{
                        send_response_msg('Successfully  registration but email was not sent.');
                    }
                }
                else{
                    send_response_msg('An error occured.');
                }  
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Fetch user details (current user)
            Validation of token required

            Status: Done
        */
        public function current_user(){
            if(!isset($_GET['id'])){
                send_response_msg('An error occured.');
                die();
            }   

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){

                $id = $_GET['id'];

                $data = $this->userModel->getUser($id);

                if(isset($data[0])){
                    $data[0]->ProfilePicture = 'https://ltgserves.com/api/entities/users/'.$data[0]->ProfilePicture;

                    $data[0]->CoverPicture = 'https://ltgserves.com/api/entities/users/'.$data[0]->CoverPicture;

                    $bday = $data[0]->Birthday;
                    $data[0]->Birthday = date_format(date_create($bday), 'd');
                    $data[0]->BirthMonth = date_format(date_create($bday), 'm');
                    $data[0]->BirthYear = date_format(date_create($bday), 'Y');

                    $users_array = array();
                    $users_array["body"] = $data;
                                    
                    send_response($users_array);
                }
                else{
                    send_response_msg('An error occured.');
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Fetch user details (all users)
            Validation of token required

            Status: Done
        */
        public function all_users(){
            if(!(isset($_GET['company']) && isset($_GET['username']))){
                send_response_msg('An error occured.');
                die();
            }   

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){

                $company = $_GET['company'];
                $username = $_GET['username'];

                $data = $this->userModel->getAllEmployees($company, $username);

                if(isset($data[0])){

                    foreach($data as $d){
                        $d->ProfilePicture = 'https://ltgserves.com/api/entities/users/'.$d->ProfilePicture;

                        $d->CoverPicture = 'https://ltgserves.com/api/entities/users/'.$d->CoverPicture;
                    }

                    $users_array = array();
                    $users_array["body"] = $data;
                                    
                    send_response($users_array);
                }
                else{
                    send_response_msg('An error occured.');
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }        
        }

        /*
            Login user
            Validation of token not required

            Status: Done
        */
        public function login(){
            if(!(isset($_POST['password']) && isset($_POST['username']))){
                send_response_msg('An error occured.');
                die();
            }
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            //for Firebase token
            if(isset($_POST['devToken'])){
                $devToken = $_POST['devToken'];

                //save token 
                $this->userModel->saveFirebaseToken($username, $devToken);
            }

            $data = $this->userModel->getUserJWT($username);   
            
            if(isset($data[0])){
                if(count(array($data[0])) > 0){
                    if(sha1(md5($password)) == $data[0]->Password){
                        
                        $jwt = generateJWT($data[0]);
                        $response = array(
                            'token' => $jwt
                        );
                        send_response($response);
                    }
                    else{
                        send_response_msg('Login failed.');
                    }
                }
                else{
                    send_response_msg('Login failed.');
                }
            }
            else{
                send_response_msg('Login failed.');
            }
        }

        /*
            Fetch notifications
            Validation of token required

            Status: Done
        */
        public function notifications(){
            if(!isset($_GET['company'])){
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
                
                $company = $_GET['company'];

                $data = $this->userModel->getUserForNotif($company);

                if(isset($data[0])){

                    foreach($data as $d){
                        $d->ProfilePicture = 'https://ltgserves.com/api/entities/users/'.$d->ProfilePicture;
                    }

                    $users_array = array();
                    $users_array["body"] = $data;
                                    
                    send_response($users_array);
                }
                else{
                    send_response(array("body" => array()));
                }

            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Get refresh token
            Validation of token required

            Status: Done
        */
        public function refresh_token(){
            if(!isset($_POST['username'])){
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
            
                $username = $_POST['username'];
                $data = $this->userModel->getUserJWT($username); 

                if(isset($data[0])){
                    if(count(array($data[0])) > 0){
                        $jwt = generateJWT($data[0]);
                        $response = array(
                            'token' => $jwt
                        );
                        send_response($response);
                    }
                    else{
                        send_response_msg('Generating refresh token failed.');
                    } 
                }
                else{
                    send_response_msg('Generating refresh token failed.');
                }               
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Search users
            Validation of token required

            Status: Done
        */
        public function search(){
            if(!
                (isset($_GET['company']) && 
                isset($_GET['username']) &&
                isset($_GET['search']))
                )
            {
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){

                $company = $_GET['company'];
                $username = $_GET['username'];
                $search = $_GET['search'];

                $data = $this->userModel->search($company, $username, $search);

                if(isset($data[0])){

                    foreach($data as $d){
                        $d->ProfilePicture = 'https://ltgserves.com/api/entities/users/'.$d->ProfilePicture;

                        $d->CoverPicture = 'https://ltgserves.com/api/entities/users/'.$d->CoverPicture;
                    }

                    $users_array = array();
                    $users_array["body"] = $data;
                                    
                    send_response($users_array);
                }
                else{
                    send_response(array("body" => array()));
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }              
        }

        /*
            Notify admin on registration
            Validation of token not required

            Status: Done
        */
        public function notif_registration(){
            if(!
                (isset($_POST['company']) && 
                isset($_POST['username']))
                )
            {
                send_response_msg('An error occured.');
                die();
            }

                $company = $_POST['company'];
                $username = $_POST['username'];

                $userdata = $this->userModel->getUserFullName($username);

                $fullname = ucwords($userdata[0]->FullName);
                
                $admindata = $this->userModel->getAdminTokens($company);

                if(isset($admindata[0])){
                    foreach($admindata[0] as $d){

                        $token = $d->DeviceToken;

                        if($token){
                            $notif_title = $fullname.' is waiting for confirmation.';
                    
                            date_default_timezone_set('Asia/Manila');
                            $today = date('F j, Y h:i a');

                            push_notif($notif_title, $today, $token);
                        }
                    }
                }
        }

        /*
            Notify on chat
            Validation of token required

            Status: Done
        */
        public function notif_chat(){
            if(!
                (isset($_POST['receiver']) && 
                isset($_POST['sender']) &&
                isset($_POST['chat']))
                )
            {
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){

                $receiver = $_POST['receiver'];
                $sender = $_POST['sender'];
                $chat = $_POST['chat'];

                //get name of sender
                $userdata = $this->userModel->getUserFullName($sender);

                $fullname = ucwords($userdata[0]->FullName);

                //get devToken of receiver
                $tokendata = $this->userModel->getReceiverToken($receiver);
                $token = $tokendata[0]->DeviceToken;

                //send notif
                if($token){
                    $notif_title = $fullname.' sent you a message.';
                    
                    push_notif($notif_title, $chat, $token);
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }              
        }

        /*
            Update account info
            Validation of token required

            Status: Done
        */
        public function update(){
            if(!(isset($_POST['username']) &&
                isset($_POST['contact']) &&
                isset($_POST['first_name']) &&
                isset($_POST['last_name']) &&
                isset($_POST['birthday']) &&
                isset($_POST['designation']) &&
                isset($_POST['gender'])))
            {
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
                
                if($this->userModel->update($_POST)){
                    send_response_msg('Successfully updated profile.');
                }
                else{
                    send_response_msg('Error updating profile. Please try again.');
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Update cover photo
            Validation of token required

            Status: Done
        */
        public function update_cover_photo(){
            if(!
                (isset($_POST['username']) && 
                isset($_POST['imageName']))
                )
            {
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
                $cover = $_POST['imageName'];
                $username = $_POST['username'];
                
                $upload_dir = 'cover_photo/';
                $upload_name = $upload_dir.strtolower($cover);
                $upload_name = preg_replace('/\s+/', '-', $upload_name);

                if($this->userModel->updateCoverPhoto($upload_name, $username)){
                    send_response_msg('Successfully updated cover photo.');
                }
                else{
                    send_response_msg('An error occured in updating cover photo.');
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Update password
            Validation of token required

            Status: Done
        */
        public function update_password(){
            if(!
                (isset($_POST['Username']) && 
                isset($_POST['NewPassword']) && 
                isset($_POST['CurrentPassword']))
                )
            {
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
                
                $new_password = $_POST['NewPassword'];
                $current_password = $_POST['CurrentPassword'];
                $username = $_POST['Username'];

                if($this->userModel->updatePassword($new_password, $current_password, $username)){
                    send_response_msg('Successfully changed password.');
                }
                else{
                    send_response_msg('An error occured. Your current password may be incorrect. Please check your input.');
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Update profile photo
            Validation of token required

            Status: Done
        */
        public function update_profile_photo(){
            if(!
                (isset($_POST['username']) && 
                isset($_POST['imageName']))
                )
            {
                send_response_msg('An error occured.');
                die();
            }

            if($this->userModel->userExists($this->username, $this->email) && isNotExpired($this->jwt, SECRET_KEY)){
                $cover = $_POST['imageName'];
                $username = $_POST['username'];
                
                $upload_dir = 'profile_photo/';
                $upload_name = $upload_dir.strtolower($cover);
                $upload_name = preg_replace('/\s+/', '-', $upload_name);

                if($this->userModel->updateProfilePhoto($upload_name, $username)){
                    send_response_msg('Successfully updated profile photo.');
                }
                else{
                    send_response_msg('An error occured in updating profile photo.');
                }
            }
            else{
                send_response_msg('Unauthorized access.');
            }
        }

        /*
            Verify code (forgot password)
            Validation of token not required

            Status: Done
        */
        public function verify_code(){
            if(!
                (isset($_POST['Code']) && 
                isset($_POST['Email']))
                )
            {
                send_response_msg('An error occured.');
                die();
            }

            $email = $_POST['Email'];
            $code = $_POST['Code'];
            
            if($this->userModel->checkCode($email, $code)){
                send_response_msg('Code validated.');
            }            
            else{
                send_response_msg('Code is invalid.');
            }
        }
    }