<?php

include 'includes/autoloader.inc.php';
include 'includes/sessionMethods.inc.php';
include 'includes/readTablesMethods.inc.php';

// require_once 'notifications.php';
session_start();

echo $_SESSION['userName'];
echo "<br>";

// Check if the user is logged in, if not then redirect him to landing paget
if (!isset($_SESSION['logged in']) || $_SESSION['logged in'] != true) {
    header("location:../index.php?error=notloggedIn");
    exit;
}

//initialize variables
$tableNumber = $tableOccupancyId = '';
$tableError = '';
$tableSuccess = '';
$tableOccupancy = 'checked in';
$content = null;


//leave the page thingy
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
    echo "table number:".  $tableNumber;
    echo "<br>";
    // $tableContr = new TableContr($tableNumber, $tableOccupancy);
    //if table is already checked in
    $sql = "SELECT * FROM `table occupancy` WHERE `table number` = ? and `occupancy status` = ?";
    $result = executeSql($sql, array($tableNumber,'checked in'));
    echo "Result Array: ";
    var_dump($result);
    echo "<br>";
    if (count($result) == 1) {
        echo "This is not first customer to this table";
        echo "<br>";
        $foundTableOccupancy = $result[0];
        echo "Found Table Occupancy";
        echo "<br>";
        var_dump($foundTableOccupancy);
        //get the row
        //store in session variables
        $_SESSION['table number'] = $foundTableOccupancy['table number'];
        $_SESSION['table occupancy id'] = $foundTableOccupancy['table occupancy id'];
        $_SESSION['table occupancy status'] = $foundTableOccupancy['occupancy status'];
        $_SESSION['table checked in at'] = $foundTableOccupancy['checked in at'];
        $_SESSION['table checked out at'] = $foundTableOccupancy['checked out at'];

        echo "SESSION VARIABLES";
        echo "<br>";

        echo $_SESSION['table number'];
        echo "<br>";

        echo $_SESSION['table occupancy id'];
        echo "<br>";

        echo $_SESSION['individual visit id'];
        echo "<br>";

        //add to notifications
        // $sql2 = "INSERT INTO `notifications`(`for`, `category`, `table occupancy id`, `individual visit id`, `content`)
        // values (?,?,?,?,?)";
        // $for = 'master, admin';

    } else if (count($result) == 0) {
        echo "This is the first customer to this table";
        echo "<br>";

        //set the customer type as master
        $_SESSION['customer type'] = 'master';
        //update the master in individual visits
        $sql1 = "UPDATE `individual visits` SET `customer type` = ? WHERE `individual visit id` = ?";
        $result1 = updateSql($sql1, array($_SESSION['customer type'], $_SESSION['individual visit id']));
        echo "Customer Update Success?" . $result1 ."row updated successfully";
        echo "<br>";

        //insert into table occupancy with occupancy status - checked in
        $sql3 = "INSERT INTO `table occupancy`(`table number`, `occupancy status`) values (?,?)";
        insertSql($sql3, array($tableNumber, 'checked in'));


        //get the last inserted row
        echo "Last Inserted Row";
        echo "<br>";

        $sql = "SELECT * FROM `table occupancy` ORDER BY `table occupancy id` DESC LIMIT 1";
        $lastInsertedRow = getRows($sql, null)[0];
        var_dump($lastInsertedRow);
        echo "<br>";

        //store the variables in session variables
        $_SESSION['table number'] = $lastInsertedRow['table number'];
        $_SESSION['table occupancy id'] = $lastInsertedRow['table occupancy id'];
        $_SESSION['table occupancy status'] = $lastInsertedRow['occupancy status'];
        $_SESSION['table checked in at'] = $lastInsertedRow['checked in at'];
        $_SESSION['table checked out at'] = $lastInsertedRow['checked out at'];

        echo "SESSION VARIABLES";
        echo "<br>";

        echo $_SESSION['table number'];
        echo "<br>";

        echo $_SESSION['table occupancy id'];
        echo "<br>";

        echo $_SESSION['individual visit id'];
        echo "<br>";
        
        //add to notifications
        $content = "New Customer, " . $_SESSION['userName']. ", checked in to table(". $_SESSION['table number']. ')';
        $sql1 = "INSERT INTO `notifications`(`for`, `category`, `table occupancy id`, `individual visit id`, `content`) values (?,?,?,?,?,?)";
        $result = executeSql($sql1, array('master,admin,customer', 'check in', $_SESSION['individual visit id'], $content ));

    }

    echo "After searching and updating";
    echo "<br>";

    echo "SESSION VARIABLES";
    echo "<br>";

    echo $_SESSION['table number'];
    echo "<br>";

    echo $_SESSION['table occupancy id'];
    echo "<br>";

    echo $_SESSION['individual visit id'];
    echo "<br>";


    
    //update the individual visits table record for the table occupancy id
    $sql1 = "UPDATE `individual visits` SET `table occupancy id` = ? WHERE `individual visit id` = ?";
    $result1 = updateSql($sql1, array($_SESSION['table occupancy id'], $_SESSION['individual visit id']));
    echo "Table occupancy id Update Success?" . $result1. "row updated successfully";
    echo "<br>";

    //direct to menu page
    header("refresh:3;url=browseMenu2.php");

}

if (isset($_POST['checkMenu'])) {
    header("refresh:1;url=browseMenu2.php");


} else if (isset($_POST['']))

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
                <input type="submit" id="myBtn" name="submitTable" value="Submit Table Number">
                <input type="submit" name="checkMenu" value="Skip to browse menu">
            </form>

            <!--Skip to browse menu-->

            <br>
        </div>

        <!--Modal Content-->
        <div class="modal" id="myModal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form id="addCustomerForm" action="addMembers.php" method="post">
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