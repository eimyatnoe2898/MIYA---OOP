<?php
// declare(strict_types = 1);
include 'includes/autoloader.inc.php';
include 'includes/formErrorHandlers.inc.php';
include 'includes/readTablesMethods.inc.php';

session_start();

//initialize variables
$mSignInErrors = array('email' => null, 'password' => null, 'userNotFound' => null, 'signInAttempt' => null);
$mSignInSuccess = array('email' => null, 'password' => null, 'userNotFound' => null, 'signInAttempt' => null);
$gSignInErrors = array('name' => null, 'signInAttempt' => null);
$gSignInSuccess = array('name' => null, 'signInAttempt' => null);
$guestVariables = array('name' => null);
$memberVariables = array('email' => null, 'password' => null);
$individualVisitVariables = array('name' => null, 'individual visit id' => null, 'logged in' => null, 'customer type' => null, 'member id' => null, 'order status' => null, 'table occupancy id' => null, 'checked in at' => null, 'checked out at' => null);
$useremail = $userpassword = null;
$guestName = null;
$cartArr = $serviceRequests = $subCustomers = null;
$cartLength = $serviceRequestLength = $subCustomersLength = 0;

//what if I store the individual visit id as cookie and then it can identify everything -- APPROVED

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

            //is the customer recently signed in?
            //if it is yes
            if (isset($_COOKIE["individualVisitId"])) {
                //look up the customer information from db
                $sql = "SELECT * FROM `individual visits` WHERE `individual visit id` = ? LIMIT 1";
                $result1 = executeSql($sql, array($_COOKIE["individualVisitId"]));
                if (count($result1) == 1) {
                    //assign the basic retrieved values to session variables
                    $foundCustomer = $result1[0];
                    $_SESSION['customer type'] = $foundCustomer['customer type'];
                    $_SESSION['userName'] = $foundCustomer['name'];
                    $_SESSION['member id'] = $foundCustomer['member id'];
                    $_SESSION['individual visit id'] = $foundCustomer['individual visit id'];
                    $_SESSION['logged in'] = $foundCustomer['logged in'];
                    $_SESSION['order status'] = $foundCustomer['order status'];
                    $_SESSION['checked in at'] = $foundCustomer['checked in at'];
                    $_SESSION['table occupancy id'] = $foundCustomer['table occupancy id'];

                    echo $_SESSION['userName'];
                    echo $_SESSION['customer type'];
                    echo $_SESSION['member id'];
                    echo $_SESSION['individual visit id'];
                    echo $_SESSION['logged in'];
                    echo $_SESSION['order status'];
                    echo $_SESSION['checked in at'];
                    echo $_SESSION['table occupancy id'];


                    // //retrieve table number
                    if ($_SESSION['table occupancy id'] != null) {
                        $sql = "SELECT * FROM `table occupancy` WHERE `table number` = ?";
                        $result2 = executeSql($sql, array($_SESSION['table occupancy id']));
                        $tableOccupancyRecord = $result2[0];
                        $_SESSION['table number'] = $tableOccupancyRecord['table number'];
                    }


                    // //retrieve service request list

                    // $sql = "SELECT * FROM `service requests` WHERE `individual visit id` = ?";
                    // $result2 = executeSql($sql, array($_COOKIE["individualVisitId"]));
                    // // $serviceRequestLength = 0;
                    // foreach ($result2 as $row) {
                    //     $serviceRequest = array(
                    //         "service request" => $row['service requested']
                    //     );
                    //     $_SESSION['service requests'][$serviceRequestLength] = $serviceRequest;
                    //     $serviceRequestLength++;
                    // }

                    // //retrieving orders list to assign in cart
                    // // $orderItemsLength = 0;
                    // $sql = "SELECT * FROM `order records` WHERE `individual visit id` = ?";
                    // $result2 = executeSql($sql, array($_COOKIE["individualVisitId"]));
                    // foreach ($result2 as $row) {
                    //     $order = array(
                    //         "order" => $row['service requested']
                    //     );
                    //     $_SESSION['cart'][$cartLength] = $order;
                    //     $cartLength++;
                    // }

                    // //retrieving sub customers list
                    // $subCustomersLength = 0;
                    // $sql = "SELECT * FROM `sub customers` WHERE `individual visit id` = ?";
                    // $_SESSION['sub customers list'] = 0;
                    // $result2 = executeSql($sql, array($_COOKIE["individualVisitId"]));
                    // foreach ($result2 as $row) {
                    //     $subCustomer = array(
                    //         "sub customer" => $row['service requested']
                    //     );
                    //     $_SESSION['sub customers list'][$subCustomersLength] = $subCustomer;
                    //     $subCustomersLength++;
                    // }

                    // $_SESSION['checked in at'] = $foundCustomer['checked in at'];
                    // $_SESSION['checked out at'] = $foundCustomer['checked out at'];
                    // header("refresh:1;url=enterTable.php");
                }

                //check if this customer was signed in within last 10 minutes
                //store them in session variables
            }

            //if it is no
            //just store guest name, individual visit id, logged in status
            else if (!isset($_COOKIE["individualVisitId"])) {

                //we have to add the customer as new record into individual visits
                $sql = "INSERT INTO `individual visits`(`name`, `logged in`) VALUES (?,?)";
                // insertSql($sql, ["Ei", true]);
                insertSql($sql, array($guestName, true));
                $sql = "SELECT * FROM `individual visits` ORDER BY `individual visit id` DESC LIMIT 1;
                ";
                $lastInsertedRow = getRows($sql, null)[0];
                // $lastInsertedId = getColumn($sql, null, 'individual visit id');
                // var_dump($lastInsertedRow);
                // $value = $lastInsertedRow['individual visit id'];
                // setcookie("TestCookie", $value);

                //set individual id as cookie
                setcookie("individualVisitId", $lastInsertedRow['individual visit id']);
                echo $_COOKIE["individualVisitId"];

                $_SESSION['customer type'] = $lastInsertedRow['customer type'];
                $_SESSION['userName'] = $lastInsertedRow['name'];
                $_SESSION['member id'] = $lastInsertedRow['member id'];
                $_SESSION['individual visit id'] = $lastInsertedRow['individual visit id'];
                $_SESSION['logged in'] = $lastInsertedRow['logged in'];
                $_SESSION['order status'] = $lastInsertedRow['order status'];
                $_SESSION['checked in at'] = $lastInsertedRow['checked in at'];
                $_SESSION['table occupancy id'] = $lastInsertedRow['table occupancy id'];

                echo $_SESSION['userName'];
                echo $_SESSION['customer type'];
                echo $_SESSION['member id'];
                echo $_SESSION['individual visit id'];
                echo $_SESSION['logged in'];
                echo $_SESSION['order status'];
                echo $_SESSION['checked in at'];
                echo $_SESSION['table occupancy id'];
            }
        } else {
            $gSignInSuccess['signInAttempt'] = 'Check in Failed';
        }
    }
}

