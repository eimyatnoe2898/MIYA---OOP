<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIYA - Add Individuals</title>
</head>
<body>
    <header>
        <h1>ADD INDIVIDUAL(s)</h1>
        <h2>You can place orders for guests listed</h2>
    </header>

    <div>
        <form method = "post" action = "" id = "addIndividuals">
            <input type = "text" placeholder="Name" name = "customer1" >
            <br>
            <button onclick="addInputBox()">Add More Guest</button>
            <br>
            <input type= "submit" id = "myBtn" name="submitCustomers" value= "Submit">

        </form>

        <script>
            function addInputBox()
            {
                var br = document.createElement("br");
                
                var form = document.getElementById('addIndividuals');
                var input = document.createElement("");
                
            }
        </script>
    </div>
</body>
</html>