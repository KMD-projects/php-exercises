<?php
include('query.php');

if (isset($_POST['btncreate'])) {

    $packageType = $_POST['txtpackagetype'];

    if (insertPackageType($packageType)) {
        echo "Package type created successfully!";
    } else {
        echo "Failed to create package type.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package type</title>
</head>
<body>
<form action="createpackagetype.php" method="POST">
    <label for="name">Package type: </label>
    <input id="name" type="text" name="txtpackagetype" placeholder="Enter package type" required/><br>

    <input type="submit" name="btncreate" value="Create">
    <input type="reset" name="btnreset" value="Cancel">
</form>
</body>
</html>
