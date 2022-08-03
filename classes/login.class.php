<?php


//where we will run queries
class Login extends Dbh
{
    protected function checkUser($email, $password)
    {
        $result = $this->checkUserExists($email, $password);
        return $result;
    }

    protected function getCustomerName($email, $password)
    {
        $result = $this->getUserName($email, $password);
        return $result;
    }


}