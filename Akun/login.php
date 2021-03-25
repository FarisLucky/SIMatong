<?php 
	include"../core/koneksi.php";
	$_SESSION['title'] = "Login !";
	include'../header.php';
	$error="";
	if (isset($_SESSION["sudahLogin"])) {
		header("Location: ../index.php");
		exit;
	}
	
?>

	<div class="form_login" id="form_login">
		<div class="container-fluid">
			<div class="row py-4 background_logo mx-auto col-md-12">
				<div class="logo-icon rounded-circle text-center">
				<img src="<?= $url_login?>view/img/login/user.png" alt="">
				</div>
			</div>
			<div class="row col-md-12 mx-auto text-center">
				<span class="title_login">Login Page</span>
			</div>
		<div class="row pb-4 pt-4">
			<div class="col-md-10 offset-1">
				<form action="" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" name="username" id="user_login" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="pass" id="pass_login" required>
					</div>
					<button class="btn btn-danger col-md-12 mb-1" name="login" id="login_simatong">Login</button>
				</form>
				<span class="mb-3">Lupa Password <a href="<?php echo $url_login;?>akun/signup.php">Click Disini</a></span>
				<?= $error;  ?>

			</div>
		</div>
		</div>
	</div>

<?php
	include'../footer.php';
?>