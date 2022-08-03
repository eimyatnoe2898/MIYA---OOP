<?php

class TableContr extends Table
{
    //variables


    //constructor
    public function __construct($tableNumber, $occupancyStatus)

    {
        parent::__construct($tableNumber, $occupancyStatus);
    }
    
    public function printTable()
    {
        $this->print();
    }

    public function isTableCheckedIn()
    {
        return $this->checkTableOccupancy();
    }

    public function insertOccupiedTable()
    {
        $this->addNewTableOccupancy();
    }

    public function findTblOccupancyID()
    {
        return $this->getTableOccupancyID();
    }


    
}