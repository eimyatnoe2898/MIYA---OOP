<?php
include 'includes/readTablesMethods.inc.php';

session_start();

if ($_SESSION['customer type'] == 'master') {
    //read other users
    //retrieve other users from db
    $sql = "SELECT * FROM `individual visits` WHERE `table occupancy id` = ? and `order status` = ?";
    $submittedCustomers = getRows($sql, array($_SESSION['table occupancy id'], 'submitted'));
    echo $submittedCustomers;
    // $otherCustomerCount = 0;
    // $allCustomersCount = count($allCustomers);


    // foreach ($allCustomers as $items => $customer) {
    //     $otherCustomerCount++;
    // }

    // if ($allCustomers - $otherCustomerCount == 0) {
    //     echo "All other customers have submitted";
    //     echo $otherCustomerCount . "/" . $allCustomers . " has submitted";
    // } else if ($allCustomers - $otherCustomerCount >= 1) {
    //     echo "Not all customers have submitted";
    //     echo $otherCustomerCount . "/" . $allCustomers . " has submitted";
    // }
}
