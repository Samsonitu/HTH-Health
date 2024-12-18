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
			<h1 class="login__title">Đăng nhập tài khoản</h1>

			<form action="<?= route('UserLoginRoute') ?>" method="POST" class="login__form">
				<div class="login__form-group">
					<label class="login__label" for="username">Tài khoản:</label>
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
					<label class="login__label" for="password">Mật khẩu:</label>
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

				<div class="login__forgot">
					<a href="#" class="login__forgot-link">Quên mật khẩu?</a>
				</div>

				<input type="submit" class="login__button" value="Đăng nhập" name="userLogin">

				<div class="login__social">
					<p class="login__social-text">Đăng nhập với</p>
					<div class="login__social-icons">
						<a href="https://www.facebook.com/" class="login__social-icon login__social-icon--fb">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="login__social-icon login__social-icon--zl">
							<img style="margin-top: 0;" src="<?= public_dir('img/logo/Icon_of_Zalo.svg.webp') ?>" width="24px" height="24px" alt="">
						</a>
						<a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fmyaccount.google.com%3Futm_source%3Daccount-marketing-page%26utm_medium%3Dgo-to-account-button%26gar%3DWzEzMywiMjM2NzM2Il0%26sl%3Dtrue&ifkv=AcMMx-fFRgecPRxJG9u8fzllbi3OAYNkm3OnHGUFvufjj0hCmI8el8pQ_lgSJbESSMq_3EwvInOQzg&service=accountsettings&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S1763365522%3A1733532515945117&ddm=1" class="login__social-icon login__social-icon--gg">
							<i class="fab fa-google"></i>
						</a>
					</div>
				</div>

				<div class="login__signup">
					<p class="login__signup-text">Chưa có tài khoản? <a href="Dang-ky" class="login__signup-link">Đăng ký</a></p>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
