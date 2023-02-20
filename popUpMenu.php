<?php

include 'includes/autoloader.inc.php';
include 'includes/sessionMethods.inc.php';
include 'includes/readTablesMethods.inc.php';

// require_once 'notifications.php';
session_start();

// Check if the user is logged in, if not then redirect him to landing paget
if (!isset($_SESSION['logged in']) || $_SESSION['logged in'] != true) {
    header("location:../index.php?error=notloggedIn");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/testStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>

    <?php
    //if enter table form is submitted
    if (isset($_POST['submitTable'])) {
        echo $_SESSION['userName'];
        echo "<br>";
        //show modal pop up form
        echo "<script>
            $( document ).ready(function() {
            $('#myModal').modal('show'); 
            e.preventDefault();
            });
        </script>";
        //we don't need this header because I already disabled the data-backdrop and 
        header('addIndividuals.php');
    }

    ?>
</head>

<body>
    <!--Form to enter table number-->
    <form class="form-inline" id="myForm" method="post" action="">
        <input type="submit" class="btn btn-primary" id="myBtn" name="submitTable">
    </form>

    <!--Modal form to check if user wants to order for their friends-->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add friends?</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="" id="addFriends">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Would you like to order for your friends?</label>
                        </div>
                        <button type="submit" class="btn btn-dark" id="addFriends">Yes</button>
                        <button type="button" class="btn btn-light" id="addNoone">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<!--Javascript for adding individuals asking pop up form-->
<script>
    //To direct to add individuals page if user wants to add friends
    $(document).ready(function() {
        $('#myModal').on('submit', function(e) {
            window.location.href = 'addIndividuals.php';
            e.preventDefault();
        });
    });


    //To direct to browsing menu page if user does not want to add friends
    $(document).ready(function() {
        $('#addNoone').on('click', function(e) {
            window.location.href = 'browseMenu2.php';
            e.preventDefault();
        });

    });
</script>

</html>