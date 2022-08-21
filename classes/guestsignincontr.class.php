<?php

class GuestSignInContr extends GuestSignIn

{
    private $guestName;

    public function __construct($guestName)
    {

        $this->guestName = $guestName;

    }

    public function checkEmptyName()
    {
        $result = '';
        if(empty($this->guestName))
        {
            $result = false;
        }

        else{
            $result = true;
        }
    }

    public function checkValidName()
    {
        $result = '';
        if(!preg_match('/^[a-zA-Z0-9_]*$/', $this->guestName))
        {
            $result = false;
        }

        else{
            $result = true;
        }
    }

    public function signIn()
    {
        //call insertToGUests from GuestSignIn class
        $this->insertToGuests($this->guestName);
    }
}