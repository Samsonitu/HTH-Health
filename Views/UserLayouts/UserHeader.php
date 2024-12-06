<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $Title ?? "HTH HEALTH" ?></title>
	<link rel="shortcut icon" href="<?php public_dir('img/logo/log-bg-white.png') ?>" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<?php
	if (!empty($extraCSS)) {
		foreach ($extraCSS as $css) {
			echo '<link rel="stylesheet" href="' . $css . '">';
		}
	}
	?>

</head>

<body>
	<!-- Phần ở trên giữ nguyên -->
	<!-- Code từ đây xuống -->
	<div class="header">

		<div class="header-info">

			<div class="map h-info">
				<i class="fa-solid fa-location-dot"></i>
				<p>Số 269 Điện Biên Phủ, phường Võ Thị Sáu, quận 3, Tp. HCM</p>
			</div>

			<div class="contact h-info">
				<i class="fa-regular fa-envelope"></i>
				<p>contact@phongkham.com</p>
			</div>

			<div class="schedule h-info">
				<i class="fa-regular fa-clock"></i>
				<p>8:00-20:00</p>
			</div>

		</div>

		<div class="header-navbar">

			<div class="nav-info h-navbar">
				<img src="/public/img/logo/logo-bg-white.png" alt="">
				<h3>Bác sĩ riêng của bạn</h3>
			</div>

			<div class="nav-search h-navbar">
				<input type="search" placeholder="Tìm kiếm" class="search-box">
				<i class="fa-solid fa-magnifying-glass"></i>
			</div>

			<div class="nav-phone h-navbar">
				<button name="phone" class="btn"><i class="fa-solid fa-phone"></i></button>
				<p>Hotline:</p>
				<p class="phone">1900 1111</p>
			</div>

			<div class="nav-examine h-navbar">
				<button name="examine" class="btn"><i class="fa-solid fa-house"></i></button>
				<p>Phòng khám online</p>
			</div>

		</div>

		<div class="header-menu">

			<ul class="menu">
				<li><a href="/">Trang chủ</a></li>
				<li><a href="">Giới thiệu</a></li>
				<li><a href="">Dịch vụ</a></li>
				<li><a href="">Hỏi đáp bác sĩ</a></li>
				<li><a href="">Tin tức</a></li>
				<li><a href="">Hỗ trợ</a></li>
				<li>
					<a href="<?= route('UserLoginRoute') ?>">Đăng nhập</a> /
					<a href="<?= route('UserLoginRoute') ?>">Đăng ký</a>
				</li>
				<button name="navSchedule"><i class="fa-solid fa-calendar-days"></i>Đặt lịch</button>
			</ul>

		</div>

	</div>
	<!-- <h2>Header</h2> -->
