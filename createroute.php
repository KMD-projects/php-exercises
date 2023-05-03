<?php
include('query.php');

if (isset($_POST['btncreate'])) {

    $route = $_POST['txtroute'];

    if (insertRoute($route)) {
        echo "Route created successfully!";
    } else {
        echo "Failed to create route.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route</title>
</head>
<body>
<form action="createroute.php" method="POST">
    <label for="name">Route path: </label>
    <input id="name" type="text" name="txtroute" placeholder="Enter route" required/><br>

    <input type="submit" name="btncreate" value="Create">
    <input type="reset" name="btnreset" value="Cancel">
</form>
</body>
</html>
