<?php

$Title = "Đăng nhập";

$extraCSS = [public_dir('css/UserCSS/style.css'), public_dir('css/UserCSS/UserLoginStyle.css')];
$extraJS = [public_dir('js/UserJS/script.js')];
// $extraCSS = [public_dir('css/UserCSS/UserLoginStyle.css')];
?>

<?php require_once __DIR__ . "/../UserLayouts/UserHeader.php"; ?>

<div class="container">
	<div class="login">
		<div class="login__container">
			<h1 class="login__title">Login</h1>

			<form class="login__form">
				<div class="login__form-group">
					<label class="login__label" for="username">Username</label>
					<div class="login__input-wrapper">
						<i class="login__icon fas fa-user"></i>
						<input
							type="text"
							id="username"
							class="login__input"
							placeholder="Type your username"
							required />
					</div>
				</div>

				<div class="login__form-group">
					<label class="login__label" for="password">Password</label>
					<div class="login__input-wrapper">
						<i class="login__icon fas fa-lock"></i>
						<input
							type="password"
							id="password"
							class="login__input"
							placeholder="Type your password"
							required />
					</div>
				</div>

				<div class="login__forgot">
					<a href="#" class="login__forgot-link">Forgot password?</a>
				</div>

				<button type="submit" class="login__button">LOGIN</button>

				<div class="login__social">
					<p class="login__social-text">Or Sign Up Using</p>
					<div class="login__social-icons">
						<a href="#" class="login__social-icon login__social-icon--fb">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="login__social-icon login__social-icon--tw">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="login__social-icon login__social-icon--gg">
							<i class="fab fa-google"></i>
						</a>
					</div>
				</div>

				<div class="login__signup">
					<p class="login__signup-text">Or Sign Up Using</p>
					<a href="#" class="login__signup-link">SIGN UP</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
