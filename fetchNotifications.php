<?php

$allSql = "SELECT * FROM `notifications`";
$allNotifications = executeSql($allSql,null);

echo $allNotifications;