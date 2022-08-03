<?php


//database readers

//Setters for SessionVariables
function setName($userName)
{
    $_SESSION["userName"] = $userName;
}

function setLoggedIn($loggedIn)
{
    $_SESSION["loggedIn"] = $loggedIn;
}

function setCheckInTime($checkedInAt)
{
    $_SESSION["checkedInAt"] = $checkedInAt;
}

function setCheckOutTime($checkedOutAt)
{
    $_SESSION["checkedOutAt"] = $checkedOutAt;
}

function setCustomerType($customerType)
{
    $_SESSION["customerType"] = $customerType;
}

function setCart($cartItem)
{
    $_SESSION["cart"] = $cartItem;
}

function setTableNumber($tableNumber)
{
    $_SESSION["tableNumber"] = $tableNumber;
}

function setTableOccupied($tableOccupancy)
{
    $_SESSION["tableOccupancy"] = $tableOccupancy;
}

function setTableOccupancyId($tableOccupancyId)
{
    $_SESSION["tableOccupancyId"] = $tableOccupancyId;
}

function setTableOccupancy($tableOccupancyId)
{
    $_SESSION["tableOccupancyId"] = $tableOccupancyId;
}

function getName()
{
    return $_SESSION["userName"];
}

function printLoggedIn()
{
    echo $_SESSION["loggedIn"];

}
//Getters for SessionVariables

//all session methods and cookie methods will be here

//session setters 

function setTableCheckInTime($tableCheckIn)
{
    $_SESSION["tableCheckInAt"] = $tableCheckIn;

}

function setTableCheckOutime($tableCheckOut)
{
    $_SESSION["tableCheckOutAt"] = $tableCheckOut;

}

//sessio getters

function getLoggedIn()
{
    echo $_SESSION["loggedIn"];

}

function getTableNumber()
{
    echo $_SESSION["tableNumber"];

}

function getTableOccupancy()
{
    echo $_SESSION["loggedIn"];

}

function getTblCheckInTime()
{
    echo $_SESSION["loggedIn"];

}
//Getters for SessionVariables