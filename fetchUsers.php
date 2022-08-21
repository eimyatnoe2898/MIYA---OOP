<?php
    require "includes/config.php";
    session_start();

    $customer_type = $_SESSION['customer_type'];
    $table_occupancy_id = $_SESSION['table_occupancy_id'];
    $user_array = "";
    if($customer_type == 'master')
    {

    $output = '<table>
                <tr>
                    <td>Name</td>
                    <td>Message</td>
                </tr>';
    $stmt = "SELECT * from individual_visits WHERE table_occupancy_id = '$table_occupancy_id'";
    $result = mysqli_query($conn, $stmt);
    
    if(mysqli_num_rows($result) >0)
    {
        echo "Customer List at Table " . $_SESSION['tablenumber'];

        $count = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            $user_info = array(
                "individual_visit_id" => $row['individual_visit_id'],
                "username" => $row['c_name']);

            $output .= '<tr>
                <td>'.$row['individual_visit_id'].'</td>
                <td>'.$row['c_name'].'</td>
            </tr>';
            
            $_SESSION["users_list"][$count] = $user_info;
            $count++;
        }

        $output .= '</table>';
        echo $output;

    }

    else
    {
        echo "No other users found";
    }

    echo "These are session variables";
    foreach($_SESSION["users_list"] as $items => $users){
        echo "<br>";
        echo $users["individual_visit_id"]. " ";
        echo $users["username"];
        echo "<br>";
    }
    }


?>