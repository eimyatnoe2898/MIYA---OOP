<?php

session_start();

$_SESSION['customer type'] = 'admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="index.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/adminDashboard.css">

    <title>Admin Dashboard</title>
    <script>
        $(document).ready(function() {

            function fetchUnreadNotificationsCount() {
                $.ajax({
                    url: "fetchUnreadNotifications.php",
                    method: "POST",
                    success: function(data) {
                        $("#unreadNotification").html(data);
                        console.log('Return count of unread notifications');
                    }
                })
            }

            function fetchNotifications() {
                $.ajax({
                    url: "fetchNotifications.php",
                    method: "POST",
                    success: function(data) {
                        $("#allNotifications").html(data);
                        console.log('Return all notifications');
                    }
                })
            }

            function fetchTableOccupancy()
            {
                $.ajax({
                    url: "fetchTableOccupancy.php",
                    method: "POST",
                    success: function(data) {
                        $("#tableOccupancy").html(data);
                        console.log('Return all notifications');
                    }
                })
            }

            setInterval(function() {
                fetchUnreadNotificationsCount()
            }, 1000);

            setInterval(function() {
                fetchNotifications()
            }, 1000);

            setInterval(function() {
                fetchTableOccupancy()
            }, 1000);

            $("#navbarDropdownMenuLink").on("click", function() {
                $.ajax({
                    //show all the Notifications
                    //the first one will be highlighted
                    url: "readNotifications.php",
                    success: function() {
                        console.log('Update Success');
                    }
                });
            });


        });
    </script>


</head>



<?php
//retrieve the table number from url variable
echo "Table Number: ";
$tableNumber = htmlspecialchars($_GET["TableNumber"]);
if (isset($_GET["TableNumber"])) {
    echo $tableNumber;
    echo $_SESSION['customer type'];
    // echo "isset";
}

// $_SESSION['table number'] = $tableNumber;
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MIYA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notifications (<span id="unreadNotification"></span>)
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="allNotifications">
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!--table 2-->

    <h1>Welcome to MIYA Admin Dashboard</h1>
    <button class="tables" id = "table1">
        <a href="adminDashboard.php?TableNumber=1">Table 1</a>
    </button>

    <!--table 2-->
    <button class="tables" id = "table2">
        <a href="adminDashboard.php?TableNumber=2">Table 2</a>
    </button>

    <!--table 2-->
    <button class="tables" id = "table3">
        <a href="adminDashboard.php?TableNumber=3">Table 3</a>

    </button>

    <!--table 2-->
    <button class="tables" id = "table4">
        <a href="adminDashboard.php?TableNumber=4">Table 4</a>

    </button>

    <!--table 2-->
    <button class="tables" id = "table5">
        <a href="adminDashboard.php?TableNumber=5">Table 5</a>

    </button>

    <!--table 2-->
    <button class="tables" id = "table6">
        <a href="adminDashboard.php?TableNumber=6">Table 6</a>

    </button>

    <!--table 2-->

    <button class="tables" id = "table7">
        <a href="adminDashboard.php?TableNumber=7">Table 7</a>

    </button>

    <!--table 2-->

    <button class="tables" id = "table8">
        <a href="adminDashboard.php?TableNumber=8">Table 8</a>

    </button>

    <!--table 2-->

    <button class="tables" id = "table9">
        <a href="adminDashboard.php?TableNumber=9">Table 9</a>

    </button>

    <!--table 2-->

    <button class="tables" id = "table10">
        <a href="adminDashboard.php?TableNumber=10">Table 10</a>
    </button>

    <div id = "tableOccupancy"></div>

    <h3 id = "occupied">Red = "Occupied Table"</h3>
    <h3 id = "unoccupied">Green = "Unoccupied Table"</h3>

</body>

</html>