//Procedural way 
if (isset($_POST["memberSignin"])) {
    //get the posted form values and store them in variables
    $useremail = trim($_POST['useremail']);
    $userpassword = trim($_POST['userpassword']);
    echo $useremail;
    echo $userpassword;
    // $userpassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    //Create a Member Login Controller
    // $loginContr = new LoginContr($useremail, $userpassword);

    //check error handlers
    if (checkEmpty($useremail) == false) {
        $mSignInErrors['email'] = 'Email should not be blank';
        $mSignInErrors['signInAttempt'] = 'Sign in failed';
    } else {
        if (checkEmail($useremail) == false) {
            $mSignInErrors['email'] = 'Invalid Email';
            $mSignInErrors['signInAttempt'] = 'Sign in failed';
        } elseif (checkEmail($useremail) == true) {
            $mSignInSuccess['email'] = 'Valid Email';
            // $mSignInSuccess['signInAttempt'] = 'Sign in Success';
        }

        //check pwd empty and valid password
        if (checkEmpty($userpassword) == false) {
            $mSignInErrors['password'] = 'Password should not be blank';
            $mSignInErrors['signInAttempt'] = 'Sign in failed';
        } else {
            //check the hashed password
            $mSignInSuccess['password'] = 'Valid password';
        }


        // if ($mSignInErrors['email'] != null && $mSignInErrors['password'] != null) {
        //     $mSignInErrors['signInAttempt'] = 'Sign in failed';
        if ($mSignInSuccess['email'] != null && $mSignInSuccess['password'] != null) {
            //check if the member is already signed up
            $sql = "SELECT * FROM `members` WHERE `email` = ? and `password` = ?";
            $result2 = executeSql($sql, array($useremail, $userpassword));
            // echo $memberName;
            //if the member is signed up - yes
            if (count($result2) == 1) {
                //check the cookie
                //if there is a set cookie
                $memberId = $result2[0]['id'];
                $memberName = $result2[0]['first name'];
                if (isset($_COOKIE["individualVisitId"])) {

                    // echo "Printing cookie id";
                    // echo $_COOKIE['individualVisitId'];
                    // print_r($_COOKIE);
                    //retrieve all information from individual visit
                    echo "<br>";
                    echo "if cookie is set, ";
                    $sql = "SELECT * FROM `individual visits` WHERE `individual visit id` = ? LIMIT 1";
                    $result2 = executeSql($sql, array($_COOKIE["individualVisitId"]));
                    //assign the basic retrieved values to session variables
                    $foundMember = $result2[0];
                    $_SESSION['customer type'] = $foundMember['customer type'];
                    $_SESSION['userName'] = $foundMember['name'];
                    $_SESSION['member id'] = $foundMember['member id'];
                    $_SESSION['individual visit id'] = $foundMember['individual visit id'];
                    $_SESSION['logged in'] = $foundMember['logged in'];
                    $_SESSION['order status'] = $foundMember['order status'];
                    $_SESSION['checked in at'] = $foundMember['checked in at'];
                    $_SESSION['table occupancy id'] = $foundMember['table occupancy id'];

                    echo "the session variables are";
                    echo $_SESSION['userName'];
                    echo $_SESSION['customer type'];
                    echo $_SESSION['member id'];
                    echo $_SESSION['individual visit id'];
                    echo $_SESSION['logged in'];
                    echo $_SESSION['order status'];
                    echo $_SESSION['checked in at'];
                    echo $_SESSION['table occupancy id'];

                    // //retrieve table number
                    if ($_SESSION['table occupancy id'] != null) {
                        $sql = "SELECT * FROM `table occupancy` WHERE `table number` = ?";
                        $result2 = executeSql($sql, array($_SESSION['table occupancy id']));
                        $tableOccupancyRecord = $result2[0];
                        $_SESSION['table number'] = $tableOccupancyRecord['table number'];
                    }
                }

                //if there is no set cookie
                else if (!isset($_COOKIE['individualVisitId'])) {
                    echo "<br>";
                    echo "if cookie is not set, ";
                    //create a new record in individual visits
                    $sql = "INSERT INTO `individual visits`(`member id`, `name`, `logged in`) VALUES (?,?,?)";
                    insertSql($sql, array($memberId, $memberName, true));
                    $sql = "SELECT * FROM `individual visits` ORDER BY `individual visit id` DESC LIMIT 1;
                    ";
                    $lastInsertedRow = getRows($sql, null)[0];
                    echo "<br>";
                    echo "last inserted row";
                    var_dump($lastInsertedRow);
                    //set individual id as cookie

                    setcookie("individualVisitId", $lastInsertedRow["individual visit id"]);
                    // echo "<br>";
                    // echo "cookie id";
                    // $value = 'something from somewhere';
                    // setcookie("TestCookie", $value);
                    // echo $_COOKIE["TestCookie"];
                    // echo htmlspecialchars($_COOKIE['individualVisitId']);


                    $_SESSION['customer type'] = $lastInsertedRow['customer type'];
                    $_SESSION['userName'] = $lastInsertedRow['name'];
                    $_SESSION['member id'] = $lastInsertedRow['member id'];
                    $_SESSION['individual visit id'] = $lastInsertedRow['individual visit id'];
                    $_SESSION['logged in'] = $lastInsertedRow['logged in'];
                    $_SESSION['order status'] = $lastInsertedRow['order status'];
                    $_SESSION['checked in at'] = $lastInsertedRow['checked in at'];
                    $_SESSION['table occupancy id'] = $lastInsertedRow['table occupancy id'];

                    echo $_SESSION['userName'];
                    echo $_SESSION['customer type'];
                    echo $_SESSION['member id'];
                    echo $_SESSION['individual visit id'];
                    echo $_SESSION['logged in'];
                    echo $_SESSION['order status'];
                    echo $_SESSION['checked in at'];
                    echo $_SESSION['table occupancy id'];
                }

                $mSignInSuccess['signInAttempt'] = 'Sign In Success';
                header("refresh:3;url=enterTable.php");
            }

            //if the member is not signed up yet
            else {
                //header to sign up page
                $mSignInErrors['signInAttempt'] = 'Please sign up first or sign in as a guest';
                // echo $mSignInErrors['signInAttempt'];
                header("refresh:2;url=signup.php");

            }
        }
    }
}


