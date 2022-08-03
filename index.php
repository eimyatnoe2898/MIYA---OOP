<?php
// declare(strict_types = 1);
include 'includes/autoloader.inc.php';
include 'includes/formErrorHandlers.inc.php';
include 'includes/sessionMethods.inc.php';


session_start();

//initialize variables
$mSignInErrors = array('email' => null, 'password' => null, 'userNotFound' => null, 'signInAttempt' => null);
$mSignInSuccess = array('email' => null, 'password' => null, 'userNotFound' => null, 'signInAttempt' => null);
$gSignInErrors = array('name' => null, 'signInAttempt' => null);
$gSignInSuccess = array('name' => null, 'signInAttempt' => null);
$useremail = $userpassword = null;
$guestName = null;

//Guest Sign in Controller
//Form Validation
if (isset($_POST["guestSignin"])) {
    $guestName = trim($_POST['guestname']);
    //Make sure that guest name is not empty
    //if it is empty
    if (checkEmpty($guestName) == false) {
        //show error
        $gSignInErrors['name'] = 'Guest name should not be blank';
        $gSignInErrors['signInAttempt'] = 'Check in Failed';
    //if it is not empty
    } else {
        //check valid string
        if (checkvalidString($guestName) == false) {
            $gSignInErrors['name'] = 'Guest name should contain alphabets only';
            $gSignInErrors['signInAttempt'] = 'Check in Failed';
        } elseif (checkvalidString($guestName) == true) {
            $gSignInSuccess['name'] = 'Valid Guest Name';
            $gSignInSuccess['signInAttempt'] = 'Check in Success';
            // setName($guestName);
            //set session variable
            $_SESSION['userName'] = $guestName;
            echo $_SESSION['userName'];
            // setLoggedIn(true);
            //set login variable
            $_SESSION['loggedin?'] = true;
            header("refresh:1;url=enterTable.php");
        } else {
            $gSignInSuccess['signInAttempt'] = 'Check in Failed';
        }
    }
}


//Member Sign in Controller
//Form Validation
if (isset($_POST["memberSignin"])) {
    //get the posted form values and store them in variables
    $useremail = trim($_POST['useremail']);
    $userpassword = trim($_POST['userpassword']);
    echo $useremail;
    echo $userpassword;
    // $userpassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    //Create a Member Login Controller
    $loginContr = new LoginContr($useremail, $userpassword);

    //if all errorhandlers are validated
    if ($loginContr->checkemptyEmail() == false) {
        $mSignInErrors['email'] = 'Email should not be blank';
        $mSignInErrors['signInAttempt'] = 'Sign in failed';
    } else {
        if ($loginContr->checkvalidEmail() == false) {
            $mSignInErrors['email'] = 'Invalid Email';
            $mSignInErrors['signInAttempt'] = 'Sign in failed';
        } elseif ($loginContr->checkvalidEmail() == true) {
            $mSignInSuccess['email'] = 'Valid Email';
            // $mSignInSuccess['signInAttempt'] = 'Sign in Success';
        } else {
            $mSignInErrors['signInAttempt'] = 'Sign in failed';
        }
    }

    //check pwd empty and valid password
    if ($loginContr->checkemptyPwd() == false) {
        $mSignInErrors['password'] = 'Password should not be blank';
        $mSignInErrors['signInAttempt'] = 'Sign in failed';
    } else {
        //check the hashed password
        // if($loginContr->checkPassword())
        // {

        // }

        $mSignInSuccess['password'] = 'Valid password';
    }

    //check if user already exists in database

    if ($mSignInErrors['email'] == null && $mSignInErrors['password'] == null) {
        if ($loginContr->checkUserMember() == 1) {
            // $mSignInSuccess['userNotFound'] = 'User found';
            $mSignInSuccess['signInAttempt'] = 'Sign in success';
            setName($loginContr->getName());
            $_SESSION['userName']
            setLoggedIn(true);
            header("refresh:1;url=enterTable.php");
        } else if ($loginContr->checkUserMember() == 0) {
            $mSignInErrors['signInAttempt'] = 'User not found. Please sign up first!';
            // $mSignInErrors['signInAttempt'] = 'Sign in failed';

        } else {
            $mSignInErrors['signInAttempt'] = 'Sign in failed';
        }
    }
}
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
    <!-- <link rel="stylesheet" href="css/testStyle.css"> -->
    <link rel="stylesheet" href="css/indexStyle.css">

    <script src="index.js"></script>

    <style>
        /*For Member Sign in */
        /*Show the error and success messages*/
        <?php
        //for the guest name error handling
        if ($gSignInErrors['name'] != null) {
        ?>.guestName-error {
            display: block;
        }

        <?php
        } elseif ($gSignInSuccess['name'] != null) {
        ?>.guestName-success {
            display: block;
        }

        <?php
        }


        //for the form error handling
        if ($gSignInErrors['signInAttempt'] != null) {
        ?>.guestCheckin-error {
            display: block;
        }

        <?php
        } elseif ($gSignInSuccess['signInAttempt'] != null) {
        ?>.guestCheckin-success {
            display: block;
        }

        <?php
        }
        ?>

        /*For Member Sign in */
        /*Show the error and success messages*/
        <?php
        //for the email error handling
        if ($mSignInErrors['email'] != null) {
        ?>.useremail-error {
            display: block;
        }

        <?php
        } elseif ($mSignInSuccess['email'] != null) {
        ?>.useremail-success {
            display: block;
        }

        <?php
        }

        //for the password error handling
        if ($mSignInErrors['password'] != null) {
        ?>.userpassword-error {
            display: block;
        }

        <?php
        } elseif ($mSignInSuccess['password'] != null) {
        ?>.userpassword-success {
            display: block;
        }

        <?php
        }

        //for the userExists checking error handling
        if ($mSignInErrors['signInAttempt'] != null) {
        ?>.memberCheckin-error {
            display: block;
        }

        <?php
        }

        //for the member sign in attempt error handling
        if ($mSignInSuccess['signInAttempt'] != null) {
        ?>.memberCheckin-success {
            display: block;
        }

        <?php
        }


        ?>
    </style>
