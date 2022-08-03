<?php

include 'includes/autoloader.inc.php';
// include 'includes/formErrorHandlers.inc.php';

$db1 = new Dbh();
$login1 = new Login();
$signUp1 = new SignUpContr('Park', 'Jieun', 'jieun@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS', '1980-02-03', 'Seoul');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Form 1</h1>
    <?php
    echo "Hello";
    $tableNumber = 1;
    $tableContr = new TableContr($tableNumber);
    echo $tableContr->printTable();

    ?>
    <form>
        <select>
            <option value="">--- Select State---</option>
            <?php

            // $fieldType = 'option';
            // $tableName = 'states';
            // $column = 'code';
            // $signUp1->makeStatesList($fieldType, $tableName, $column);
            ?>
        </select>
        <br>
        <input type="text">
    </form>
</body>

</html>
<?php
// $db1->readRefTable($fieldType, $tableName, $column);

$logincontr1 = new LoginContr('igggy@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS');
$signUp1 = new SignUpContr('Park', 'Jieun', 'jieun@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS', '1980-02-03', 'Seoul');

// echo $signUp1->checkEmptyInput("state");
// echo $signUp1->checkvalidName("firstName");
// echo "Checking Valid Name";
// // echo checkvalidString("Park");
// if($signUp1->checkvalidFname() == false)
// {
    
//     echo "Invalid Name!";
// }

// else
// {
//     echo "Valid Name!";
// }

// echo "<br>";
// echo "Checking Empty Input";
// if( $signUp1->checkEmptyInput("email") == false)
// {
//     echo "Empty Input!";
// }

// else
// {
//     echo "Valid Input!";
// }
// echo $db1->getUserName('igggy@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS');
// echo $login1->getCustomerName('igggy@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS');
// echo $logincontr1->getName();

// echo $db1->checkUserExists('igggy@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS');
// echo $login1->checkUser('igggy@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS' );
// echo $logincontr1->checkUserMember();
// try{
//     $sql = "SELECT COUNT(*) from members WHERE `email` = ? AND `password` = ?";
//     $stmt = $db1->connect()->prepare($sql);
//     $stmt->execute(['igggy@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS']);
//     // echo $stmt;
//     $result = $stmt->fetchColumn();
//     if($result == 1)
//     {
//         echo $result. ' row(s) found';

//     }

//     else
//     {
//         echo "User not found";
//     }
//     // echo $result[0][0]. ' row(s) found';
//     // print_r($result);
// }
// catch(PDOException $e)
// {
//     echo $sql. $e->getMessage();
//     return $e->getMessage()." ". $error;
// }