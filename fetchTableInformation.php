<?php
//this is the file where when admin click on the table
//1. shows the customer list at the table
//2. shows their orders
//3. updates the table status - give options
//4. VERIFY THE ORDERS

include 'includes/readTablesMethods.inc.php';
session_start();

if ($_SESSION['customer type'] == 'admin') {
    //retrieve customer list by table occupancy id

}