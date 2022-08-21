<?php

function connectDb()
{
    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "Sql783knui1-1l;/klaa-9";
    $dbName = "miya";

    try {
        $dsn = 'mysql:host=' . $serverName . ';dbname=' . $dbName;
        $pdo = new PDO($dsn, $dbUsername, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
}

function readRefTable($fieldType, $tableName, $columnName, $name)
{
    try {
        $sql = "SELECT * from `$tableName`";
        $stmt = connectDb()->prepare($sql);
        if ($stmt->execute()) {
            $stmt->execute();
            $result = $stmt->fetchAll();
            // print_r($result);

            // echo "<br>";
            // echo $row[$columnName];
            switch ($fieldType) {
                case 'option':
?>
                    <br>
                    <?php
                    foreach ($result as $row) {
                    ?>
                        <option name="<?php echo $name ?>" value="<?php echo $row[$columnName] ?>"><?php echo $row[$columnName] ?></option>
                    <?php

                    }

                    break;
                case 'checkbox':
                    foreach ($result as $row) {
                        $nameArr = $name . '[]';
                    ?>
                        <br>
                        <input type="checkbox" name="<?php echo $nameArr ?>" value="<?php echo $row[$columnName] ?>">
                        <label for="<?php echo $nameArr ?>"><?php echo $row[$columnName] ?></label>
                    <?php

                    }

                    break;
                case 'radio':
                    foreach ($result as $row) {
                    ?>

                        <br>
                        <input type="radio" name="<?php echo $name ?>" value="<?php echo $row[$columnName] ?>">
                        <label for="<?php echo $name ?>"><?php echo $row[$columnName] ?></label>
<?php

                    }
                    break;

                default:
                    echo "Invalid Input field";
            }
        }
    } catch (PDOException $e) {
        echo $e;
    }
}

function readRefTableArr($tableName)
{
    try 
    {
        $sql = "SELECT * from `$tableName`";
        $stmt = connectDb()->prepare($sql);
        if ($stmt->execute()) {
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        return $result;
    } 
    catch (PDOException $e) 
    {
        echo $e;
    }
}

function executeSql($sqlStmt, $bindValues)
{
    $result = "";
    try {
        // $sql = "SELECT * from members WHERE `email` = ? AND `password` = ?";
        $stmt = connectDb()->prepare($sqlStmt);
        $stmt->execute($bindValues);
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        echo $sqlStmt . $e->getMessage();
        return $e->getMessage();
    }
}

function updateSql($sqlStmt, $bindValues)
{
    $result = "";
    try {
        $stmt = connectDb()->prepare($sqlStmt);
        $stmt->execute($bindValues);
        $result = true;
        return $result;
    } catch (PDOException $e) {
        echo $sqlStmt . $e->getMessage();
        return $e->getMessage();
    }
}

function insertSql($sqlStmt, $bindValues)
{
    $result = "";
    try {
        $stmt = connectDb()->prepare($sqlStmt);
        $stmt->execute($bindValues);
        $result = "Data Addition successful";
        echo $result;
        return $result;
    } catch (PDOException $e) {
        echo $sqlStmt. $e->getMessage();
        return $e->getMessage();
    }
}

function getRows($sql, $values)
{
    try {
        $stmt = connectDb()->prepare($sql);
        $stmt->execute($values);
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        // echo $stmt . $e->getMessage();
        return $e->getMessage();
    }
}

function getCount($sql, $values)
{
    try {
        $stmt = connectDb()->prepare($sql);
        $stmt->execute($values);
        $result = $stmt->fetchColumn();
        return $result;
    } catch (PDOException $e) {
        // echo $stmt . $e->getMessage();
        return $e->getMessage();
    }
}

function getColumn($sql, $values, $columnName)
{
    try {
        $stmt = connectDb()->prepare($sql);
        $stmt->execute($values);
        $result = $stmt->fetchAll();
        return $result[0][$columnName];
    } catch (PDOException $e) {
        echo $stmt . $e->getMessage();
        return $e->getMessage();
    }
}
