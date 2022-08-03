<?php

//This will be the modal form

// Check if the user is logged in, if not then redirect him to landing page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
    header("location:/MIYA_NEW/index.html?error=notloggedin");
    exit;
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>