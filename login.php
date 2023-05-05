<?php

$is_invalid = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
 require __DIR__ .'/database.php';

    $sql = sprintf("SELECT * FROM user
           WHERE email= '%s'",
           $mysqli->real_escape_string($_POST["email"]));
          
    $result= $mysqli->query($sql);

    $user= $result->fetch_assoc();
    if ($user) {
        if(password_verify($_POST["password"], $user["password_hash"])){

        session_start();

        $_SESSION["user_id"] = $user["id"];

        header("Location:index.php");
        exit;
    }
    }

    $is_invalid = true;



}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-body">
						<h2 class="text-center mb-4">Login</h2>
                        <?php if ($is_invalid): ?>
                            <em>Invalid Login</em>
                        <?php endif; ?>
						<form method="post">
							<div class="form-group">
								<label for="email" class="label"> YOUR EMAIL ADDRESS</label>
								<input type="email" class="form-control" id="email" aria-describedby="emailHelp" 
                                   value="<?= htmlspecialchars( $_POST["email"] ?? "")?>" placeholder="Enter email" name="email">
							</div>
							<div class="form-group">
								<label for="password" class="label">YOUR PASSWORD</label>
								<input type="password" class="form-control" id="password" placeholder="Password" name="password">
							</div>
                      <button type="submit" class="btn btn-primary button-2">Sign in</button> 
                             
						</form>
					
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
