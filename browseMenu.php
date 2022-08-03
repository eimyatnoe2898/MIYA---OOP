<?php


//echo out all session variables


//show the modal box to alert that customers can add other customers



//if clicked, header to page for each item



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Browse Menus</title>
</head>

<body>
    <h1>Menus will appear here</h1>
    <nav id="navbar-example2" class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#fat">@fat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mdo">@mdo</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#one">one</a>
                    <a class="dropdown-item" href="#two">two</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#three">three</a>
                </div>
            </li>
        </ul>
    </nav>
    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
        <h4 id="fat">@fat</h4>
        <p>...</p>
        <h4 id="mdo">@mdo</h4>
        <p>...</p>
        <h4 id="one">one</h4>
        <p>...</p>
        <h4 id="two">two</h4>
        <p>...</p>
        <h4 id="three">three</h4>
        <p>...</p>
    </div>
    <?php
    //get the columns from database


    //create buttons for every case


    ?>
</body>

</html>