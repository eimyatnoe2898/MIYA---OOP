<?php

// include 'includes/functions.inc.php';
// include 'includes/readTablesMethods.inc.php';
//PDO wa
class Dbh
{
    private $serverName = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "Sql783knui1-1l;/klaa-9";
    private $dbName = "miya";

    //constructor


    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->serverName . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
        // $dsn = 'mysql:host='.$this->serverName.';dbname='.$this->dbName;
        // $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
        // //setting fetch mode
        // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // //setting error mode
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // return $pdo;
    }

    protected function checkUserExists($email, $password)
    {
        $error = "User is not registered yet";
        $success = "Signed in Successfully";


        try {
            $sql = "SELECT COUNT(*) from members WHERE `email` = ? AND `password` = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $password]);
            // echo $stmt;
            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
            return $e->getMessage() . " " . $error;
        }
    }

    protected function getUserName($email, $password)
    {
        $result = "";
        try {
            $sql = "SELECT * from members WHERE `email` = ? AND `password` = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $password]);
            // echo $stmt;
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $result = $row['first name'];
            }
            return $result;
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
            return $e->getMessage();
        }
    }

    protected function checkTableCheckedIn($tableNumber, $tableOccupancy)
    {
        $open = "Table is open";
        $close = "Table is closed";


        try {
            $sql = "SELECT COUNT(*) from `table occupancy` WHERE `table number` = ? AND `occupancy status` = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$tableNumber, $tableOccupancy]);
            // echo $stmt;
            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
            return $e->getMessage() . " " . $close;
        }
    }

    //general insertion function
    protected function insertToTable($sqlStmt, $bindValues)
    {
        try {
            $stmt = $this->connect()->prepare($sqlStmt);
            $stmt->execute($bindValues);
            echo "New record added successfully";

        } catch (PDOException $e) {
            echo "New record addition FAILED";
            echo $sqlStmt . $e->getMessage();
        }
    }


    //general select getters
    protected function getColumnValue($sqlStmt, $bindValues, $columnName)
    {
        $result = "";
        try {
            // $sql = "SELECT * from members WHERE `email` = ? AND `password` = ?";
            $stmt = $this->connect()->prepare($sqlStmt);
            $stmt->execute($bindValues);
            // echo $stmt;
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $result = $row[$columnName];
            }
            return $result;
        } catch (PDOException $e) {
            echo $sqlStmt . $e->getMessage();
            return $e->getMessage();
        }
    }

    protected function getColumns($sqlStmt, $bindValues, $columnName)
    {
        $result = "";
        try {
            // $sql = "SELECT * from members WHERE `email` = ? AND `password` = ?";
            $stmt = $this->connect()->prepare($sqlStmt);
            $stmt->execute($bindValues);
            // echo $stmt;
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $sqlStmt . $e->getMessage();
            return $e->getMessage();
        }
    }

    protected function insertMember($fName, $lName, $email, $pwd, $bd, $city, $state, $phNo)
    {
        $error = "User is not registered yet";
        $userExistsSuccess = "Signed in Successfully";
        try {
            // $sql = 'INSERT INTO `members` (`name`)
            // values ?';
            $sql = 'INSERT INTO `members` (`first name`, `last name`, `email`, `password`, `birthday`, `city`, `state`, `phone number`) values (?,?,?,?,?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fName, $lName, $email, $pwd, $bd, $city, $state, $phNo]);
            echo "New record added to <h3>Members</h3> successfully";
            // setName($fName);
            // setLoggedIn(true);
        } catch (PDOException $e) {
            echo "New record addition to <h3>Members</h3> FAILED";
            echo $sql . $e->getMessage();
        }
    }

    protected function insertGuest($name)
    {
        $error = "User is not registered yet";
        $userExistsSuccess = "Signed in Successfully";
        try {
            $sql = 'INSERT INTO `guest_customers` (`name`)
            values ?';
            $stmt = $this->connect()->prepare($sql);
            //first ? is the array[0] in execute method aka chronological
            $stmt->execute([]);
            echo "New record added to <h3>Guest Customers</h3> successfully";
        } catch (PDOException $e) {
            echo "New record addition to <h3>Guest Customers</h3> FAILED";
            echo $sql . $e->getMessage();
        }
    }

    protected function selectRecords()
    {
    }

    protected function addToCustomerHistory()
    {
        $error = "User is not registered";
        $sql = "INSERT INTO `individual visits` values ?,?,?";
    }


}
