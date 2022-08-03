<?php
// declare(strict_types = 1);
include 'includes/autoloader.inc.php';



//create array for variables 
//create array for errors 

$mSignInErrors = array('email' => '', 'password' => '', 'signInAttempt' => '');
$gSignInErrors = array('name' => '', 'signInAttempt' => '');

//Member Sign in Controller
//Form Validation
if (isset($_POST["memberSignin"])) {
    //get the posted form values and store them in variables
    $useremail = trim($_POST['useremail']);
    $userpassword = trim($_POST['userpassword']);

    // $userpassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    //Create a Member Login Controller
    $loginContr = new LoginContr($useremail, $userpassword);

    //if all errorhandlers are validated
    if ($loginContr->checkemptyEmail() == false) {
        $mSignInErrors['email'] = 'Email should not be blank';
    } else {
        if ($loginContr->checkvalidEmail() == false) {
            $mSignInErrors['email'] = 'Email should not be blank';
        } else {
        }
    }

    //check pwd empty and valid password
    if ($loginContr->checkemptyPwd() == false) {
        $mSignInErrors['password'] = 'Password should not be blank';
    } else {
        $mSignInErrors['password'] = 'correct';
    }


    //check if user already exists in the database
    // if($loginContr->checkUserMember())
    // {
    //     $mSignInErrors['signInAttempt'] = 'Email should not be blank';

    // }

    // else
    // {

    // }


    //Yes
    //Create a DOM element saying you are successfully signed in



    //No
    //Create a DOM element for each error handler fail

};

//
if (isset($_POST["guestSignin"])) {
    //get the posted form values
    $name = trim($_POST['guestname']);
    //Create a  Guest Login Controller


    //if all errorhandlers are validated


    //Yes
    //Create a DOM element saying you are successfully signed in



    //No
    //Create a DOM element for each error handler fail

};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>MIYA Food Ordering App</title>
    <meta charset="UTF-8">
    <meta name="author" content="Ei Myatnoe Aung">
    <meta name="keywords" content="Japanese food, MIYA, food order">
    <meta name="description" content="MIYA In hourse food ordering website">
    <!-- <meta http-equiv="refresh" content="30"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
    <?php
    if ($mSignInErrors['email'] == '') {
    ?>
        <style>
            .useremail-error {
                display: block;
            }
        </style>
    <?php
    }

    if ($mSignInErrors['password'] == '') {
    ?>
        <style>
            .userpassword-error {
                display: block;
            }
        </style>
    <?php
    }
    ?>

</head>

<body>


    <!--Guest Check in View Template-->
    <!--member check in form-->
    <div class="member-checkin">
        <div class="mci-text1">
            <h2 class="heading1">MEMBER LOG IN</h2>
            <h2 class="heading2">MIYA CUSTOMER WITH REWARD POINTS</h2>
        </div>
        <div class="mci-form">
            <!-- <form method="post" action= "includes/signup.inc.php" id = "mciform"> -->
            <form method="post" action="" id="mciform">
                <input type="text" name="useremail" placeholder="Email" value=<?php echo $useremail ?>>
                <p class="error useremail-error"><?php echo $mSignInErrors['email'] ?></p>
                <br>
                <!--<label for = "inpassword">Enter Password:</label><br>-->
                <input type="password" name="userpassword" placeholder="Password"><br>
                <p class="error userpassword-error"><?php echo $mSignInErrors['password'] ?></p>

                <div class="mci-text2">
                    <div class="mci-text3" style="text-align: right; display: inline-block;">

                        <a href="forgotpw.php" class="heading3">Forgot Password?</a>
                    </div>
                    <!-- <span class = "heading3" style="text-align: right; display: inline-block;">Forgot Password?</span> -->
                    <span class="heading3" style="text-align: left; display: inline-block;">
                        <input type="radio" id="rememberid" name="remember-userid" value="Remember User ID">
                        Remember user ID
                    </span>
                </div>
                <!--<input type="submit" value="Login">-->
                <button type="submit" name="memberSignin" value="Log In" class="check-inbtn">Log In</button>
                <!-- <p class = "error memberCheckin-error"><?php echo $userpasswordError ?></p> -->
                <div class="mci-text3">

                    <a href="signup.html" class="heading3">Join MIYA Member Program</a>
                </div>
            </form>
        </div>
    </div>
    </div>

    </div>


</body>

</html>