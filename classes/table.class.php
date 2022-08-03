<?php



class Table extends Dbh
{
    private $tableNumber;
    private $tableOccupancyId;
    private $tableCapacity;
    private $occupancyStatus;
    private $checkInTime;
    private $checkOutTime;
    private $customers;  //A list of customers

    protected function __construct($tableNumber, $occupancyStatus)
    {
        $this->tableNumber = $tableNumber;
        $this->occupancyStatus = $occupancyStatus;
        // $this->tableCapacity = $tableNumber;
    }

    protected function print()
    {
        echo $this->tableNumber;
    }

    protected function setTableCapacity($tableCapacity)
    {
        $this->tableCapacity = $tableCapacity;
    }

    protected function setOccupacyStatus($occupancyStatus)
    {
        $this->occupancyStatus = $occupancyStatus;
    }

    protected function setcheckInTime($checkInTime)
    {
        $this->checkInTime = $checkInTime;
    }

    protected function setcheckOutTime($checkOutTime)
    {
        $this->checkOutTime = $checkOutTime;
    }

    protected function getTableNumber()
    {
        return $this->tableNumber;
    }

    protected function getOccupancyStatus()
    {
        return $this->occupancyStatus;
    }

    protected function checkTableOccupancy()
    {
        return $this->checkTableCheckedIn($this->tableNumber, $this->occupancyStatus);
    }

    protected function addNewTableOccupancy()
    {
        try
        {
            $sql = 'INSERT INTO `table occupancy` (`table number`, `occupancy status`) values (?,?)';
            $bindArr = [$this->tableNumber, $this->occupancyStatus];
            $this->insertToTable($sql, $bindArr);
        }
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    protected function getTableOccupancyID()
    {
        $result = "";
        try {
            $sql = "SELECT * from `table occupancy` WHERE `table number` = ? AND `occupancy status` = ?";
            $bindArr = [$this->tableNumber, $this->occupancyStatus];
            $columnName = 'table occupancy id';
            return $this->getColumnValue($sql, $bindArr, $columnName);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $e->getMessage();
        }

    }
}