</head>

<body>

    <!--View Templates-->
    <!--Guest Check in View Template-->
    <!--Log in form-->
    <div class = "main">
        <div class="mainstyle">
            <div class="image" id = "logo1">
                <img src="Images/Logo.jpg" alt="Logo" class="logo1">
            </div>

            <!--guest check in form-->
            <div class="guest-checkin">
                <div class="gci-text">
                    <h2 class="heading1">CHECK IN</h2>
                    <h4 class="heading2">ONE TIME CUSTOMER LOG IN</h4>
                    <div class="guest-checkinform">
                        <!-- <form id = "gciform" method = "post" action="includes/login.inc.php"> -->
                        <form id="gciform" method="post" action="">

                            <input type="text" name="guestname" placeholder="Name">
                            <p class="error guestName-error"><?php echo $gSignInErrors['name'] ?></p>
                            <p class="success guestName-success">
                                <?php echo $gSignInSuccess['name'] ?>
                            </p>
                            <br>
                            <button type="submit" name="guestSignin" class="check-inbtn">Check In</button>
                            <p class="error guestCheckin-error"><?php echo $gSignInErrors['signInAttempt'] ?></p>
                            <p class="success guestCheckin-success">
                                <?php echo $gSignInSuccess['signInAttempt'] ?>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            <!--divider-->
            <div class="divider">
                <span><p class="first-half"></p><span>
                <p>OR</p>
                <p class="second-half"></p>

            </div>

            <!--Guest Check in View Template-->
            <!--member check in form-->
            <div class="member-checkin">
                <div class="mci-text1">
                    <h2 class="heading1">MEMBER LOG IN</h2>
                    <h4 class="heading2">MIYA CUSTOMER WITH REWARD POINTS</h2>
                </div>
                <div class="mci-form">
                    <!-- <form method="post" action= "includes/signup.inc.php" id = "mciform"> -->
                    <form method="post" action="" id="mciform">
                        <input type="text" name="useremail" placeholder="Email" value=<?php echo $useremail ?>>
                        <p class="error useremail-error"><?php echo $mSignInErrors['email'] ?></p>
                        <p class="success useremail-success"><?php echo $mSignInSuccess['email'] ?></p>
                        <br>
                        <!--<label for = "inpassword">Enter Password:</label><br>-->
                        <input type="password" name="userpassword" placeholder="Password"><br>
                        <p class="error userpassword-error"><?php echo $mSignInErrors['password'] ?></p>
                        <p class="success userpassword-success"><?php echo $mSignInSuccess['password'] ?></p>

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
                        <p class="success memberCheckin-success"><?php echo $mSignInSuccess['signInAttempt'] ?></p>
                        <p class="error memberCheckin-error"><?php echo $mSignInErrors['signInAttempt'] ?></p>
                        <div class="mci-text3">
                            <a href="signup.php" class="heading3">Join MIYA Member Program</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>

</body>

</html>