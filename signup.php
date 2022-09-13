<?php
include 'includes/autoloader.inc.php';
include 'includes/readTablesMethods.inc.php';
include 'includes/functions.inc.php';
include 'includes/formErrorHandlers.inc.php';

//create array for variables 
//create array for errors 
session_start();


$signUpErrors = array('fname' => null, 'lname' => null, 'email' => null, 'password' => null, 'birthday' => null, 'city' => null, 'state' => null, 'ph number' => null, 'signUpAttempt' => null);
$signUpSuccess = array('fname' => null, 'lname' => null, 'email' => null, 'password' => null, 'birthday' => null, 'city' => null, 'state' => null, 'ph number' => null, 'signUpAttempt' => null);
$firstName = $lastName =  $email = $password =  $birthday = $city = $state = $phNumber = $hashedPassword = "";

if (isset($_POST['signup'])) {
    $firstName = trim($_POST['fname']);
    $lastName = trim($_POST['lname']);
    $birthday = $_POST['userbirthdate'];
    $email = $_POST['useremail'];
    $password = $_POST["userpassword"];
    // $password = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    $phNumber = trim($_POST['userphnumber']);
    $city = trim($_POST['usercity']);
    $state = trim($_POST['userstate']);
    $hashedPassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    // $verifyPassword = password_verify($password, $hashedpassword);

    echo "First Name:" . $firstName;
    echo "<br>";
    echo "Last Name:" . $lastName;
    echo "<br>";
    echo "Birthday:" . $birthday;
    echo "<br>";
    echo "Email:" . $email;
    echo "<br>";
    echo "Password:" . $password;
    echo "<br>";
    echo "Hashed Password:". $hashedPassword;
    echo "<br>";
    echo "Phone Number:" . $phNumber;
    echo "<br>";
    echo "City:" . $city;
    echo "<br>";
    echo "State:" . $state;

    // $signUpContr = new SignUpContr($firstName, $lastName,  $birthday, $email, $password,  $phNumber, $city, $state);

    //Error Handlers here
    //Check Empty first and valid first name
    if (checkEmpty($firstName) == false) {
        echo checkEmpty($firstName);
        $signUpErrors['fname'] = 'First Name should not be blank';
        echo $signUpErrors['fname'];
    } else {
        // echo $signUpContr->checkvalidFname();
        if (checkEmpty($firstName) == false) {
            $signUpErrors['fname'] = 'First Name should contain only letters';
        } else if (checkvalidString($firstName) == true) {
            $signUpSuccess['fname'] = 'Valid First Name';
        }
    }

    //Check Empty and valid last name
    if (checkEmpty($lastName) == false) {
        $signUpErrors['lname'] = 'Last Name should not be blank';
        echo $signUpErrors['lname'];
    } else {
        if (checkvalidString($lastName) == false) {
            $signUpErrors['lname'] = 'Last Name should contain only letters';
            echo $signUpErrors['lname'];
        } else if (checkvalidString($lastName) == true) {
            $signUpSuccess['lname'] = 'Valid Last Name';
        }
    }

    //Check Empty and valid email
    if (checkEmpty($email) == false) {
        $signUpErrors['email'] = 'Email should not be blank';
        echo $signUpErrors['email'];
    } else {
        if (checkEmail($email) == false) {
            $signUpErrors['email'] = 'Invalid Email';
            echo $signUpErrors['email'];
        } else if (checkEmail($email) == true) {
            $signUpSuccess['email'] = 'Valid Email';
            echo $signUpSuccess['email'];
        }
    }

    //Check Empty and valid Password
    echo checkEmpty($password);
    echo "password strength" . checkPwdstrength($password);
    if (checkEmpty($password) == false) {
        $signUpErrors['password'] = 'Password should not be blank';
        echo $signUpErrors['password'];
    } else {
        if (checkEmpty($password) == false) {
            $signUpErrors['password'] = 'Password should be at least 12 characters, contain at least 1 uppercase, 1 lowercase, 1 special character, and 1 number';
            echo $signUpErrors['password'];
        } else if (checkPwdstrength($password) == true) {
            $signUpSuccess['password'] = 'Valid Password';
            //hash the password
            echo $signUpSuccess['password'];
        }
    }

    if (isset($_POST['userbirthdate'])) {
        $signUpSuccess['birthday'] = 'Valid Birthday';
        echo $signUpSuccess['birthday'];
    }

    //Check Valid Phone number
    if (checkPhone($phNumber) == false) {
        $signUpErrors['ph number'] = 'Phone Number is invalid';
        echo $signUpErrors['ph number'];
    } else if (checkPhone($phNumber) == true) {
        $signUpSuccess['ph number'] = 'Valid Phone Number';
        echo $signUpSuccess['ph number'];
    }

    //Check Valid City
    if (checkvalidString($city) == false) {
        $signUpErrors['city'] = 'City name is invalid';
        echo $signUpErrors['city'];
    } else if (checkvalidString($city) == true) {
        $signUpSuccess['city'] = 'Valid City';
        echo $signUpSuccess['city'];
    }


    //Check Valid State - Kind of unnecessary
    if (checkvalidString($state) == false) {
        $signUpErrors['state'] = 'State name is invalid';
        echo $signUpErrors['state'];
    } else if (checkvalidString($state) == true) {
        $signUpSuccess['state'] = 'Valid State';
        echo $signUpSuccess['state'];
    }

    //Check All errors to show final success message

    echo "<br>";
    $noErrors = true;
    foreach ($signUpErrors as $error) {
        // echo $error;
        if ($error != null) {
            $noErrors = false;
            echo $error . $noErrors;
            echo "<br>";
        }
    }
    echo "<br>";
    echo 'Is there any errors' . $noErrors;

    if ($noErrors == true) {
        $signUpSuccess['signUpAttempt'] = 'Registration successful';
        echo $signUpSuccess['signUpAttempt'];
    } else {
        $signUpErrors['signUpAttempt'] = 'Registration failed';
        echo $signUpErrors['signUpAttempt'];
    }

    echo "<br>";
    echo "Errors";
    print_r($signUpErrors);
    echo "<br>";
    echo "Success";
    print_r($signUpSuccess);


    if ($signUpSuccess['signUpAttempt'] != null && $signUpErrors['signUpAttempt'] == null) {
        //check if the user is already signed up
        //if yes
        $sql = "SELECT * FROM `members` WHERE `email` = ?";
        $result = executeSql($sql, array($email));
        echo $hashedPassword;
        // echo $memberName;
        //if the member is signed up - yes
        if (count($result) == 0) {
            //if no
            $sql = "INSERT INTO `members`(`first name`, `last name`, `email`, `password`,`birthday`, `city`, `state`, `phone number`  )  values (?,?,?,?,?,?,?,?)";
            //insert into table
            insertSql($sql, array($firstName, $lastName, $email, $hashedPassword, $birthday, $city, $state, $phNumber));
            $sql = "SELECT * FROM `members` ORDER BY `id` DESC LIMIT 1";
            $lastInsertedMember = getRows($sql, null)[0];
            echo "<br>";
            echo "last inserted member";
            var_dump($lastInsertedMember);
            $memberId = $lastInsertedMember['id'];
            //insert into individual visit
            $sql = "INSERT INTO `individual visits`(`member id`, `name`, `logged in`) VALUES (?,?,?)";
            insertSql($sql, array($memberId, $firstName, true));
            $sql = "SELECT * FROM `individual visits` ORDER BY `individual visit id` DESC LIMIT 1;
            // ";
            $lastInsertedVisit = getRows($sql, null)[0];
            echo "<br>";
            echo "last inserted visit";
            var_dump($lastInsertedVisit);

            //set individual id as cookie
            setcookie("individualVisitId", $lastInsertedVisit["individual visit id"]);

            // store in session variables
            $_SESSION['customer type'] = $lastInsertedVisit['customer type'];
            $_SESSION['userName'] = $lastInsertedVisit['name'];
            $_SESSION['member id'] = $lastInsertedVisit['member id'];
            $_SESSION['individual visit id'] = $lastInsertedVisit['individual visit id'];
            $_SESSION['logged in'] = $lastInsertedVisit['logged in'];
            $_SESSION['order status'] = $lastInsertedVisit['order status'];
            $_SESSION['checked in at'] = $lastInsertedVisit['checked in at'];

            echo $_SESSION['userName'];
            echo $_SESSION['customer type'];
            echo $_SESSION['member id'];
            echo $_SESSION['individual visit id'];
            echo $_SESSION['logged in'];
            echo $_SESSION['order status'];
            echo $_SESSION['checked in at'];


            //redirect to enterTable.php
            $signUpSuccess['signUpAttempt'] = "Sign Up Success. Signing you in...";
            // header("refresh:1;url=enterTable.php");
        } else {

            $signUpErrors['signUpAttempt'] = 'Username already exists. Please sign in.';
            header("refresh:3;url=index.php");
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
    <link rel="stylesheet" href="css/testStyle.css">
    <script src="index.js"></script>
    <style>
        <?php

        //To show fname Error Message
        if ($signUpErrors['fname'] != null) {
        ?>.userfname-error {
            display: block;
        }


        <?php
        } else if (($signUpSuccess['fname'] != null)) {
        ?>.userfname-success {
            display: block;
            border-color: green;
        }

        <?php
        }

        //To show lname Error Message
        if ($signUpErrors['lname'] != null) {
        ?>.userlname-error {
            display: block;
        }

        <?php
        } else if (($signUpSuccess['lname'] != null)) {
        ?>.userlname-success {
            display: block;
            border-color: green;
        }

        <?php
        }

        //To show email Error Message
        if ($signUpErrors['email'] != null) {
        ?>.useremail-error {
            display: block;
        }

        <?php
        } else if (($signUpSuccess['email'] != null)) {
        ?>.useremail-success {
            display: block;
            border-color: green;
        }

        <?php
        }

        //To show password error message
        if ($signUpErrors['password'] != null) {
        ?>.userpassword-error {
            display: block;
        }

        <?php
        } else if (($signUpSuccess['password'] != null)) {
        ?>.userpassword-success {
            display: block;
            border-color: green;
        }

        <?php
        }

        //To show birthday error message
        if ($signUpSuccess['birthday'] != null) {
        ?>.userbirthday-success {
            display: block;
        }

        <?php
        }

        //To show ph number error message
        if ($signUpErrors['ph number'] != null) {
        ?>.userphNumber-error {
            display: block;
        }

        <?php
        } else if (($signUpSuccess['password'] != null)) {
        ?>.userpassword-success {
            display: block;
            border-color: green;
        }

        <?php
        }

        //To show city error message
        if ($signUpErrors['city'] != null) {
        ?>.usercity-error {
            display: block;
        }

        <?php
        } else if (($signUpSuccess['city'] != null)) {
        ?>.usercity-success {
            display: block;
            border-color: green;
        }

        <?php
        }

        //To show state error message
        if ($signUpErrors['state'] != null) {
        ?>.userstate-error {
            display: block;
        }

        <?php
        } else if (($signUpSuccess['state'] != null)) {
        ?>.userstate-success {
            display: block;
            border-color: green;
        }

        <?php
        }

        if ($signUpErrors['signUpAttempt'] != null) {
        ?>.memberSignUp-error {
            display: block;
        }

        <?php
        } else if (($signUpSuccess['signUpAttempt'] != null)) {
        ?>.memberSignUp-success {
            display: block;
            border-color: green;
        }

        /* .userstate-success {
                    display: block;
                    border-color: green;
                } */

        <?php
        }


        ?>
    </style>
    <script>
        //call ajax from signup.inc.php

        //return the value from 
    </script>

</head>

<body>
    <div class="mainstyle">
        <div class="image">
            <img src="Images/Logo.jpg" alt="Logo" class="logo1">
        </div>
        <!--Manual Sign up form-->
        <div class="ManualSignUp">
            <!--Sign up form-->
            <div class="msu-text1">
                <h2 class="heading1">MIYA MEMBER INFO</h2>
            </div>

            <div class="manual-signupform">
                <form method="post" action="" id="signup_form">
                    <input type="text" name="fname" placeholder="First Name" value=<?php echo $firstName ?>>
                    <p class="error userfname-error"><?php echo $signUpErrors['fname'] ?></p>
                    <p class="success userfname-success"><?php echo $signUpSuccess['fname'] ?></p>
                    <br>
                    <input type="text" name="lname" placeholder="Last Name" value=<?php echo $lastName ?>>
                    <p class="error userlname-error"><?php echo $signUpErrors['lname'] ?></p>
                    <p class="success userlname-success"><?php echo $signUpSuccess['lname'] ?></p>
                    <br>
                    <input type="date" name="userbirthdate" placeholder="Birth Date" value=<?php echo $birthday ?>>
                    <p class="error userbirthday-error"><?php echo $signUpErrors['birthday'] ?></p>
                    <p class="success userbirthday-success"><?php echo $signUpSuccess['birthday'] ?></p>
                    <br>
                    <input type="email" name="useremail" placeholder="Email" value=<?php echo $email ?>>
                    <p class="error useremail-error"><?php echo $signUpErrors['email'] ?></p>
                    <p class="success useremail-success"><?php echo $signUpSuccess['email'] ?></p>
                    <br>
                    <input type="password" name="userpassword" placeholder="Password">
                    <p class="error userpassword-error"><?php echo $signUpErrors['password'] ?></p>
                    <p class="success userpassword-success"><?php echo $signUpSuccess['password'] ?></p>
                    <br>
                    <input type="text" name="userphnumber" placeholder="Phone Number (Optional)" value=<?php echo $phNumber ?>>
                    <p class="error userphNumber-error"><?php echo $signUpErrors['ph number'] ?></p>
                    <p class="success userphNumber-success"><?php echo $signUpSuccess['ph number'] ?></p>
                    <br>
                    <input type="text" name="usercity" placeholder="City (Optional)" value=<?php echo $city ?>>
                    <p class="error usercity-error"><?php echo $signUpErrors['city'] ?></p>
                    <p class="success userphNumber-success"><?php echo $signUpSuccess['ph number'] ?></p>
                    <!--dynamic dropdown from important qualitiess table-->
                    <br>
                    <select type="text" name="userstate" placeholder="State(Optional)" value=<?php echo $state ?>>
                        <option value="">--- Select State Optional ---</option>
                        <?php
                        $fieldType = 'option';
                        $tableName = 'states';
                        $column = 'code';
                        $name = 'states';
                        readRefTable($fieldType, $tableName, $column, $name);
                        ?>
                    </select>
                    <p class="error userstate-error"><?php echo $signUpErrors['state'] ?></p>
                    <p class="success userstate-success"><?php echo $signUpErrors['state'] ?></p>
                    <br>
                    <button type="submit" class="check-inbtn" name="signup">Create Account</button>
                    <p class="success memberSignUp-success"><?php echo $signUpSuccess['signUpAttempt'] ?></p>
                    <p class="error memberSignUp-error"><?php echo $signUpErrors['signUpAttempt'] ?></p>
                </form>

            </div>

        </div>

    </div>

</body>
</head>