<?php
$errors = [];
$name = '';
$email = '';
$password = '';
$passwordConf = '';
if (isset($_POST['regist'])) {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$passwordConf = htmlspecialchars($_POST['conpassword']);
	# validate name 
	if (strlen($name) < 3) {
		$errors[] = 'Enter Your Name Correctly   . ';
	}
	# validate email 
	if (validEmail($email)) {
		$errors[] = 'This email is trying to log in in is already registered  ';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'Enter email correctly  as example@example.com . ';
	}
	# validate password 
	if (strlen($password) <= 8) {
		$errors[] = 'Password Must be at least 8 characters  . ';
	} else if ($password !== $passwordConf) {
		$errors[] = 'The password must be the same.';
	}
	# Insert in database 
	include('Users.php');
	if (count($errors) == 0) {
        $hashPassword = md5($password);
        $user = new User();
        $user->register($name, $email, $hashPassword);
    }
}
// To validate if email in database or not ... 
function validEmail($email)
{
	include('DataBase/connect.php');
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($con, $query);
	if (!$result) {
		die('Error Executing query  !  ' . mysqli_error($con));
	}
	if (mysqli_num_rows($result) > 0) {
		return true; // find in database must be -> login
	} else {
		return false; 
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<title>ACP | Register </title>
</head>

<body class="bg-body-secondary">
	<?php include('include/header.php'); ?>
	<section>
		<div class="container  mt-4 pt-3">
			<div class="row">
				<div class="col-10 col-sm-6 col-md-5 m-auto">
					<div class="card border-2 shadow">
						<div class="card-body">
							<h4 class="text-center text-light-emphasis">
								<svg class="my-3 mx-auto text-center" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
									<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
									<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
								</svg>
								<br> Sing-up
							</h4>
							<?php if (count($errors) > 0) { ?>
								<div id="login-alert" class="alert alert-danger col-sm-12">
									<ul>
										<?php foreach ($errors as $error) { ?>
											<li><?php echo $error; ?></li>
										<?php  } ?>
									</ul>
								</div>
							<?php } ?>
							<form action="#" method="post" class="container-sm" enctype="multipart/form-data">
								<input type="text" name="name" id="name" class="form-control my-4 py-2" placeholder="Name" value="<?php echo $name; ?>" />
								<input type="text" name="email" id="email" class="form-control my-4 py-2" placeholder="Email" value="<?php echo $email; ?>" />
								<input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" value="<?php echo $password; ?>" />
								<input type="password" name="conpassword" id="conpassword" class="form-control my-4 py-2" placeholder="Confirm Password" value="<?php echo $passwordConf; ?>" />
								<div class="text-center mt-3">
									<button class="btn btn-outline-primary" type="submit" id="regist" name="regist">Sing-up</button>
									<a href="Login.php" class="nav-link  my-2">or Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('include/footer.php'); ?>
</body>

</html>