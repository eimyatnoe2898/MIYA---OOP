<?php

include 'includes/readTablesMethods.inc.php';

// $sql = "UPDATE `notifications` SET status= ? where `status` = ?";
// $result = executeSql($sql, array(1, 0));

$sql = "UPDATE `notifications` SET status= ? where `status` = ?";
$result = executeSql($sql, array(1, 0));

var_dump($result);
// echo $data['unreadNotification'];
