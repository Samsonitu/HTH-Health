<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $Title ?? "HTH HEALTH" ?></title>
    <link rel="shortcut icon" href="<?php echo public_dir('/img/logo/logo-bg-white.png') ?>" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo public_dir('css/AccountStaff.css') ?>" />
</head>

<body>
	<div class="login-wrapper">
		<div class="login-container">
			<h1 class="login-title">HTH-Health chào mừng bạn</h1>
			<p class="login-subtitle">Đăng nhập để truy cập vào hệ thống</p>
			<form action="<?=route('AccountStaffLoginRoute')?>" method="post" class="login-form">
				<div class="form-group">
					<input type="text" name="username" placeholder="Nhập tài khoản" required />
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Nhập mật khẩu" required />
				</div>
				<input type="submit" class="btn-submit" value="Đăng nhập" name="btnLogin">
			</form>
		</div>
	</div>
	<script>
		const formLogin = document.querySelector('form');
		formLogin.addEventListener('submit', function(e) {
			const username = document.querySelector('input[name="username"]').value.trim();
			const password = document.querySelector('input[name="password"]').value.trim();

			if (!username || !password) {
				e.preventDefault();
				alert('Vui lòng nhập đầy đủ thông tin!');
				formLogin.reset();
				return;
			}
		});
	</script>
</body>

</html>
