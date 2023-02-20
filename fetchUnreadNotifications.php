<?php

include 'includes/readTablesMethods.inc.php';
session_start();
// $unreadSql = "SELECT COUNT(*) FROM `notifications` WHERE `status` = ?";
// $unreadNotifications = getCount($unreadSql, array(0));

$unreadNotifications = '';
if($_SESSION['customer type'] == 'master')
{
    $unreadSql = "SELECT COUNT(*) FROM `notifications` WHERE `status` = ? and `for` = ?";
$unreadNotifications = getCount($unreadSql, array(0, 'master'));
}

else if($_SESSION['customer type'] == 'master')
{
    $unreadSql = "SELECT COUNT(*) FROM `notifications` WHERE `status` = ? and `for` = ?";
    $unreadNotifications = getCount($unreadSql, array(0, 'customer'));
}

else if($_SESSION['customer type'] == 'admin')
{
    $unreadSql = "SELECT COUNT(*) FROM `notifications` WHERE `status` = ? and `for` = ?";
    $unreadNotifications = getCount($unreadSql, array(0, 'admin'));
}

echo $unreadNotifications;
