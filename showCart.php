<?php
session_start();
include_once 'includes/readTablesMethods.inc.php';

// Check if the user is logged in, if not then redirect him to landing page
if (!isset($_SESSION['logged in']) || $_SESSION['logged in'] != true) {
    header("location:../index.php?error=notloggedIn");
    exit;
}

//if remove is clicked
if(isset($_POST['remove']))
{
    //remove from db 
}

//if edit is clicked
if(isset($_POST['edit']))
{

}


//submit order - update to submitted (all orders)
if (isset($_POST["submit_orders"])) {
    // if($_SESSION['customer type'] == 'customer')
    // {
    //change the order status of cart items to submitted
    $index = 0;
    foreach ($_SESSION['cart'] as $item) {
        $item['order status'] = "submitted";
        $_SESSION["cart"][$index] = $item;
        $index++;
    }

    $sql4 = "UPDATE `food orders` SET `order status` = ? where `order status` = ? and `individual visit id` = ?";
    $result = executeSql($sql4, array('submitted', 'added', $_SESSION['individual visit id']));
    $sql5 = "UPDATE `drink orders` SET `order status` = ? where `order status` = ? and `individual visit id` = ?";
    $result = executeSql($sql4, array('submitted', 'added', $_SESSION['individual visit id']));
    $sql7 = "UPDATE `individual visits` SET `order status` = ? WHERE `order status` = ? and `table occupancy id` = ? and `individual visit id` = ?";
    $result7 = executeSql($sql7, array('ordered/waiting', 'not ordered/browsing', $_SESSION['table occupancy id'], $_SESSION['individual visit id']));
    $content = $_SESSION['userName']. ' from Table '. $_SESSION['table number']. ' has submitted order'; 
    echo "order submitted";
    
    //add to notifications
    $sql8 = "INSERT INTO `notifications`(`for`, `category`, `table occupancy id`,`individual visit id`, `content`) VALUES(?,?,?,?, ?)";
    $result8 = insertSql($sql8, array('master', 'order submission', $_SESSION['table occupancy id'], $_SESSION['individual visit id'], $content));
    $result8 = insertSql($sql8, array('admin', 'order submission', $_SESSION['table occupancy id'],  $_SESSION['individual visit id'], $content));

    
}

