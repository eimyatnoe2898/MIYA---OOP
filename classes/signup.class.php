<?php

//where we will run queries
class SignUp extends Dbh
{
    protected function checkUserExists($firstname, $email)
    {
        $sql = "SELECT * from users WHERE users_firstname = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname]);
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function insertToMembers($fname, $lname, $email, $bd, $password, $phno, $city, $state)
    {
        $this->insertMember($fname, $lname, $email, $bd, $password, $phno, $city, $state);
    }

 
}