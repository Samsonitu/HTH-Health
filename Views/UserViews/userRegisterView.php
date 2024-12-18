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
			<h1 class="login__title">Đăng ký tài khoản</h1>

			<form action="<?= route('UserRegisterRoute') ?>" method="POST" class="login__form">

				<div class="login__form-group">
					<!-- <label class="login__label" for="username">Tên tài khoản:</label> -->
					<div class="login__input-wrapper">
						<i class="login__icon fas fa-user"></i>
						<input
							name="userName"
							type="text"
							id="username"
							class="login__input"
							placeholder="Tên tài khoản"
							required />
					</div>
				</div>

				<div class="login__form-group">
					<!-- <label class="login__label" for="username">Email:</label> -->
					<div class="login__input-wrapper">
						<i class="login__icon fas fa-user"></i>
						<input
							name="email"
							type="email"
							id="email"
							class="login__input"
							placeholder="Email"
							required />
					</div>
				</div>

				<div class="login__form-group">
					<!-- <label class="login__label" for="username">Số điện thoại:</label> -->
					<div class="login__input-wrapper">
						<i class="login__icon fas fa-user"></i>
						<input
							name="phoneNumber"
							type="text"
							id="phoneNumber"
							class="login__input"
							placeholder="Số điện thoại"
							required />
					</div>
				</div>

				<div class="login__form-group">
					<!-- <label class="login__label" for="password">Mật khẩu:</label> -->
					<div class="login__input-wrapper">
						<i class="login__icon fas fa-lock"></i>
						<input
							name="password"
							type="password"
							id="password"
							class="login__input"
							placeholder="Mật khẩu"
							required />
					</div>
				</div>


				<input type="submit" value="Đăng ký" class="login__button" name="register">
			</form>
		</div>
	</div>
</div>

<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
