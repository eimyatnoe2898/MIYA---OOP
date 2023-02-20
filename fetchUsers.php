<?php

include 'includes/readTablesMethods.inc.php';

    session_start();

    $_SESSION["all customers"] = array();
    $customerType = $_SESSION['customer type'];
    $table_occupancy_id = $_SESSION['table occupancy id'];
    $allCustomers = "";

    if($customerType == 'master')
    {

    $output = '<table>
                <tr>
                    <td>Name</td>
                    <td>Message</td>
                </tr>';
    $sql1 = "SELECT * from `individual visits` WHERE `table occupancy id` = ?";
    // $result = executeSql($sql1, array($table_occupancy_id));
    $rows = getRows($sql1, array($table_occupancy_id));
    
    if(count($rows)>0)
    {
        // $output .= "<table border='10'id='cart'>
        // <tr>

        //     <th>ID</th>
        //     <th>Name</th>
        //     <th>Size</th>
        //     <th>Price</th>
        //     <th>amount</th>
        //     <th>Total</th>
        //     <th>Notes</th>
        //     <th>To Go</th>
        //     <th>Review</th>

        // </tr>";

        // $output .= 

        // echo "Customer List at Table " . $_SESSION['table number'];

        // foreach ($rows as $customerInfo) {
        //     $customer = array("individual visit id" => $customerInfo["individual visit id"], "name" => $customerInfo["name"]);
        //     $output .= '<tr>
        //     <td>'.$customer['individual visit id'].'</td>
        //     <td>'.$customer['name'].'</td>
        // </tr>';
        // array_push($_SESSION["all customers"], $customer);
        // }
        // $output .= '</table>';
        // echo $output;

    }

    else
    {
        echo "No other users found";
    }

}

?>