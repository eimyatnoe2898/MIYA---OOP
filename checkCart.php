<?php
include_once "header.php";
?>
<?php
session_start();
// Check if the user is logged in, if not then redirect him to landing page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
    header("location:/MIYA_NEW/index.html?error=notloggedin");
    exit;
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

    <script>
        $(document).ready(function(){

            //method to run every 1s to echo the users (new + old)
            function fetchUsers()
            {
            $.ajax({
                url: "fetchUsers.php",
                method: "POST",
                success: function(data){
                // Perform operation on the return value
                    $("#users").html(data);
                }
            });
            }   
    
            function fetchSession()
            {
                $.ajax({
                    url: "fetchSession.php",
                    method : "POST",
                    success: function(data)
                    {
                        $("#sessionvariables").html(data);
                    }
                })
            }


            setInterval(function()
            {
                fetchUsers()
            }, 1000)

            setInterval(function()
                {
                    fetchSession()
                }
            , 1000)

            //here fetch the orders from other users and show it in the userorders DOM element
            
            
        });
    </script>
</head>
<body>

            <form id = "Goback" method = "post" action = "browsemenu2.php">
             <button type = "submit">Go Back to Menu</button>
         </form>
<div class = "user_details">
        <div class = "userdet-text1">
            <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Here's your cart!</h1>
            <h4 class="my-5">Table Number: <b><?php echo htmlspecialchars($_SESSION["tablenumber"]); ?></b></h1>
        </div>
</div>

<div id="users">



</div>

    <!--Session Variables-->
    <div id="sessionvariables"></div>
<?php


if(!empty($_SESSION["cart"])){
    echo $_SESSION["cart"][0]["order_status"]
    ;
?>
    <!-- <h3><?php echo date("Y/m/d")?></h3> -->
    <h3><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>'s Cart</h3>
    <table border = "10" id = 'cart'>
    <tr>
    
    <th>ID</th>
    <th>Name</th>
    <th>Size</th>
    <th>Price</th>
    <!-- <th>Notes</th> -->
    <th>Quantity</th>
    <th>Total</th>
    <th>Notes</th>
    <th>Served</th>
    <th>To Go</th>
    <th>Review</th>

    </tr>

    <?php

        //Using SQL query
        //select orders where indivdual id  = current individual id

        $stmt = "SELECT ";


        $submitted = 0;
        $added = 0;

        //Using session variables
        //if 
        $total = 0;
        foreach($_SESSION["cart"] as $items => $values)
        {
            if($values["order_status"] == "added")
            {
                $added++;
                    ?>
                    <tr>

                    <td><?php echo $values["id"]; ?></td>
                    <td><?php echo $values["name"] ?></td>
                    <td><?php echo $values["size"]; ?></td>
                    <td>$<?php echo $values["price"]; ?></td>
                    <td><?php echo $values["quantity"]; ?></td>
                    <td>$<?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                    <td><?php echo $values["notes"]; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php
                        $total = $total + ($values["quantity"] * $values["price"]);

                        
                    $_SESSION["totalprice"] = $total;
                
                ?>
                    <td><form method = "post" action = "removeItems.php">
                    <input type = "submit" name = "add" value = "Remove">
                    </form>
                    <form method = "post" action = "removeItems.php">
                    <input type = "submit" name = "add" value = "Edit">
                    </form>
                    </td>

                    <?php
            }

            else if($values["order_status"] == "submitted")
            {
                ?>

                    <?php
            }

            
            
        }
                    ?>
                <!-- <tr>
                    <td></td>
                    <td colspan="8" align ="right">Total</td>
                    <td align ="right">$<?php echo number_format($total, 2); ?></td>

                    </tr>
                    </table> -->
        
        <?php



        echo "added items ". $added. "<br>";
        echo "submitted items ". $submitted. "<br>";

         
         if($added < 1)
         {
             ?>
             <tr>
             <td colspan="10"><h3>Your cart is empty. Enjoy browsing <a href="browsemenu2.php"> the menu</a> here.</h3>  </td>
            </tr>
         </table>
            <?php
        }

        else if($added >= 1)
        {

            ?>

                <tr>
                <td></td>
                <td colspan="8" align ="right">Total</td>
                <td align ="right">$<?php echo number_format($total, 2); ?></td>

                </tr>
                </table>
            <?php
        }

    }

    else{
    ?>
        <h3>Your cart is empty. Enjoy browsing <a href="browsemenu2.php">the menu</a> here.</h3>       

    
        <?php
    }
        ?>
            <br>
            <?php
                //if this is master
                if($_SESSION["customer_type"] == "master")
                {
                    // Show the Verify All Orders
                ?>
                    <form id = "checkout" method = "post" action = "submitOrders.php">
                        <button type = "submit" name = "submit_orders">Submit Orders in Cart</button>
                    </form>
                    <form method = "post" id = "checkCart" action = "showSubmitted.php">
                        <button class="open-cart">Verify Order</button>
                    </form>  
                
                <?php
                }
                //if this is customer
                else if($_SESSION["customer_type"] == "customer")
                {
                    ?>
                    <form id = "checkout" method = "post" action = "submitOrders.php">
                        <button type = "submit" name = "submit_orders">Submit Orders in Cart</button>
                    </form>

                
                <?php  
                }
            ?>



    <!--for other user's orders-->
    <div id="userorders"></div>
        <?php



    ?>
</body>
</html>




<?php
include_once "footer.php";
?>
