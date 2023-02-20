<?php
// require "includes/config.php";
include 'includes/readTablesMethods.inc.php';
session_start();
// echo "This is admin side";
// echo $_SESSION['customer type'];



if ($_SESSION['customer type'] == 'admin') {
    //retrieve the tables
    $sql = "SELECT * FROM `table occupancy` WHERE `occupancy status` = ?";
    $rows = getRows($sql, array('checked in'));
    echo "Currently occupied tables:";
    foreach ($rows as $table) {
        // echo $table["table number"];
        $id = 'table' . $table["table number"];
        if ($table['occupancy status'] == 'checked in') {
            echo $id;
?>
            <script>
                document.getElementById('<?php echo $id ?>').style.backgroundColor = "#FF0000";
            </script>

        <?php
        } else if ($table['occupancy status'] == 'checked out') {
        ?>
            <script>
                document.getElementById('<?php echo $id ?>').style.backgroundColor = lightgreen;
            </script>
        <?php
        } else {
        ?>
            <script>
                document.getElementById('<?php echo $id ?>').style.backgroundColor = lightgreen;
            </script>
<?php
        }
    }
}
