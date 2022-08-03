<?php

//Where we will manipulate data received from client
// include 'includes/functions.inc.php';
class LoginContr extends Login
{   
    private $username;
    private $useremail;
    private $userpassword;


    public function __construct($useremail, $userpassword)
    {

        $this->useremail = $useremail;
        $this->userpassword = $userpassword;

    }

    //Error handlers
    public function checkemptyEmail()
    {
        $result = "";
        if(empty($this->useremail))
        {
            // header("location:/MIYA-OOP/index.php?error=emptyform");
            // exit('Please complete the registration form!!!!!!!!!! They are empty');
                // $useremailError = 'Email cannot be blank';
                // return $useremailError;
            $result = false;
        }

        else
        {
            // $useremailSuccess = 'Valid Email';
            $result = true;
        }

        return $result;
    }

    public function checkemptyPwd()
    {
        $result = "";
        if(empty($this->userpassword))
        {
            // header("location:/MIYA-OOP/index.php?error=emptyform");
            // exit('Please complete the registration form!!!!!!!!!! They are empty');
            // $result = 'Password cannot be blank';
            $result = false;
        }

        else
        {
            $result = true;
        }

        return $result;
    }

    public function checkvalidEmail()
    {
        $result = "";
        if(!filter_var($this->useremail, FILTER_VALIDATE_EMAIL))
        {
            // $result = 'Invalid Email';
            $result = false;
        }

        else
        {
            // $result = 'Valid Email';
            $result = true;
        }
        
        return $result;
    }

    public function checkUserMember()
    {

        $result = $this->checkUser($this->useremail, $this->userpassword);
        return $result;
        //check User Input Empty
        //check valid user email
        //check valid user 
    }

    public function checkPassword($hashedpassword)
    {
        return verifyPassword($this->userpassword, $hashedpassword);
    }

    public function getName()
    {
        $result = $this->getCustomerName($this->useremail, $this->userpassword);
        return $result;
    }






}