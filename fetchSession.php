<?php
    require "includes/config.php";
    session_start();

    echo "<h1>These are Session Variables</h1>";
    echo "Username: ". $_SESSION["username"]. "<br>";
    echo "Customer Type: ". $_SESSION["customer_type"]. "<br>";
    echo "Table Number: ". $_SESSION["tablenumber"]. "<br>";
    echo "Table Occupancy ID: ". $_SESSION["table_occupancy_id"]. "<br>";
    echo "Table Occupancy Status: " . $_SESSION['occupancy_status']. "<br>" ;

    echo "Individual Visit ID: ". $_SESSION["individual_visit_id"];
    
    if($_SESSION["customer_type"] == "master")
    {
        echo "<h3>Users at this table</h3>" . "<br>";
        foreach($_SESSION["users_list"] as $items => $users)
        {
            echo $users["individual_visit_id"]. " ";
            echo $users["username"];
            echo "<br>";
        }
    }


    echo "<h1>Items in the cart</h1>";
    $count = 0;
    foreach($_SESSION["cart"] as $items => $values)
    {
        echo "Order " . $count+1 . "<br>";
        echo "Order ID: ". $values["id"]. "<br>";
        echo "Order Name: ". $values["name"]. "<br>";
        echo "Order Size: ". $values["size"]. "<br>";
        echo "Order Unit Price: ". $values["price"]. "<br>";
        echo "Ordered Quantity: ". $values["quantity"]. "<br>";
        echo "Order Status: ". $values["order_status"]. "<br>";
        echo "<br>";

        $count++;
    }




    echo "Done!". "<br>";



?>