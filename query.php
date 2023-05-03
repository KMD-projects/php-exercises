<?php

use data\Admin;
use data\Package;
use data\PackageType;
use data\Route;

include('connect.php');
require('data/Admin.php');
require('data/Package.php');
require('data/PackageType.php');
require('data/Route.php');

function isAdminExists($email): bool
{
    global $connect;
    $checkEmailQuery = "select * from admins where email = '$email'";
    $checkEmailResult = mysqli_query($connect, $checkEmailQuery);
    $count = mysqli_num_rows($checkEmailResult);
    return $count > 0;
}

function insertAdmin(Admin $admin): bool
{
    global $connect;
    $insertAdmin = "insert into admins (admin_name, email, password, phone_no, address) values ('$admin->name', '$admin->email', '$admin->password', '$admin->phone', '$admin->address')";
    return mysqli_query($connect, $insertAdmin);
}

function insertRoute(string $route): bool
{
    global $connect;
    $insertRoute = "insert into routes (route_name) values ('$route')";
    return mysqli_query($connect, $insertRoute);
}

function insertPackageType(string $packageType): bool
{
    global $connect;
    $insertPackageType = "insert into package_types (package_type_name) values ('$packageType')";
    return mysqli_query($connect, $insertPackageType);
}

function insertPackage(Package $package): bool
{
    global $connect;
    $insertPackage = "insert into packages (package_name, package_from, package_to, duration, package_price, description, package_image, route_id, package_type_id) values ('$package->name', '$package->from', '$package->to', '$package->duration', '$package->price', '$package->description', '$package->image', '$package->routeId', '$package->typeId')";
    return mysqli_query($connect, $insertPackage);
}

function getRoutes(): array
{
    global $connect;
    $routesQuery = "select * from routes";
    $routeResult = mysqli_query($connect, $routesQuery);
    $count = mysqli_num_rows($routeResult);
    $routes = array();
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($routeResult);
        $route = new Route();
        $route->id = $row['route_id'];
        $route->name = $row['route_name'];
        $routes[] = $route;
    }
    return $routes;
}

function getPackageTypes(): array
{
    global $connect;
    $packageTypeQuery = "select * from package_types";
    $packageTypeResult = mysqli_query($connect, $packageTypeQuery);
    $count = mysqli_num_rows($packageTypeResult);
    $packageTypes = array();
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($packageTypeResult);
        $packageType = new PackageType();
        $packageType->id = $row['package_type_id'];
        $packageType->name = $row['package_type_name'];
        $packageTypes[] = $packageType;
    }
    return $packageTypes;
}

function createCustomerTable()
{
    global $connect;
    $create_customers = "CREATE TABLE customers
(
    customer_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(20),
    surname VARCHAR(20),
    email_address VARCHAR(30),
    password VARCHAR(30),
    phone_number VARCHAR(30),
    address VARCHAR(50)
)";

    $create_customers_query = mysqli_query($connect, $create_customers);
    if ($create_customers_query) {
        echo "<p>Customer table created!</p>";
    } else {
        echo "<p>Customer table failed to create.</p>";
    }
}

function createRouteTable()
{
    global $connect;
    $create_routes = "CREATE TABLE routes
(
    route_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    route_name VARCHAR(20)
)";

    $create_routes_query = mysqli_query($connect, $create_routes);
    if ($create_routes_query) {
        echo "<p>Route table created!</p>";
    } else {
        echo "<p>Route table failed to create.</p>";
    }
}

function createPackageTypeTable()
{
    global $connect;
    $create_package_types = "CREATE TABLE package_types
(
    package_type_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    package_type_name VARCHAR(20)
)";

    $create_package_types_query = mysqli_query($connect, $create_package_types);
    if ($create_package_types_query) {
        echo "<p>Package type table created!</p>";
    } else {
        echo "<p>Package type table failed to create.</p>";
    }
}

function createPackageTable()
{
    global $connect;
    $create_packages = "CREATE TABLE packages
(
    package_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    package_name VARCHAR(20),
    package_from VARCHAR(30),
    package_to VARCHAR(30),
    duration INT,
    package_price INT,
    description VARCHAR(100),
    package_image VARCHAR(200),
    route_id INT,
    package_type_id INT,
    FOREIGN KEY (route_id) REFERENCES routes(route_id),
    FOREIGN KEY (package_type_id) REFERENCES package_types(package_type_id)
)";

    $create_packages_query = mysqli_query($connect, $create_packages);
    if ($create_packages_query) {
        echo "<p>Packages table created!</p>";
    } else {
        echo "<p>Packages table failed!</p>";
    }
}
