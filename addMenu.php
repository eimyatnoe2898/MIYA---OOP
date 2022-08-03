<?php

include 'C:\xampp\htdocs\MIYA - OOP\includes\readTablesMethods.inc.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIYA - Add Menus</title>
</head>

<body>
    <a href="browseMenu2.php">Browse More Menus</a>

    <!--form for adding menu-->
    <form id="order_form" method="post" action="">
        <?php
        //order by order id desc limit 1 
        $sql = "SELECT * from `order records` ORDER BY ``";
        // get the row id => set it as the last order id
        $addedItem = null;
        $flavorExists = false;
        $type = htmlspecialchars($_GET["Type"]);
        if ($type == 'food') {
            $menuID = htmlspecialchars($_GET["MenuID"]);
            $meal = htmlspecialchars($_GET["Meal"]);
            $menuName = htmlspecialchars($_GET["Name"]);
            $price = htmlspecialchars($_GET["Price"]);

            $sql = "SELECT * FROM `food menus` WHERE `menubook id` = ? AND `meal` = ? AND `name` = ? AND `price` = ? ";
            $result = executeSql($sql, array($menuID, $meal, $menuName, $price));
            // var_dump($result);
            if (count($result) == 1) {
                // foreach ($result as $row) {

                $addedItem = array(
                    "type" => $type,
                    "food order id" => null,
                    "id" => $result[0]['menubook id'],
                    "meal" => $result[0]['meal'],
                    "main category" => $result[0]['main category'],
                    "sub category" => $result[0]['sub category'],
                    "name" => $result[0]['name'],
                    "rawmeat?" => intval($result[0]['raw meat?']),
                    "price" => intval($result[0]['price']),
                    "amount" => null,
                    "totalPrice" => null,
                    "notes" => $result[0]['notes'],
                    "customerNotes" => null,
                    "to go?" => 0,
                    "order status" => "not added"
                );
        ?>

                <h1><?php echo $addedItem['main category'] ?></h1>
                <h3><?php echo $addedItem['name'] ?> <span><?php echo $addedItem['price'] ?></span></h3>
                <h4><?php echo $addedItem['rawmeat?'] ?> </h4>
                <h5><?php echo $addedItem['notes'] ?></h5>

            <?php
                // }
            }
        } else if ($type == 'drink') {
            $category = htmlspecialchars($_GET["MainCategory"]);
            $menuName = htmlspecialchars($_GET["Name"]);
            $size = htmlspecialchars($_GET["Size"]);

            $sql = "SELECT * FROM `drink menus` WHERE `name` = ? and `size` =  ?";
            $result = executeSql($sql, array($menuName, $size));
            // var_dump($result);
            if (count($result) == 1) {
                // foreach ($result as $row) {
                $addedItem = array(
                    "type" => $type,
                    "drink order id" => null,
                    "main category" => $result[0]['main category'],
                    "sub category" => $result[0]['sub category'],
                    "name" => $result[0]['name'],
                    "refill?" => intval($result[0]['refill?']),
                    "flavor" => null,
                    "size" => $result[0]['size'],
                    "price" => intval($result[0]['price']),
                    "notes" => $result[0]['notes'],
                    "amount" => null,
                    "totalPrice" => null,
                    "notes" => null,
                    "customerNotes" => null,
                    "to go?" => 0,
                    "order status" => "not added"
                );
            ?>
                <h1><?php echo $addedItem['main category'] ?></h1>
                <h3><?php echo $addedItem['name'] ?> <span><?php echo $addedItem['size'] ?> </span><span><?php echo $addedItem['price'] ?></span></h3>
                <h4><?php echo $addedItem['refill?'] ?> </h4>
                <h5><?php echo $addedItem['notes'] ?></h5>

            <?php
                // }
            }

            //find out if there are other flavors
            $sql = "SELECT * from `drink flavors/types` WHERE `name` = ?";
            $flavors = executeSql($sql, array($menuName));
            if (count($flavors) >= 1) {
                $flavorExists = true;

            ?>
                <select type="text" name="flavor">
                    <option value="">--- Choose flavor ---</option>
                    <?php
                    $fieldType = 'option';
                    $tableName = 'drink flavors/types';
                    $column = 'flavors/types';
                    $name = 'flavor';
                    readRefTable($fieldType, $tableName, $column, $name);
                    ?>
                </select>
                <br>

        <?php

            }
        }

        ?>
        <textarea rows="4" cols="50" name="notes">Notes</textarea>
        <br>
        <input type="number" value=1 min=1 max=10 name="amount">
        <br>
        <label for="togo">To go?</label>
        <input type="checkbox" id="togo" name="togo" value="1">
        <br>
        <input type="submit" value="Add to Order" name="addMenu">
        <br>
    </form>

    <?php

    if (isset($_POST["addMenu"])) {
        //retrieve the posted form values
        // $addedItem["order status"] = "added";
        if (isset($_SESSION["cart"])) {
            $countOfCart = count($_SESSION["cart"]);
            if ($flavorExists == true) {
                $addedItem["flavor"] = $_POST['flavor'];
            }
            $addedItem["amount"] = intval($_POST["amount"]);
            $addedItem["customerNotes"] = $_POST["notes"];
            if(isset($_POST['togo']))
            {
                $addedItem["to go?"] = intval($_POST['togo']);
            }
            $addedItem["totalAmount"] = $_POST["amount"] * $addedItem["price"];
            $addedItem["order status"] = "added";
            $_SESSION["cart"][$countOfCart] = $addedItem;
        } else if (!isset($_SESSION["cart"])) {
            //create the cart with zero index
            if ($flavorExists == true) {
                $addedItem["flavor"] = $_POST['flavor'];
            }
            $addedItem["amount"] = $_POST["amount"];
            $addedItem["totalAmount"] = $_POST["amount"] * $addedItem["price"];
            $addedItem["customerNotes"] = $_POST["notes"];
            $addedItem["to go?"] = intval($_POST['togo']);
            $addedItem["order status"] = "added";
            $_SESSION["cart"][0] = $addedItem;
        }

        //add the item to the order records
        

    ?>
        <script>
            window.alert('Item Added to Cart');
            // window.location.href = 'addMenu.php';
        </script>


    <?php

        echo "After Clicking";
        var_dump($_SESSION['cart']);
    }

    ?>


</body>

</html>