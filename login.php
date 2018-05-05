<?php
	// $message = "";
	// if (
	// 	isset($_POST['email']) &&
	// 	isset($_POST['password'])
	// 	) 
	// {
	// 	$email = $_POST['email'];
	// 	$password = $_POST['password'];
	// 	$con = new PDO('mysql:host=localhost;dbname=auth','root','');
	// 	$statement = $con->prepare('select * from users where email=:email');
	// 	$statement->execute([
	// 		':email' => $email
	// 		]);
	// 	$user = $statement->fetch(PDO::FETCH_OBJ);

	// 	if (!$user) {
	// 		$message = "Your email not found in databsae!!!";
	// 	} else {
	// 		if (password_verify($password, $user->password)) {
	// 			header('location: /');
	// 		} else {
	// 			$message = "Your password doesn't match";
	// 		}
	// 	}
	// }

	session_start();
	if (isset($_SESSION['mahir_id']) && isset($_SESSION['mahir_email'])) {
	header("location: /");
}
	$msg = '';
	if (
		isset($_POST['email']) &&
		isset($_POST['password'])
		) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$con = new PDO('mysql:host=localhost;dbname=auth','root','');
		$statement = $con->prepare('select * from users where email=:email');
		$statement->execute([
			':email' => $email
			]);
		$mahir = $statement->fetch(PDO::FETCH_OBJ);

		if (!$mahir) {
			$msg = "your email does't match in database!!!";
		} else{
			if (password_verify($password, $mahir->password)) {
				$_SESSION['mahir_id'] = $mahir->id;
				$_SESSION['mahir_email'] = $mahir->email;
				header('location: /');
			} else {
				$msg = "Your password doesn't match";
			}
		}
	}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>

	<div class="container mt-5">
		<div class="card">
			<div class="card-header">
				<h2>Login Here</h2>
			</div>
			<div class="card-body">
			<div class="row">
				<div class="col-md-6 mx-auto">
				<?php if(!empty($msg)):?>
					<div class="alert alert-danger">
						<?php echo $msg;?>
					</div>
				<?php endif;?>
					<form class="my-4" action="" method="post">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
					<div  class="form-group">
						<p>Don't have account yet ?<a href="register.php"> Register Here</a></p>
						<button class="btn btn-outline-primary" type="submit">Login</button>
					</div>
				</form>
				</div>
			</div>
				
			</div>
		</div>
	</div>
</body>
</html>