<?php
include 'includes/readTablesMethods.inc.php';
session_start();

$allNotifications = "";
echo "<script>
        document.getElementById('unreadNotification').html = '';
    </script>";

if ($_SESSION['customer type'] == 'master') {
    //only retrieve notifications for master
    $sql2 = "SELECT * FROM notifications WHERE `for` = ? ORDER BY `notification id` DESC";
    $rows = getRows($sql2, array('master'));
    foreach ($rows as $notification) {

    $allNotifications .= '<a class="dropdown-item" href="#">' . $notification['content'] . '</a>';
    $allNotifications .= '<div class="dropdown-divider"></div>';
    echo $allNotifications;
}
}

else if ($_SESSION['customer type'] == 'admin') {
    //only retrieve notifications for admin
    $sql3 = "SELECT * FROM notifications WHERE `for` = ? ORDER BY `notification id` DESC";
    $rows = getRows($sql3, array('admin'));

    foreach ($rows as $notification) {

        $allNotifications .= '<a class="dropdown-item" href="#">' . $notification['content'] . '</a>';
        $allNotifications .= '<div class="dropdown-divider"></div>';
        echo $allNotifications;
    }

}

else if($_SESSION['customer type'] == 'customer') {
    //only retrieve notifications for customer
    $sql4 = "SELECT * FROM notifications WHERE `for` = ? ORDER BY `notification id` DESC";
    $rows = getRows($sql4, array('customer'));

    foreach ($rows as $notification) {

        $allNotifications .= '<a class="dropdown-item" href="#">' . $notification['content'] . '</a>';
        $allNotifications .= '<div class="dropdown-divider"></div>';
        echo $allNotifications;
    }
}


