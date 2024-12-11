<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Đăng nhập Bác sĩ</title>
	<link rel="stylesheet" href="<?php echo public_dir('css/AccountStaff.css') ?>" />
</head>

<body>
	<div class="login-wrapper">
		<div class="login-container">
			<h1 class="login-title">HTH-Health chào mừng bạn</h1>
			<p class="login-subtitle">Đăng nhập để quản lý bệnh nhân</p>
			<form id="doctorLoginForm" class="login-form">
				<div class="form-group">
					<input type="text" id="email" name="email" placeholder="Nhập tài khoản" required />
				</div>
				<div class="form-group">
					<input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required />
				</div>
				<button type="submit" class="btn-submit">Đăng nhập</button>
			</form>
			<!-- <p class="forgot-password">
				<a href="#">Quên mật khẩu?</a>
			</p> -->
		</div>
	</div>
	<script>
		document.getElementById('doctorLoginForm').addEventListener('submit', function(e) {
			e.preventDefault();

			const email = document.getElementById('email').value.trim();
			const password = document.getElementById('password').value.trim();

			if (!email || !password) {
				alert('Vui lòng nhập đầy đủ thông tin!');
				return;
			}
		});
	</script>
</body>

</html>
