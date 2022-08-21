<?php

//this is where the data from client will be sent to

include 'includes/autoloader.inc.php';



//this is where the data from client or html form will be sent to
if(isset($_POST["submit"]))
{
    //Grabbing data from user
    $fname = $_POST['fname'];
    $lname = trim($_POST['lname']);
    $userbd= $_POST['userbirthdate'];
    $useremail= $_POST['useremail'];
    $userpassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    $userphno = trim($_POST['userphnumber']);
    $usercity = trim($_POST['usercity']);
    $userstate = trim($_POST['userstate']);


    //Instantiate SignUpController Class
    //Or
    //Use the functions for form validation
    $signup = new SignUpContr($fname, $lname, $userbd, $useremail, $userpassword, $userphno, $usercity, $userstate);

    //Running error handlers and user login
    
    //if there is error show here

    //Going back to front page
    
}

?>