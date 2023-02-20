<?php
// session_start();
include_once 'includes/readTablesMethods.inc.php';

// Check if the user is logged in, if not then redirect him to landing page
if (!isset($_SESSION['logged in']) || $_SESSION['logged in'] != true) {
    header("location:../index.php?error=notloggedIn");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- request checkout
    <form method="post" action="" id="checkoutRequest">
        <button type="submit" name="checkRequest">Call for Check out</button>

    </form> -->

    <!--request extra-->
    <form method="post" action="" id="serviceRequest">
        <!--drop down for the services available-->
        <select type="text" name="serviceType">
            <option value="">--- Choose Service ---</option>
            <option value = "check out">Check out</option>
            <option value = "utensils">Utensils</option>
            <option value = "paper towel">Paper Towel</option>
            <option value = "water">Water</option>
            <option value = "drink refill">Drink refill</option>
            <option value = "to go box">To go box</option>
            <option value = "others">Others</option>
        </select>
        <br>
        <button type="submit" name="callForService">Call for service</button>

    </form>

    <!--request table service-->
    <!-- <form method="post" action="" id = "tableService">
        <button type="submit" name="tableService">Call for table service</button>
    </form> -->
</body>

</html>