<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIYA - Add Individuals</title>
</head>

<?php

//should add that this add individuals feature is only available for master

include 'includes/autoloader.inc.php';
include 'includes/sessionMethods.inc.php';
include 'includes/readTablesMethods.inc.php';


session_start();

// Check if the user is logged in, if not then redirect him to landing paget
if (!isset($_SESSION['logged in']) || $_SESSION['logged in'] != true) {
    header("location:../index.php?error=notloggedIn");
    exit;
}


// var_dump($_SESSION['subCustomers']);
$subCustomersInput = array();
$subCustomer = array("main visit id" => null, "sub customer id" => null, "name" => null);
$individualVisitId = $_SESSION['individual visit id'];

// var_dump($_SESSION);
if(isset($_SESSION['subCustomers']))
{
    echo "existing sub customers";
    var_dump($_SESSION['subCustomers']);
    $subCustomersList = $_SESSION['subCustomers'];
    var_dump($subCustomersList);

}

else{
    echo "Sub customer session variables has not been set";
    $_SESSION["subCustomers"] = array();
    $subCustomersList = array();

    var_dump($subCustomersList);
    $_SESSION["subCustomers"] = $subCustomersList;
}

if(isset($_POST['submitCustomers']))
{
    var_dump($_POST['input']);
    $subCustomersInput = $_POST['input'];
    //ensure the inputs are not empty
    foreach ($subCustomersInput as $input)
    {
        if($input)
        {
            // array_push($subCustomersInput, $input);   
            // print_r($subCustomersInput);
            echo "The inputs: ";
            echo $input;
            //check if the sub customer is already in the database
                
                // $sql = "SELECT * FROM `individual visits` WHERE `individual visit id` = ? LIMIT 1";
                // $result1 = executeSql($sql, array($_COOKIE["individualVisitId"]));
                $sql1 = "SELECT * from `sub customers` WHERE `main visit id` = ? AND `name` = ?";
                $result1 = executeSql($sql1, array($_SESSION['individual visit id'], $input));
                echo "<br>";
                echo "Rows found:". count($result1);
                echo "<br>";
                //if yes
                    //do nothing
                if(count($result1) == 1)
                {
                    echo "sub customer already exists";
                }
                //if no
                    //insert into 
                else
                {
                    echo "sub customer does not exist";
                    echo "<br>";
                    $sql1 = "INSERT INTO `sub customers`(`main visit id`, `name`, `table occupancy id`) values (?,?,?)";
                    insertSql($sql1, array($_SESSION['individual visit id'], $input, $_SESSION['table occupancy id']));
                    echo "<br>";
                    $sql2 = "SELECT * FROM `sub customers` ORDER BY `sub customer id` DESC LIMIT 1";
                    $lastInsertedRow = getRows($sql2, null)[0];
                    
                    echo "Last inserted row";
                    var_dump($lastInsertedRow);

                    $subCustomer = array("main visit id" => $lastInsertedRow["main visit id"], "sub customer id" => $lastInsertedRow["sub customer id"], "name" => $lastInsertedRow["name"]);
                    echo "<br>";
                    echo "Recently added sub customer";
                    echo "<br>";
                    echo "New Sub Customer";
                    var_dump($subCustomer);
                    echo "Sub Customers List";
                    var_dump($subCustomersList);
                    array_push($subCustomersList, $subCustomer);
                    echo "br>";
                    echo "Updated sub customers list";
                    var_dump($subCustomersList);

                }
        }

        else 
        {
            //do nothing
            echo "Input does not exist";
        }
    }

    echo "Sub Customers under ". $_SESSION['userName']. 'are';
    var_dump($_SESSION['subCustomers']);

    // header("refresh:3;url=browseMenu2.php");
}


?>
<body>
    <header>
        <h1>ADD INDIVIDUAL(s)</h1>
        <h2>You can place orders for guests listed</h2>
    </header>

    <div>
        <form method = "post" action = "" id = "addIndividuals">
            <input id = "input-1" type = "text" placeholder="Name" name = "input[]" >
            <br>
            <button type= "submit" id = "myBtn" name="submitCustomers">Submit</button>
        </form>
        <button onclick="addInputBox()">Add More Guest</button>
        
        <!--Create more input elements-->
        <script>
            var counter = 1;
            function addInputBox()
            {
                //create new form element
                // console.log("Input");
                counter++;
                var br = document.createElement("br");
                var form = document.getElementById('addIndividuals');
                var input = document.createElement("input");
                var button = document.getElementById("myBtn");
                input.id = 'input-' + counter;
                input.type = 'text';
                input.name = 'input[]';
                input.placeholder = 'Name';
                form.insertBefore(input, button);
                form.insertBefore(br, button);
            }
        </script>
    </div>
</body>
</html>