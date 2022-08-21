<?php

include 'includes/autoloader.inc.php';
include 'includes/sessionMethods.inc.php';
include 'C:\xampp\htdocs\MIYA - OOP\includes\readTablesMethods.inc.php';

session_start();

echo $_SESSION['userName'];

// Check if the user is logged in, if not then redirect him to landing paget
if (!isset($_SESSION['logged in']) || $_SESSION['logged in'] != true) {
    header("location:../index.php?error=notloggedIn");
    exit;
}


//initialize variables
// $tableNumber = $tableOccupancyId = '';
// $tableError = '';
// $tableSuccess = '';
// $tableOccupancy = 'checked in';


// if(isset($_COOKIE['username']))
// {
//     //This will be controlled by user attempt to leave modal form - like are you sure you want to leave
//     //Any unsaved changes will be lost - yes or no like this 
//     //if yes => the cookie for logged in will be changed to false
//     //customer has quit browsing
//     //search in individual visits
    

// }


//Table Number error handlers
//is it empty?
if (isset($_POST['submitTable'])) {
    $tableNumber = $_POST['tableNumber'];

    echo $tableNumber;

    $tableContr = new TableContr($tableNumber, $tableOccupancy);
    //if table is already checked in
    if ($tableContr->isTableCheckedIn() == 1) {
        echo "table is already checked in";
        $tableOccupancyId = $tableContr->findTblOccupancyID();
        setTableNumber($tableNumber);
        echo $_SESSION["tableNumber"];
        setTableOccupied($tableOccupancy);
        echo $_SESSION["tableOccupancy"];
        $tableOccupancyId = $tableContr->findTblOccupancyID();
        setTableOccupancyId($tableOccupancyId);
        echo $_SESSION["tableOccupancyId"];
        // header("refresh:5;url=enterTable.php");

        //check if this particular user is signed in with this table id - using cookies
    }

    //if table is open or not checked in yet
    else {
        // echo "table is open";

        //add this table to table occupancy table
        $tableContr->insertOccupiedTable();
        setTableNumber($tableNumber);
        echo $_SESSION["tableNumber"];
        setTableOccupied($tableOccupancy);
        echo $_SESSION["tableOccupancy"];
        $tableOccupancyId = $tableContr->findTblOccupancyID();
        setTableOccupancyId($tableOccupancyId);
        echo $_SESSION["tableOccupancyId"];


        //set this particular user as the main customer


        //
    }
}

if (isset($_POST['checkMenu'])) {
    header("refresh:1;url=browseMenu2.php");
}


else if(isset($_POST['']))

//have to check if the table is already occupied
//If yes,
//The new customer is a guest

//If no,
//The new customer is a customer

//have to check if the customer is already signed in with cookies
//if yes,
//retrieve from database and store them in session variables

//header to browse menus page
//show a modal or pop up page to inform guests that they can add guests individually

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/testStyle.css">
    <title>Document</title>
    <style>
        <?php
        //for the form error handling
        if ($tableError != null) {
        ?>.table-error {
            display: block;
        }

        <?php
        } elseif ($tableSuccess != null) {
        ?>.table-success {
            display: block;
        }

        <?php
        }
        ?>?>
    </style>
</head>

<body>

    <h1>Welcome to MIYA, <?php echo $_SESSION['userName'] ?></h2>
        <h2>You are logged in</h2>

        <!--Enter Table Number-->

        <h1>Enter Table Number</h1>
        <div>
            <!--Submit Table Number-->
            <form action="" method="post">
                <select type="text" name="tableNumber" placeholder="State(Optional)" value=<?php echo $state ?>>
                    <option value="">--- Choose Table ---</option>
                    <?php
                    $fieldType = 'option';
                    $tableName = 'tables';
                    $column = 'table number';
                    $name = 'tableNumber';
                    readRefTable($fieldType, $tableName, $column, $name);
                    ?>
                </select>
                <p class="error table-error">
                    <?php echo $tableError ?>
                </p>
                <p class="success table-success">
                    <?php echo $tableSuccess ?>
                </p>
                <br>
                <input type="submit" id = "myBtn" name="submitTable" value= "Submit Table Number">
                <input type="submit" name="checkMenu" value= "Skip to browse menu">
            </form>

            <!--Skip to browse menu-->

            <br>
        </div>

        <!--Modal Content-->
        <div class="modal" id="myModal">
            <div class = "modal-content">
                <span class="close">&times;</span>
                <form id="addCustomerForm" action = "addMembers.php" method = "post">
                    <p>ARE YOU ORDERING FOR SOMEONE ELSE?</p>
                    <input class="button modal-button" type="submit" value="YES">
                    <input class="button modal-button" type="submit" value="NO">
                </form>
            </div>

        </div>

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>



</body>

</html>