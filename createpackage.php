<?php

use data\Package;
use data\PackageType;
use data\Route;

include('query.php');

if (isset($_POST['btnCreate'])) {

    $package = new Package();
    $package->name = $_POST['txtName'];
    $package->from = $_POST['txtFrom'];
    $package->to = $_POST['txtTo'];
    $package->duration = $_POST['txtDuration'];
    $package->price = $_POST['txtPrice'];
    $package->description = $_POST['txtDesc'];
    $package->routeId = $_POST['cboRoute'];
    $package->typeId = $_POST['cboPackageType'];

    $imageFile = $_FILES['fileImage']['name'];
    $folder = "images/";
    $imageFileName = $folder."_".$imageFile;
    echo "$imageFileName";
    $copy = copy($_FILES['fileImage']['tmp_name'], $imageFileName);
    if (!$copy) {
        echo "<p>Cannot upload image.</p>";
        exit();
    }
    $package->image = $imageFileName;

    if (insertPackage($package)) {
        echo "Package created successfully!";
    } else {
        echo "Failed to create package.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package</title>
</head>
<body>
<form action="createpackage.php" method="POST" enctype="multipart/form-data">
    <label for="name">Package name: </label>
    <input id="name" type="text" name="txtName" placeholder="Enter package name" /><br>

    <label for="from">Package from: </label>
    <input id="from" type="text" name="txtFrom" placeholder="Enter package from" /><br>

    <label for="to">Package to: </label>
    <input id="to" type="text" name="txtTo" placeholder="Enter package to" /><br>

    <label for="duration">Package duration: </label>
    <input id="duration" type="number" name="txtDuration" placeholder="Enter package duration" /><br>

    <label for="price">Package price: </label>
    <input id="price" type="number" name="txtPrice" placeholder="Enter package price" /><br>

    <label for="desc">Package desc: </label>
    <input id="desc" type="text" name="txtDesc" placeholder="Enter package desc" /><br>

    <label for="image">Package image: </label>
    <input id="image" type="file" name="fileImage" placeholder="Choose image" /><br>

    <label for="cboRoute">Package route: </label>
    <select id="cboRoute" name="cboRoute">
        <?php
        $routes = getRoutes();
        foreach ($routes as $route) {
            echo "<option value='$route->id'>$route->name</option>";
        }
        ?>
    </select>

    <label for="cboPackageType">Package type: </label>
    <select id="cboPackageType" name="cboPackageType">
        <?php
        $packageTypes = getPackageTypes();
        foreach ($packageTypes as $packageType) {
            echo "<option value='$packageType->id'>$packageType->name</option>";
        }
        ?>
    </select>

    <input type="submit" name="btnCreate" value="Create">
    <input type="reset" name="btnReset" value="Cancel">
</form>
</body>
</html>