//verify all the submitted orders
if (isset($_POST['verifyOrders']))
{
    echo "Let's verify orders";
    //verify all the users in the cart
    $sql1 = "SELECT * FROM `individual visits` WHERE `table occupancy id` = ?";
    $allCustomers = getRows($sql1, array($_SESSION['table occupancy id']));

    foreach($allCustomers as $items => $submittedCustomer)
    {
        $customerID = $submittedCustomer['individual visit id'];
        //if the customer has submitted order
        if($submittedCustomer['order status'] == "ordered/waiting")
        {
        //change the verify status to verified - verified by master
        $sql2 = "UPDATE `individual visits` SET `verify status` = ? where `verify status` = ? and `individual visit id` = ?";
        $result2 = executeSql($sql2, array('verified', 'not verified', $customerID));
        echo "all orders that have submitted has been VERIFIED BY MASTER";

        //add to notifications
        $content = "Submitted orders from table ". $_SESSION['table number']. 'have been verified';
        $sql3 = "INSERT INTO `notifications`(`for`, `category`, `table occupancy id`, `individual visit id`, `content`) VALUES(?,?,?,?, ?)";
        $result3 = insertSql($sql3, array('admin', 'order verification', $_SESSION['table occupancy id'], $customerID, $content));
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
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <?php
    // include 'includes/autoloader.inc.php';
    // include 'includes/sessionMethods.inc.php';


    ?>
    <script>
        $(document).ready(function() {
            //method to run every 1s to echo the users (new + old)
            function fetchUsers() {
                $.ajax({
                    url: "fetchUsers.php",
                    method: "POST",
                    success: function(data) {
                        // Perform operation on the return value
                        $("#users").html(data);
                    }
                });
            }

            function fetchSession() {
                $.ajax({
                    url: "fetchSession.php",
                    method: "POST",
                    success: function(data) {
                        $("#otherUsers").html(data);
                    }
                })
            }

            setInterval(function() {
                fetchUsers()
            }, 1000)

            setInterval(function() {
                fetchSession()
            }, 1000)

            //here fetch the orders from other users and show it in the userorders DOM element


        });
    </script>
</head>

<body>

    <form id="Goback" method="post" action="browsemenu2.php">
        <button type="submit">Go Back to Menu</button>
    </form>
    <div class="user_details">
        <div class="userdet-text1">
            <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["userName"]); ?></b>. Here's your cart!</h1>
            <h4 class="my-5">Table Number: <b><?php echo htmlspecialchars($_SESSION["table number"]); ?></b></h1>
        </div>
    </div>

    <div id="main user">
        <h3>My Cart</h3>
        <table border='10' id='cart'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Notes</th>
                <th>To Go</th>
                <th></th>
            </tr>

            <?php
            //if there is not items in the cart
            if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
            ?>
                <tr>
                    <td colspan="10">
                        <h3>Your cart is empty. Enjoy browsing <a href="browsemenu2.php"> the menu</a> here.</h3>
                    </td>
                </tr>
                <?php

            } else {
                $total = 0;
                var_dump($_SESSION['cart']);
                echo $_SESSION['cart'][0]['order status'];
                foreach ($_SESSION['cart'] as $items => $menuItem) {
                    //if the menuItem is food
                    echo $_SESSION['cart'][0]['order status'];
                    if ($menuItem['type'] == 'food') {
                ?>

                        <tr>
                            <td><?php echo $menuItem['id'] ?></td>
                            <td><?php echo $menuItem['name'] ?></td>
                            <td></td>
                            <td><?php echo $menuItem['price'] ?></td>
                            <td><?php echo $menuItem['amount'] ?></td>
                            <td><?php echo $menuItem['totalAmount'] ?></td>
                            <td><?php echo $menuItem['customerNotes'] ?></td>
                            <td><?php echo $menuItem['to go?'] ?></td>
                        <?php
                        $total = $total + ($menuItem["amount"] * $menuItem["price"]);
                        echo $menuItem['order status'];
                    }

                    //if the menuItem is drink
                    else if ($menuItem['type'] == 'drink') {
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $menuItem['name'] ?></td>
                            <td><?php echo $menuItem['size'] ?></td>
                            <td><?php echo $menuItem['price'] ?></td>
                            <td><?php echo $menuItem['amount'] ?></td>
                            <td><?php echo $menuItem['totalAmount'] ?></td>
                            <td><?php echo $menuItem['customerNotes'] ?></td>
                            <td><?php echo $menuItem['to go?'] ?></td>

                        <?php
                        $total = $total + ($menuItem["amount"] * $menuItem["price"]);

                        echo $menuItem['order status'];
                    }

                    if ($menuItem['order status'] == 'added') {
                        ?>
                            <td>
                                <form method="post" action="">
                                    <input type="submit" name="remove" value="Remove">
                                </form>
                                <form method="post" action="">
                                    <input type="submit" name="edit" value="Edit">
                                </form>
                            </td>
                        <?php
                    } else if ($menuItem['order status'] == 'submitted') {
                        ?>
                        </tr>
                <?php
                    }
                }

                ?>
                <tr>
                    <td></td>
                    <td colspan="7" align="right">Total</td>
                    <td align="right">$<?php echo number_format($total, 2); ?></td>
                <?php
            }
                ?>
        </table>
        <form id="checkout" method="post" action="">
        <button type="submit" name="submit_orders">Submit orders in my cart</button>
    </form>

    </div>

    <!--read session in here-->
    <div id="otherUsers">
    </div>

    <br>

    <!-- <div id = "check">

    </div> -->
    <!-- <?php

    
    // if($_SESSION['customer type'] == 'master')
    // {
    //     ?>
    //     <form id="checkout" method="post" action="">
    //     <button type="submit" name="submit_orders">Submit orders in your cart</button>
    // </form>
    // <form method="post" id="checkCart" action="">
    //     <button type="submit" name ="verify_orders" disabled>Verify other's orders</button>
    // </form>
    // <?php
    // }

    // else if($_SESSION['customer type'] == 'customer')
    // {
    //     ?>
    //     <form id="checkout" method="post" action="">
    //     <button type="submit" name="submit_orders">Submit Orders in Cart</button>
    // </form>
    // <?php
    // }
    // ?> -->



</body>

</html>