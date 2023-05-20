<?php

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
<?php include('../headFooter/header.php'); ?>
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
								<br> Name
							</h4>
							<form action="" class="container-sm">
                                <input type="text" name="id" id="id" value="ID Num. : 230" class="form-control my-4 py-2" placeholder="id" disabled />
                                <input type="text" name="name" id="name" value="Name : Aseel"class="form-control my-4 py-2" placeholder="Name" disabled />
								<input type="text"  name="email" id="email"  value="Email : aa@gmaile.com" class="form-control my-4 py-2" placeholder="Email"  disabled/>
								<div class="text-center mt-3">
									<a href="../alluser.php" class="btn btn-secondary  my-2">Back</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <?php include('../headFooter/footer.php'); ?>
</body>
</html>