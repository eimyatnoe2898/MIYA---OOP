<?php
include 'includes/autoloader.inc.php';
include 'includes/readTablesMethods.inc.php';
include 'includes/functions.inc.php';

//create array for variables 
//create array for errors 

$signUpErrors = array('fname' => null, 'lname' => null, 'email' => null, 'password' => null, 'birthday' => null, 'city' => null, 'state' => null, 'ph number' => null, 'signUpAttempt' => null);
$signUpSuccess = array('fname' => null, 'lname' => null, 'email' => null, 'password' => null, 'birthday' => null, 'city' => null, 'state' => null, 'ph number' => null, 'signUpAttempt' => null);
$firstName = $lastName =  $email = $password =  $birthday = $city = $state = $phNumber = "";
$success = '';

if (isset($_POST['signup'])) {
    session_start();
    $firstName = trim($_POST['fname']);
    $lastName = trim($_POST['lname']);
    $birthday = $_POST['userbirthdate'];
    $email = $_POST['useremail'];
    $password = $_POST["userpassword"];
    // $password = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    $phNumber = trim($_POST['userphnumber']);
    $city = trim($_POST['usercity']);
    $state = trim($_POST['userstate']);

    echo "First Name:". $firstName;
    echo "<br>";
    echo "Last Name:". $lastName;
    echo "<br>";
    echo "Birthday:". $birthday;
    echo "<br>";
    echo "Email:". $email;
    echo "<br>";
    echo "Password:". $password;
    echo "<br>";
    echo "Phone Number:". $phNumber;
    echo "<br>";
    echo "City:". $city;
    echo "<br>";
    echo "State:". $state;

    $signUpContr = new SignUpContr($firstName, $lastName,  $birthday, $email, $password,  $phNumber, $city, $state);

    //Error Handlers here
    //Check Empty first and valid first name
    if ($signUpContr->checkEmptyFname() == false) {
        echo $signUpContr->checkEmptyFname();
        $signUpErrors['fname'] = 'First Name should not be blank';
        echo $signUpErrors['fname'];
    } else {
        // echo $signUpContr->checkvalidFname();
        if ($signUpContr->checkvalidFname() == false) {
            $signUpErrors['fname'] = 'First Name should contain only letters';
        } else if ($signUpContr->checkvalidFname() == true) {
            $signUpSuccess['fname'] = 'Valid First Name';
        }
    }

    //Check Empty and valid last name
    if ($signUpContr->checkEmptyLname() == false) {
        $signUpErrors['lname'] = 'Last Name should not be blank';
        echo $signUpErrors['lname'];
    } else {
        if ($signUpContr->checkValidLname() == false) {
            $signUpErrors['lname'] = 'Last Name should contain only letters';
            echo $signUpErrors['lname'];
        } else if ($signUpContr->checkvalidLname() == true) {
            $signUpSuccess['lname'] = 'Valid Last Name';
        }
    }

    //Check Empty and valid email
    if ($signUpContr->checkEmptyEmail() == false) {
        $signUpErrors['email'] = 'Email should not be blank';
        echo $signUpErrors['email'];
    } else {
        if ($signUpContr->checkValidEmail() == false) {
            $signUpErrors['email'] = 'Invalid Email';
            echo $signUpErrors['email'];
        }
        else if ($signUpContr->checkValidEmail() == true) {
            $signUpSuccess['email'] = 'Valid Email';
            echo $signUpSuccess['email'];
        }

    }

    //Check Empty and valid Password
    echo $signUpContr->checkEmptyPwd();
    echo "password strength" . $signUpContr->checkPwdstrength();
    if ($signUpContr->checkEmptyPwd() == false) {
        $signUpErrors['password'] = 'Password should not be blank';
        echo $signUpErrors['password'];
    } else {
        if ($signUpContr->checkPwdstrength() == false) {
            $signUpErrors['password'] = 'Password should be at least 12 characters, contain at least 1 uppercase, 1 lowercase, 1 special character, and 1 number';
            echo $signUpErrors['password'];
        }

        else if ($signUpContr->checkPwdstrength() == true) {
            $signUpSuccess['password'] = 'Valid Password';
            echo $signUpSuccess['password'];
        }
    }

    if(isset($_POST['userbirthdate']))
    {
        $signUpSuccess['birthday'] = 'Valid Birthday';
        echo $signUpSuccess['birthday'];
    }

    //Check Valid Phone number
    if ($signUpContr->checkValidPhno() == false) {
        $signUpErrors['ph number'] = 'Phone Number is invalid';
        echo $signUpErrors['ph number'];
    }
    else if ($signUpContr->checkValidPhno() == true) {
        $signUpSuccess['ph number'] = 'Valid Phone Number';
        echo $signUpSuccess['ph number'];
    }

    //Check Valid City
    if ($signUpContr->checkValidCity() == false) {
        $signUpErrors['city'] = 'City name is invalid';
        echo $signUpErrors['city'];
    }
    else if ($signUpContr->checkValidCity() == true) {
        $signUpSuccess['city'] = 'Valid City';
        echo $signUpSuccess['city'];
    }


    //Check Valid State - Kind of unnecessary
    if ($signUpContr->checkValidState() == false) {
        $signUpErrors['state'] = 'State name is invalid';
        echo $signUpErrors['state'];
    }
    else if ($signUpContr->checkValidState() == true) {
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
            echo $error. $noErrors;
            echo "<br>";
        }
    }
    echo "<br>";
    echo 'Is there any errors'.$noErrors;

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

    if($signUpSuccess['signUpAttempt'] != null)

    {
        $signUpContr->addMember($firstName, $lastName, $birthday, $email, $password, $city, $state, $phNumber);
        setName($firstName);
        setLoggedIn(true);
        header( "refresh:1;url=enterTable.php");
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
                    <p class="success userstate-success"><?php echo $signUpErrors['state']?></p>
                    <br>
                    <button type="submit" class="check-inbtn" name="signup">Create Account</button>
                    <p class="success memberSignUp-success"><?php echo $signUpSuccess['signUpAttempt'] ?></p>
                    <p class="error memberSignUp-error"><?php echo $signUpErrors['signUpAttempt'] ?></p>
                </form>

            </div>

        </div>

    </div>

    <?php

    //Create a signupController object


    //Do form validation by calling error handling\

    //For each error handlers 
    //false or true
    //false
    //create DOM element saying this error handler is not validated


    //true - for the final all error handlers validated
    //create DOM 
    ?>
</body>
</head>