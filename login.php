<?php
include('Users.php');
$errors = [];
$email = '';
$password = '';
session_start();
if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $hashpassword = md5($_POST['password']);
    $user = new User();
    $sql =  $user->login($email, $hashpassword);
    $_SESSION['id'] = $sql;
    if (!$sql) {
        $errors[] = 'Login failed. please, check your email and password.';
    } else if ($sql > 1) {
        header("Location: showuser.php");
    }else {
        $_SESSION['role'] = 'admin';
        header("Location: Admin/alluser.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>ACP | Login</title>
</head>

<body class="bg-body-secondary">
    <?php include('include/header.php'); ?>
    <div class="container  mt-5 pt-5">
        <div class="row">
            <div class="col-10 col-sm-7 col-md-6 m-auto">
                <div class="card border-2 shadow">
                    <div class="card-body">
                        <h4 class="text-center text-light-emphasis">
                            <svg class="my-3 mx-auto text-center" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <br> Login
                        </h4>
                        <?php if (count($errors) > 0) { ?>
                            <ul class="px-3 text-danger">
                                <?php foreach ($errors as $error) { ?>
                                    <div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $error; ?></div>
                                <?php  } ?>
                            </ul>
                        <?php } ?>
                        <form action="#" method="post" enctype="multipart/form-data" class="container-sm">
                            <input type="text" name="email" id="email" class="form-control my-4 py-2" placeholder="Email" value="<?php echo $email; ?>" />
                            <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" value="<?php echo $password; ?>" />
                            <div class="text-center mt-3">
                                <button class="btn btn-outline-primary" type="submit" name="login" id="login">Login</button>
                                <a href="Register.php" class="nav-link  my-2">or Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</body>

</html>