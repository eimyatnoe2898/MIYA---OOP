<?php
// require "includes/config.php";
include 'includes/readTablesMethods.inc.php';

session_start();


    //if the person is master
    // $allSubmitted = false;
if ($_SESSION['customer type'] == 'master') {
    //read other users
    //retrieve other users from db
    $sql = "SELECT * FROM `individual visits` WHERE `table occupancy id` = ?";
    $allCustomers = getRows($sql, array($_SESSION['table occupancy id']));
    $otherCustomerCount = 0;
    $allCustomersCount = count($allCustomers);


    //loop over each user and print out the users
    foreach ($allCustomers as $items => $customer) {
        $customerID = $customer['individual visit id'];
        if ($customer['customer type'] == 'customer') {
            if ($customer['order status'] == "ordered/waiting") {
                $otherCustomerCount++;
                echo "<h3>" . $customer['name'] . "'s Cart" . "</h3>";
                $total = 0;
                //retrieve their orders
                $sql1 = "SELECT * FROM `food orders` WHERE `individual visit id` = ?";
                $allFoodOrders = getRows($sql1, array($customerID));
                $sql2 = "SELECT * FROM `drink orders` WHERE `individual visit id` = ?";
                $allDrinkOrders = getRows($sql2, array($customerID));

                //if there are any orders in the cart
                if (count($allFoodOrders) >= 1 || count($allDrinkOrders) >= 1) {
                    //read the food orders
                    echo "<table border= '10' id='cart'>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>quantity</th>
                <th>Total</th>
                <th>Notes</th>
                <th>To Go</th>
                </tr>
            ";
                    foreach ($allFoodOrders as $items => $foodOrder) {
?>
                        <tr>
                            <td><?php echo $foodOrder['food order id'] ?></td>
                            <td><?php echo $foodOrder['name'] ?></td>
                            <td><?php echo "Null" ?></td>
                            <td><?php echo $foodOrder['price'] ?></td>
                            <td><?php echo $foodOrder['quantity'] ?></td>
                            <td><?php echo $foodOrder['total price'] ?></td>
                            <td><?php echo $foodOrder['customer notes'] ?></td>
                            <td><?php echo $foodOrder['to go'] ?></td>
                        </tr>
                    <?php

                        $total = $total + ($foodOrder["quantity"] * $foodOrder["price"]);
                    }

                    //read the drink orders
                    foreach ($allDrinkOrders as $items => $drinkOrder) {
                    ?>
                        <tr>
                            <td></td>
                            <td><?php echo $drinkOrder["name"] ?></td>
                            <td><?php echo $drinkOrder["size"]; ?></td>
                            <td>$<?php echo $drinkOrder["price"]; ?></td>
                            <td><?php echo $drinkOrder["quantity"]; ?></td>
                            <td>$<?php echo number_format($drinkOrder["quantity"] * $drinkOrder["price"], 2); ?></td>
                            <td><?php echo $drinkOrder["customer notes"]; ?></td>
                            <td><?php echo $drinkOrder["to go"] ?></td>

                        </tr>
                    <?php
                        $total = $total + ($drinkOrder["quantity"] * $drinkOrder["price"]);
                    }
                } else if (count($allDrinkOrders) == 0 && count($allFoodOrders) == 0) {
                    ?>
                    <tr>
                        <td colspan="10">
                            <h3>Your cart is empty. Enjoy browsing <a href="browsemenu2.php"> the menu</a> here.</h3>
                        </td>
                    </tr>
                <?php
                }
                ?>

                <tr>
                    <td></td>
                    <td colspan="6" align="right">Total</td>
                    <td align="right">$<?php echo number_format($total, 2); ?></td>
                </tr>
                </table>


    <?php
            }
        }
    }

    ?>

    <form id="checkout" method="post" action="">
        <button type="submit" name= "verifyOrders">Verify submitted orders at table <?php echo $_SESSION['table number'] ?></button>
    </form>

<?php
}


