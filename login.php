<?php

if (isset($_POST['btnlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email && $password) {
        echo '<p>Success</p>';
    } else {
        echo "<p>Failed</p>";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<form action="login.php" method="post">
    <input type="email" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <input type="submit" name="btnlogin" value="login">
</form>
</body>
</html>