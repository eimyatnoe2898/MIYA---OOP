<?php
    require "includes/config.php";
    session_start();

    $customer_type = $_SESSION['customer_type'];
    $table_occupancy_id = $_SESSION['table_occupancy_id'];
    $username = $_SESSION["username"];
    $individual_visit_id = $_SESSION["individual_visit_id"];
    // $drink_id = $row["id"];
    // $order_notes = $row["notes"];
    // $order_quantity = $row["quantity"];
    // $order_unit_price = $row["price"];
    // $order_total_price = number_format($row["quantity"] * $row["price"], 2);
    $order_status = "submitted";
    $customer_status = "submitted order";

    if($customer_type == 'master')
    {
        if(!empty($_SESSION["users_list"]))
        {
            foreach($_SESSION["users_list"] as $items => $customers)
            {
                //SEARCH FOR SUBMITTED ORDERS

                $c_name = $customers["username"];
                $c_individual_id = $customers["individual_visit_id"];

                //check if the customer submitted their order
                $stmt = "SELECT c_status from individual_visits WHERE individual_visit_id = '$c_individual_id' LIMIT 1";
                $result = mysqli_query($conn, $stmt);
                
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {

                        if($row['c_status'] == "submitted order")
                        {
                            $stmt = "SELECT * from order_items WHERE individual_ID = '$c_individual_id' and order_status = '$order_status'";
                            $result = mysqli_query($conn, $stmt);
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo "<h3><b>".$c_name. "'s cart". "</h3><b>";
            
                                $output = '<table border = "10" id = "cart">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Notes</th>
                                    <th>Served</th>
                                    <th>To Go</th>
                                    <th>Review</th>
                                </tr>';
                                
                                $total = 0;
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $output .= '<tr>
                                    <td>'.$row['d_id'].'</td>
                                    <td>'.$row['order_name'].'</td>
                                    <td>'.$row['order_size'].'</td>
                                    <td>'.$row['unit_price'].'</td>
                                    <td>'.$row['order_quantity'].'</td>
                                    <td>'.$row['order_notes'].'</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>';
                                    $total = $total + ($row["order_quantity"] * $row["unit_price"]); 
                                }

                                $output .= '<tr>
                                <td></td>
                                <td colspan="8" align ="right">Total</td>
                                <td align ="right">$';
                                $output .= number_format($total, 2). '</td></tr>';
                                
                            }
            
                            $output .= '</table>';
                            echo $output;
        
                        }
                    }
                }
            }
        }
    }

    else if($customer_type == 'customer')
        {
        $stmt = "SELECT * from order_items WHERE individual_ID = '$individual_visit_id' and order_status = '$order_status'";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) > 0)
        {
            echo "<h3><b>".$username. "'s cart". "</h3><b>";
            $output = '<table border = "10" id = "cart">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Notes</th>
                    <th>Served</th>
                    <th>To Go</th>
                    <th>Review</th>
                </tr>';
            while($row = mysqli_fetch_assoc($result))
            {
                $output .= '<tr>
                <td>'.$row['d_id'].'</td>
                <td>'.$row['order_name'].'</td>
                <td>'.$row['order_size'].'</td>
                <td>'.$row['unit_price'].'</td>
                <td>'.$row['order_quantity'].'</td>
                <td>'.$row['order_notes'].'</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>';
            }
                $output .= '</table>';
                echo $output;

            }
        }


        echo count($_SESSION["users_list"]);
        $submitted_count = 0;
        //check if all current users have submitted their orders
        foreach($_SESSION["users_list"] as $items => $customers)
        {
            $c_name = $customers["username"];
            $c_individual_id = $customers["individual_visit_id"];
            //check if the customer submitted their order
            $stmt = "SELECT c_status from individual_visits WHERE individual_visit_id = '$c_individual_id' LIMIT 1";
            $result = mysqli_query($conn, $stmt);
            
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    if($row['c_status'] == "submitted order")
                    {
                        $submitted_count++;
                    }

                }

            }

            $customers_count = count($_SESSION["users_list"]);
            
        }


        //if yes,
        if($customers_count == $submitted_count)
        {
            echo "<h1>All orders have been submitted. You can verify now.</h1>";
            ?>
        
        <form method = "post" id = "checkCart" action = "verifyOrders.php">
                <button class="open-cart" name = "verify_order">Verify Orders</button>
        </form>  
        <?php

        }

        //if no,
        else if($customers_count > $submitted_count)
        {
            //alert how many users are left to verify
            echo "<h1>Orders cannot be verified yet.</h1>";
            echo $submitted_count. "/". $customers_count. " customers submitted so far.";
            
        }

        ?>
        <?php
    

        ?>
    
</body>
</html>