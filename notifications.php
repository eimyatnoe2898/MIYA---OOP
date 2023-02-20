<?php
include 'includes/readTablesMethods.inc.php';

?>


<!DOCTYPE html>
<html>

<head>
    <title>MIYA Notifications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            function fetchUnreadNotificationsCount()
            {
                $.ajax({
                    url: "fetchUnreadNotifications.php",
                    method : "POST",
                    success: function(data)
                    {
                        $("#unreadNotification").html(data);
                        console.log('Return count of unread notifications');
                    }
                })
            }

            function fetchNotifications()
            {
                $.ajax({
                    url: "fetchNotifications.php",
                    method : "POST",
                    success: function(data)
                    {
                        $("#allNotifications").html(data);
                        console.log('Return all notifications');
                    }
                })
            }



            setInterval(function()
            {
                fetchUnreadNotificationsCount()
            }, 1000);

            setInterval(function()
            {
                fetchNotifications()
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

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MIYA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse Menus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Check Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add Friends</a>
                </li>
                <li class="nav-item dropdown">
                    <?php

                    // $unreadSql = "SELECT COUNT(*) FROM `notifications` WHERE `status` = ?";
                    // $unreadRows = getCount($unreadSql, array(0));

                    ?>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notifications (<span id="unreadNotification"></span>)
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id = "allNotifications">
                        
                        <!-- <a class="dropdown-item" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt deserunt tenetur aut aspernatur ab inventore deleniti nemo error libero eligendi!</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptatum a id laudantium itaque dignissimos. Ea atque dolorum culpa reiciendis?</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium tempore nemo, expedita sequi et earum maiores error officiis omnis recusandae.</a> -->
                    </div>
                </li>
            </ul>
        </div>
    </nav>


</body>

</html>