//OOP way of Member Sign in
//Member Sign in Controller
//Form Validation
// if (isset($_POST["memberSignin"])) {
//     //get the posted form values and store them in variables
//     $useremail = trim($_POST['useremail']);
//     $userpassword = trim($_POST['userpassword']);
//     echo $useremail;
//     echo $userpassword;
//     // $userpassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
//     //Create a Member Login Controller
//     $loginContr = new LoginContr($useremail, $userpassword);

//     //if all errorhandlers are validated
//     if ($loginContr->checkemptyEmail() == false) {
//         $mSignInErrors['email'] = 'Email should not be blank';
//         $mSignInErrors['signInAttempt'] = 'Sign in failed';
//     } else {
//         if ($loginContr->checkvalidEmail() == false) {
//             $mSignInErrors['email'] = 'Invalid Email';
//             $mSignInErrors['signInAttempt'] = 'Sign in failed';
//         } elseif ($loginContr->checkvalidEmail() == true) {
//             $mSignInSuccess['email'] = 'Valid Email';
//             // $mSignInSuccess['signInAttempt'] = 'Sign in Success';
//         } else {
//             $mSignInErrors['signInAttempt'] = 'Sign in failed';
//         }
//     }

//     //check pwd empty and valid password
//     if ($loginContr->checkemptyPwd() == false) {
//         $mSignInErrors['password'] = 'Password should not be blank';
//         $mSignInErrors['signInAttempt'] = 'Sign in failed';
//     } else {
//         //check the hashed password
//         // if($loginContr->checkPassword())
//         // {

