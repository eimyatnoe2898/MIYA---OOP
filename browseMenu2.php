<?php

// include 'includes/autoloader.inc.php';
// // include 'MIYA-OOP/includes/functions.inc.php';
// include 'includes/sessionMethods.inc.php';
// include 'includes/readTablesMethods.inc.php';

session_start();
require_once 'notifications.php';

include_once 'C:\xampp\htdocs\MIYA - OOP\includes\readTablesMethods.inc.php';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Browse Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/browseMenu2.css">
    <script>
        function showMenus() {
            alert('this works');
            //Show only lunch or lunch/dinner class dom elements
            //to do this add the class when we read the data from db

        }
    </script>

<body>
    <h1>Welcome to MIYA, <?php echo $_SESSION['userName'] ?></h2>
        <h2>You are logged in</h2>
        <h1>Browse Menus here</h1>
        <?php

        // $sql = "SELECT * FROM `food menus` WHERE `meal`='Lunch'";
        // $values = array();
        // $result1 = executeSql($sql, $values);
        // var_dump($result1);
        ?>
        <!--Dropdown for Lunch and Lunch/Dinner Menus-->

        <div data-spy="scroll" data-target=".navbar" data-offset="50">


            <nav class="navbar navbar-expand-sm bg-light">

                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a> -->

                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Choose Meal
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onclick=showMenus()>Show All</a>
                            <?php
                            $result = readRefTableArr('meals');

                            foreach ($result as $row) {
                            ?>
                                <a class="dropdown-item" href="#" onclick=showMenus()><?php echo $row['meal'] ?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </li>

                    <?php
                    $foodCategory = array();
                    $drinkCategory = array();
                    $sql = "SELECT DISTINCT `main category` from `food menus` ";
                    $result = executeSql($sql, array());
                    foreach ($result as $row) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php echo $row['main category'] ?></a>
                        </li>
                        <?php array_push($foodCategory, $row['main category']); ?>
                    <?php
                    }

                    $sql = "SELECT DISTINCT `main category` from `drink menus`";
                    $result = executeSql($sql, array());
                    foreach ($result as $row) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php echo $row['main category']; ?></a>
                            <?php array_push($drinkCategory, $row['main category']); ?>
                        </li>
                    <?php
                    }

                    ?>
                </ul>

            </nav>
            <?php
            // var_dump($foodCategory);
            ?>
            <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                <?php

                //read the food categories
                foreach ($foodCategory as $category) {
                ?>
                    <div class="category">
                        <h2><?php echo $category ?></h3>
                    </div>
                    <?php
                    // $sql = "SELECT column_name(s)
                    // FROM table1
                    // FULL OUTER JOIN table2
                    // ON table1.column_name = table2.column_name
                    // WHERE condition";
                    // $sql = "SELECT * from `food menus` inner join `main category` where `food menus`.`main category` = `main category`.`main category` AND `food menus`.`main category` = '$category'
                    // ";
                    $sql = "SELECT * from `food menus` WHERE `main category` = '$category'";
                    $result = executeSql($sql, array());
                    foreach ($result as $row) {
                        if ($row['meal'] == 'Lunch') {

                    ?>

                            <div class="items lunch">
                                <h4 id="<?php $row['name'] ?>"><span><?php echo $row['menubook id'] . "." ?> </span><?php echo $row['name'] ?></h4>
                                <p><?php echo $row['price'] ?></p>
                                <p><?php echo $row['notes'] ?></p>
                            </div>

                        <?php

                        } else if ($row['meal'] == 'Lunch/Dinner') {
                        ?>

                            <div class="items lunch/dinner">
                                <h4 id="<?php $row['name'] ?>"><span><?php echo $row['menubook id'] . "." ?> <?php echo $row['name'] ?></h4>
                                <p><?php echo $row['price'] ?></p>
                                <p><?php echo $row['notes'] ?></p>
                            </div>

                        <?php
                        }
                        ?>
                        <form action="addMenu.php?MainCategory=<?php echo $category ?>&MenuID=<?php echo $row['menubook id'] ?>&Meal=<?php echo $row['meal'] ?>&Name=<?php echo $row['name'] ?>&Price=<?php echo $row['price'] ?>&Type=food" method="post">
                            <input type="submit" value="Add to Cart">
                        </form>
                    <?php
                    }
                    ?>
                    <hr class="rounded">
                <?php
                }

                //read the drink categories
                foreach ($drinkCategory as $category) {
                ?>
                    <div class="category">
                        <h2><?php echo $category ?></h3>
                    </div>
                    <?php
                    $sql = "SELECT * from `drink menus` WHERE `main category` = '$category'";
                    $result = executeSql($sql, array());
                    foreach ($result as $row) {

                    ?>
                        <div class="items drink">
                            <h4 id="<?php $row['name'] ?>"><?php echo $row['name'] ?></h4>
                            <p><?php echo $row['price'] ?></p>
                            <p><?php echo $row['size'] ?></p>
                            <p><?php echo $row['notes'] ?></p>
                        </div>
                        <form action="addMenu.php?MainCategory=<?php echo $category ?>&Name=<?php echo $row['name'] ?>&Size=<?php echo $row['size'] ?>&Type=drink" method="post">
                            <input type="submit" value="Add to Cart">
                        </form>
                    <?php
                    }
                    ?>
                    <hr class="rounded">

                <?php
                }
                ?>

            </div>
        </div>
        <?php


        ?>


</body>

</html>