<?php

session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Home</h1>
    <?php if (isset($_SESSION["user_id"])):?>
        <p> You are Logged in</p>
        <?php endif; ?>

            <p><a href="login.php">Login</a> or <a href="signup.html">Signup</a></p>
</body>
</html>