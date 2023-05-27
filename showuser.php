<?php
session_start(); 
$id = $_SESSION['id']; 
include('Users.php');
$name = '';
$email = '';
$password = '';
$done = '';
$error = '';
$user = new User();
$showuser[] = $user->getUserByID($id);
$name = $showuser[0]['name'];
$email = $showuser[0]['email'];
$password = $showuser[0]['password'];
// For Updating
if (isset($_POST['update'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $update = $user->UpdateUser($id, $name, $email);
    if ($update) {
        $done = 'Update completed successfully.';
    } else {
        $error = 'Erorr Updata. ';
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
	<title>ACP | Show User </title>
</head>

<body class="bg-body-secondary">
	<?php include('include/header.php');  ?>
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
								<br> Welcome <?php echo $name;  ?>
							</h4>
							<?php if (strlen($done) > 1) { ?>
                                <div id="login-alert" class="alert alert-success col-sm-12">
                                    <?php
                                    echo $done;
                                    ?>
                                </div>
                            <?php } else if (strlen($error) > 1) { ?>
                                <div id="login-alert" class="alert alert-danger col-sm-12">
                                    <?php
                                    echo $error;
                                    ?>
                                </div>
                            <?php   } ?>
							<form action="" class="container-sm " method="POST">
                                <div class="row g-4 align-items-center">
                                    <div class="col-auto">
                                        <label for="id" class="col-form-label">ID Num: </label>
                                    </div>
                                    <div class="col-auto p-1">
                                        <input type="text" disabled name="id" id="id" class="form-control " placeholder="id" aria-labelledby="nameHelpInline" value="<?php echo $id; ?>" />
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-auto">
                                        <label for="name" class="col-form-label">name : </label>
                                    </div>
                                    <div class="col-auto p-1">
                                        <input type="text" name="name" id="name" class="form-control " placeholder="name" aria-labelledby="nameHelpInline" value="<?php echo $name; ?>" />
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-auto">
                                        <label for="email" class="col-form-label">email : </label>
                                    </div>
                                    <div class="col-auto p-1">
                                        <input type="email" name="email" id="email" class="form-control " placeholder="email" aria-labelledby="nameHelpInline" value="<?php echo $email; ?>" />
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-auto">
                                        <label for="password" class="col-form-label">password : </label>
                                    </div>
                                    <div class="col-auto p-1">
										<a href="edit.php" class="btn btn-secondary  my-2" name='edit' type="submit">Edit Password</a>

                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button href="" class="btn btn-secondary  my-2" name='update' type="submit">Update</button>
                                    <a href="logout.php" class="btn btn-secondary  my-2" name='logout' type="submit">Logout</a>
									</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('include/footer.php');  ?>
</body>

</html>