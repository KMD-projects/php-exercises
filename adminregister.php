<?php
include('query.php');

if (isset($_POST['btnregister'])) {

    $admin = new Admin();
    $admin->name = $_POST['txtname'];
    $admin->email = $_POST['txtemail'];
    $admin->password = $_POST['txtpassword'];
    $admin->phone = $_POST['txtphone'];
    $admin->address = $_POST['txtaddress'];

    echo $admin->name;
    echo "<br>";
    echo $admin->email;
    echo "<br>";
    echo $admin->password;
    echo "<br>";
    echo $admin->phone;
    echo "<br>";
    echo $admin->address;
    echo "<br>";

    if (isAdminExists($admin->email)) {
        echo "<script>window.alert('Admin with email already existed.')</script>";
        echo "<script>window.location='adminregister.php'</script>";
    } else {
        if (insertAdmin($admin)) {
            echo "Admin created successfully!";
        } else {
            echo "Failed to create admin.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin register</title>
</head>
<body>
<form action="adminregister.php" method="POST">
    <label for="name">Admin Name: </label>
    <input id="name" type="text" name="txtname" placeholder="Enter name" required/><br>

    <label for="email">Admin Email: </label>
    <input id="email" type="email" name="txtemail" placeholder="Enter email" required/><br>

    <label for="password">Admin Password: </label>
    <input id="password" type="password" name="txtpassword" placeholder="Enter password" required/><br>

    <label for="phone">Admin Phone: </label>
    <input id="phone" type="tel" name="txtphone" placeholder="Enter phone" required/><br>

    <label for="address">Admin Address: </label>
    <input id="address" type="text" name="txtaddress" placeholder="Enter address" required/><br>

    <input type="submit" name="btnregister" value="Register">
    <input type="reset" name="btnreset" value="Cancel">
</form>
</body>
</html>