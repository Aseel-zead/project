<?php
session_start();
$id = $_SESSION['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include('../Users.php');
$user = new User();
$userId[] = $user->getUserByID($id);
$password = $userId[0]['password'];
$name = $userId[0]['name'];
$newPassword = '';
$confPassword = '';
$done = '';
$errors = '';
// For Editing
if (isset($_POST['edit'])) {
    $newPassword = htmlspecialchars($_POST['newPassword']);
    $confPassword = htmlspecialchars($_POST['confPassword']);
    if (strlen($newPassword) <= 8) {
        $errors = 'Password Must be at least 8 characters. ';
    } else if ($newPassword !== $confPassword) {
        $errors = 'The password must be the same.';
    } else {
        $qu = $user->EditPassword($id, md5($newPassword));
        if ($qu) {
            $done = 'Modify password successfully.';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>ACP | Show User </title>
</head>

<body class="bg-body-secondary">
    <?php include('../include/header.php');  ?>
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
                                <br><?php echo $name;  ?> <br> Edit Password
                            </h4>
                            <?php if (strlen($done) > 1) { ?>
                                <div id="login-alert" class="alert alert-success col-sm-12">
                                    <?php
                                    echo $done;
                                    ?>
                                </div>
                            <?php } else if (strlen($errors) > 1) { ?>
                                <div id="login-alert" class="alert alert-danger col-sm-12">
                                    <?php
                                    echo $errors;
                                    ?>
                                </div>
                            <?php   } ?>
                            <form action="" class="container-sm " method="POST">
                                <div class="row g-5 align-items-center">
                                    <div class="col-auto">
                                        <label for="newPassword" class="col-form-label">New Password : </label>
                                    </div>
                                    <div class="col-auto p-1">
                                        <input type="password" name="newPassword" id="newPassword" class="form-control " aria-labelledby="nameHelpInline" value="<?php echo $newPassword; ?>" />
                                    </div>
                                </div>
                                <div class="row g-5 align-items-center">
                                    <div class="col-auto">
                                        <label for="confPassword" class="col-form-label">Confirm Password : </label>
                                    </div>
                                    <div class="col-auto p-1">
                                        <input type="password" name="confPassword" id="confPassword" class="form-control " aria-labelledby="nameHelpInline" value="<?php echo $confPassword; ?>" />
                                    </div>
                                </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="alluser.php" class="btn btn-secondary  my-2" name='back' type="submit">Back</a>
                            <button href="" class="btn btn-secondary  my-2" name='edit' type="submit">Edit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php include('../include/footer.php');  ?>
</body>

</html>