//         // }

//         $mSignInSuccess['password'] = 'Valid password';
//     }

//     //check if user already exists in database

//     if ($mSignInErrors['email'] == null && $mSignInErrors['password'] == null) {
//         if ($loginContr->checkUserMember() == 1) {
//             // $mSignInSuccess['userNotFound'] = 'User found';
//             $mSignInSuccess['signInAttempt'] = 'Sign in success';
//             setName($loginContr->getName());
//             $_SESSION["userName"] = $loginContr->getName();
//             // $_SESSION['userName']
//             // setLoggedIn(true);
//             $_SESSION["loggedIn"] = true;
//             header("refresh:1;url=enterTable.php");
//         } else if ($loginContr->checkUserMember() == 0) {
//             $mSignInErrors['signInAttempt'] = 'User not found. Please sign up first!';
//             // $mSignInErrors['signInAttempt'] = 'Sign in failed';

//         } else {
//             $mSignInErrors['signInAttempt'] = 'Sign in failed';
//         }
//     }
// }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

<body onload="console.log('Welcome to my home page!');">


    <!--View Templates-->
    <!--Guest Check in View Template-->
    <!--Log in form-->
    <div class="main">
        <div class="mainstyle">
            <div class="image" id="logo1">
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
                <span>
                    <p class="first-half"></p><span>
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