<?php

include 'includes/readTablesMethods.inc.php';

// $unreadSql = "SELECT COUNT(*) FROM `notifications` WHERE `status` = ?";
// $unreadNotifications = getCount($unreadSql, array(0));


$unreadSql = "SELECT COUNT(*) FROM `notifications` WHERE `status` = ?";
$unreadNotifications = getCount($unreadSql, array(0));

echo $unreadNotifications;
