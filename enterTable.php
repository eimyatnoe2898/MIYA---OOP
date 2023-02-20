<?php

// include 'includes/autoloader.inc.php';
include 'includes/sessionMethods.inc.php';
include 'includes/readTablesMethods.inc.php';

// require_once 'notifications.php';
session_start();

echo $_SESSION['userName'];
echo "<br>";
echo $_SESSION['individual visit id'];

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

    <?php
    if (isset($_POST['submitTable'])) {
        $tableNumber = $_POST['tableNumber'];
        echo "table number:" .  $tableNumber;
        echo $_SESSION['customer type'];
        echo "<br>";
        // $tableContr = new TableContr($tableNumber, $tableOccupancy);
        //if table is already checked in
        $sql = "SELECT * FROM `table occupancy` WHERE `table number` = ? and `occupancy status` = ?";
        $result = executeSql($sql, array($tableNumber, 'checked in'));
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

            echo "Customer type";
            echo $_SESSION['customer type'];

            echo $_SESSION['table number'];
            echo "<br>";

            echo $_SESSION['table occupancy id'];
            echo "<br>";

            echo $_SESSION['individual visit id'];
            echo "<br>";

            //add to notifications
            // $sql2 = "INSERT INTO `notifications`(`for`, `category`, `table occupancy id`, `individual visit id`, `content`)
            // values (?,?,?,?,?)";
            $content = $_SESSION['userName']. ' has checked in to table '. $_SESSION['table number'];
            $sql1 = "INSERT INTO `notifications`(`for`, `category`, `table occupancy id`, `individual visit id`, `content`) VALUES(?,?,?,?, ?)";
            $result1 = insertSql($sql1, array('admin', 'check-in', $_SESSION['table occupancy id'], $_SESSION['individual visit id'], $content));
            $result2 = insertSql($sql1, array('master', 'check-in', $_SESSION['table occupancy id'], $_SESSION['individual visit id'], $content));

        } else if (count($result) == 0) {
            echo "This is the first customer to this table";
            echo "<br>";

            //set the customer type as master
            $_SESSION['customer type'] = 'master';
            //update the master in individual visits
            $sql1 = "UPDATE `individual visits` SET `customer type` = ? WHERE `individual visit id` = ?";
            $result1 = updateSql($sql1, array($_SESSION['customer type'], $_SESSION['individual visit id']));
            echo "Customer Update Success?" . $result1 . "row updated successfully";
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
            $content = $_SESSION['userName']. ' has checked in to table '. $_SESSION['table number'];
            $sql1 = "INSERT INTO `notifications`(`for`, `category`, `table occupancy id`, `individual visit id`, `content`) VALUES(?,?,?,?, ?)";
            $result1 = insertSql($sql1, array('admin', 'check-in', $_SESSION['table occupancy id'], $_SESSION['individual visit id'], $content));
            $result2 = insertSql($sql1, array('master', 'check-in', $_SESSION['table occupancy id'], $_SESSION['individual visit id'], $content));

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
        echo "Table occupancy id Update Success?" . $result1 . "row updated successfully";
        echo "<br>";

        //show Pop up box
        //direct to menu page
        // header("refresh:3;url=browseMenu2.php");
        //change browseMenu2 with the order buttons

        //if enter table form is submitted
        // if (isset($_POST['submitTable'])) {
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
        // header('addIndividuals.php');


    }

    if (isset($_POST['checkMenu'])) {
        echo "submit table";
        header("browseMenu2.php");
    }

    ?>
</head>

<body>

    <h1>Welcome to MIYA, <?php echo $_SESSION['userName'] ?></h2>
        <h2>You are logged in</h2>
        <!--Enter Table Number-->
        <h1>Enter Table Number</h1>
        <div>
            <!--Submit Table Number-->
            <form action="" method="post" id="enterTable">
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
            </form>

            <form action="" method="post" id="enterTable">
                <input type="submit" name="checkMenu" value="Skip to browse menu">
            </form>

            <!--Skip to browse menu-->
            <br>
        </div>

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