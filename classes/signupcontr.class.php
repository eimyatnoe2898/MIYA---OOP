<?php

include 'includes/formErrorHandlers.inc.php';
//Where we will manipulate data received from client

class SignUpContr extends SignUp
{   
    private $firstName;
    private $lastName;
    private $birthday;
    private $email;
    private $password;
    private $phoneNumber;
    private $city;
    private $state;

    public function __construct($firstName, $lastName, $birthday, $email, $password, $phoneNumber = '', $city = '', $state = '')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->city = $city;
        $this->state = $state;

    }

    //Add New Customer to Database
    public function addMember()
    {
        $this->insertToMembers($this->firstName, $this->lastName, $this->email, $this->password, $this->birthday, $this->city, $this->state, $this->phoneNumber);
    }

    //Error handlers

    public function checkEmptyFname()
    {
        return checkEmpty($this->firstName);
    }

    public function checkEmptyLname()
    {
        return checkEmpty($this->lastName);
    }

    public function checkEmptyEmail()
    {
        return checkEmpty($this->email);
    }

    public function checkEmptyPwd()
    {
        return checkEmpty($this->password);
    }

    //Check Valid Inputs
    public function checkvalidFname()
    {
        return checkvalidString($this->firstName);
    }

    public function checkValidLname()
    {
        return checkvalidString($this->lastName);

    }

    public function checkValidEmail()
    {
        return checkEmail($this->email);
    }
    public function checkValidCity()
    {
        return checkvalidString($this->city);
    }

    public function checkValidState()
    {
        return checkvalidString($this->state);
    }

    public function checkValidPhno()
    {
        return checkPhone($this->phoneNumber);
    }

    //Check Password Requirements
    public function checkPwdUpperCase()
    {
        $result = "";

        if(!preg_match('@[A-Z]@', $this->password))
        {
            $result = false;
        }
    
        else
        {
            $result = true;
        }
    
        return $result;
    }

    public function checkPwdLowerCase()
    {
        $result = "";
        if(!preg_match('@[a-z]@', $this->password))
        {

        }

        else
        {
            $result = true;
        }
    
        return $result;
    }

    public function checkPwdNumber()
    {
        $result = "";
        if(!preg_match('@[0-9]@', $this->password))
        {
            $result = false;
        }

        else
        {
            $result = true;
        }
    
        return $result;
    }

    public function checkPwdSpecialChars()
    {
        $result = "";
        if(!preg_match('@[^\w]@', $this->password))
        {
            $result = false;
        }

        else
        {
            $result = true;
        }
    
        return $result;
    }


    public function checkPwdstrength()
    {
        $uppercase = preg_match('@[A-Z]@', $this->password);
        $lowercase = preg_match('@[a-z]@', $this->password);
        $number    = preg_match('@[0-9]@', $this->password);
        $specialChars = preg_match('@[^\w]@', $this->password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->password) < 12) 
        {
            // header("location:/MIYA_NEW/signup.html?error=weakpassword");
            // exit("Passwords must have at least 12 characters");
            $result = false;
        }

        else
        {
            $result = true;
        }

        return $result;

    }

    // public function insertToMembers()
    // {
    //     $this->insertIndividualMember($this->firstName, $this->lastName, $this->email, $this->birthday, $this->password, $this->city, $this->state, $this->phoneNumber);
    // }

}