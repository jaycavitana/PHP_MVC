<?php
    class User {
        private $db;

        public $response = 0;

        public function __construct(){
            $this->db = new Database;
        }

        //create users
        public function create($data){
            if($this->valid($data['email'], $data['username'])){
                $this->db->query('INSERT INTO `tbl_users`(`Username`, `EmailAddress`, `FirstName`, `LastName`, `ContactNumber`, `Password`, `Company`, isSubscribed) VALUES (:username, :email, :first_name, :last_name, :contact, :password, :company, :isSubscribed)');
                $this->db->bind(':username', $data['username']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':last_name', $data['last_name']);
                $this->db->bind(':contact', $data['contact']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':company', $data['company']);
                $this->db->bind(':first_name', $data['first_name']);
                $this->db->bind(':isSubscribed', $data['isSubscribed']);
                
                if($this->db->execute()){
                    $this->response = 1;
                }
            }
        }

        //check user details
        public function valid($email, $username){
            
            //check username if it has duplicate
            $this->db->query('SELECT `Username` FROM `tbl_users` WHERE Username=:username');
            $this->db->bind(':username', $username);
            $this->db->execute();
            if($this->db->rowCount() == 1){
                $this->response = 2; //username already exists
                return false;
            }
            
            //check email if it has duplicate
            $this->db->query('SELECT `Username` FROM `tbl_users` WHERE EmailAddress=:email');
            $this->db->bind(':email', $email);
            $this->db->execute();
            if($this->db->rowCount() == 1){
                $this->response = 3; //Email already exists
                return false;
            }
            
            return true;
        }

        //check if username exists
        public function userExists($username, $email){
            $this->db->query('SELECT `Username` FROM `tbl_users` WHERE Username=:username AND EmailAddress=:email');
            $this->db->bind(':username', $username);
            $this->db->bind(':email', $email);
            $this->db->execute();
            if($this->db->rowCount() == 1){
                return true;
            }
        }   

        //get basic user details
        public function getUserForNotif($company){
            $this->db->query('SELECT CONCAT(`FirstName`," ",`LastName`) as FullName, `ProfilePicture`, UserID FROM `tbl_users` WHERE Company=:company AND isApproved=0');
            $this->db->bind(':company', $company);
            $stmt = $this->db->resultSet();
            
            return $stmt;
        }

        //get all users in db
        public function getAllUsers(){
            $this->db->query('SELECT `UserID`, `Username`, `EmailAddress`, `FirstName`, `LastName`, `ContactNumber`, `Password`, `Company` FROM `tbl_users`');
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //get one user in db
        public function getUser($user_id){
            $this->db->query('SELECT `Username`, `EmailAddress`, `FirstName`, `LastName`, `ContactNumber`, `Password`, `Company`, `Quotation`, `ProfilePicture`, `CoverPicture`, Gender, Birthday, Designation FROM `tbl_users` WHERE UserID=:userid');
            $this->db->bind(':userid', $user_id);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //get one user in db
        public function getUserFullName($username){
            $this->db->query('SELECT CONCAT(`FirstName`," ", `LastName`) as FullName FROM `tbl_users` WHERE Username=:userid');
            $this->db->bind(':userid', $username);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //get token of author
        public function getAuthorToken($postID){
            $this->db->query('SELECT u.DeviceToken FROM tbl_posts p JOIN tbl_users u ON p.PostedBy=u.Username WHERE p.PostID=:postID');
            $this->db->bind(':postID', $postID);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //get token of company admin
        public function getAdminTokens($company){
            $this->db->query('SELECT `DeviceToken` FROM `tbl_users` WHERE `IsAdmin`=1 AND Company=:company');
            $this->db->bind(':company', $company);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //get token of receiver
        public function getReceiverToken($username){
            $this->db->query('SELECT DeviceToken FROM tbl_users WHERE Username=:username');
            $this->db->bind(':username', $username);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //get user details for JWT
        public function getUserJWT($username){
            $this->db->query('SELECT `UserID`, `EmailAddress`, `FirstName`, `LastName`, `ContactNumber`, `Password`, `Company`, IsAdmin, Username FROM `tbl_users` WHERE Username=:username AND isApproved=1');
            $this->db->bind(':username', $username);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //get all users per company exc logged in user
        public function getAllEmployees($company, $username){
            $this->db->query('SELECT `Username`, `EmailAddress`, `FirstName`, `LastName`, `ContactNumber`, `Password`, `Company`, `Quotation`, `ProfilePicture`, `CoverPicture` FROM `tbl_users` WHERE Company=:comp AND Username!=:username ORDER BY FirstName ASC');
            $this->db->bind(':comp', $company);
            $this->db->bind(':username', $username);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //search
        public function search($company, $username, $search){
            $this->db->query('SELECT `Username`, `EmailAddress`, `FirstName`, `LastName`, `ContactNumber`, `Password`, `Company`, `Quotation`, `ProfilePicture`, `CoverPicture` FROM `tbl_users` WHERE Company=:comp AND Username!=:username AND CONCAT(FirstName," ",LastName) LIKE :search ORDER BY FirstName ASC');
            $search = '%'.$search.'%';
            $this->db->bind(':search', $search);
            $this->db->bind(':comp', $company);
            $this->db->bind(':username', $username);
            $stmt = $this->db->resultSet();

            return $stmt;
        }

        //check if email exists
        public function emailExists($email){
            $this->db->query('SELECT `Username` FROM `tbl_users` WHERE EmailAddress=:email');
            $this->db->bind(':email', $email);
            $this->db->execute();

            return $this->db->rowCount() == 1; 
        }

        //check verification code
        public function checkCode($email, $code){
            $this->db->query('SELECT `Username` FROM `tbl_users` WHERE EmailAddress=:email AND VerifyCode=:code');
            $code = sha1(md5($code));
            $this->db->bind(':email', $email);
            $this->db->bind(':code', $code);
            $this->db->execute();

            return $this->db->rowCount() == 1;
        }

        //update user details
        public function update($data){
            $this->db->query('UPDATE `tbl_users` SET `FirstName`=:firstname, `LastName`=:lastname, `ContactNumber`=:contact, Birthday=:birthday, Designation=:designation, Gender=:gender WHERE `Username`=:username');
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':lastname', $data['last_name']);
            $this->db->bind(':firstname', $data['first_name']);
            $this->db->bind(':birthday', $data['birthday']);
            $this->db->bind(':designation', $data['designation']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->execute();

            return $this->db->rowCount() == 1;
        }

        //decline user registration
        public function decline($userID){
            $this->db->query('UPDATE `tbl_users` SET `isApproved`=2 WHERE `UserID`=:user_id');
            $this->db->bind(':user_id', $userID);
            $this->db->execute();

            return $this->db->rowCount() == 1;
        }

        //approve user registration
        public function approve($userID){
            $this->db->query('UPDATE `tbl_users` SET `isApproved`=1 WHERE `UserID`=:user_id');
            $this->db->bind(':user_id', $userID);
            $this->db->execute();

            return $this->db->rowCount() == 1;
        }

        //update cover photo
        public function updateCoverPhoto($cover_picture, $username){
            $this->db->query('UPDATE `tbl_users` SET `CoverPicture`=:cover_picture WHERE `Username`=:username');
            $this->db->bind(':cover_picture', $cover_picture);
            $this->db->bind(':username', $username);
            $this->db->execute();    
            
            return $this->db->rowCount() == 1;
        }

        //update profile photo
        public function updateProfilePhoto($profile_picture, $username){
            $this->db->query('UPDATE `tbl_users` SET `ProfilePicture`=:profile_picture WHERE `Username`=:username');
            $this->db->bind(':profile_picture', $profile_picture);
            $this->db->bind(':username', $username);
            $this->db->execute();

            return $this->db->rowCount() == 1;
        }

        //save verification code
        public function saveCode($random_code, $email){
            $this->db->query('UPDATE `tbl_users` SET `VerifyCode`=:code WHERE `EmailAddress`=:email');
            $random_code = sha1(md5($random_code));
            $this->db->bind(':code', $random_code);
            $this->db->bind(':email', $email);

            $this->db->execute();            
        }

        //save firebase token
        public function saveFirebaseToken($username, $token){
            $this->db->query('UPDATE `tbl_users` SET `DeviceToken`=:devtoken WHERE `Username`=:username');
            $this->db->bind(':username', $username);
            $this->db->bind(':devtoken', $token);
            $this->db->execute();            
        }

        //forget password
        public function changePassword($password, $email){
            $this->db->query('UPDATE `tbl_users` SET `Password`=:pass WHERE `EmailAddress`=:email');
            $password = sha1(md5($password));
            $this->db->bind(':pass', $password);
            $this->db->bind(':email', $email);
            $this->db->execute();

            return $this->db->rowCount() == 1;
        }

        //update password
        public function updatePassword($new_password, $current_password, $username){
            $this->db->query('UPDATE `tbl_users` SET `Password`=:new_password WHERE `Username`=:username AND Password=:current_password');
            $new_password = sha1(md5($new_password));
            $current_password = sha1(md5($current_password));
            $this->db->bind(':new_password', $new_password);
            $this->db->bind(':current_password', $current_password);
            $this->db->bind(':username', $username);
            $this->db->execute();

            return $this->db->rowCount() == 1;
        }
    }