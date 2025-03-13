<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $Title ?? "HTH HEALTH" ?></title>
	<link rel="shortcut icon" href="<?php echo public_dir('img/logo/logo-bg-white.png') ?>" type="image/x-icon">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo public_dir('css/UserCSS/style.css') ?>">
	<link rel="stylesheet" href="<?= public_dir('/css/ToastMessage.css'); ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<?php
		if (!empty($extraCSS)) {
			foreach ($extraCSS as $css) {
				echo '<link rel="stylesheet" href="' . $css . '">';
			}
		}

		$navs = [
			[
				'navName' => 'Trang chủ', 
				'navLink' => '/', 
			],
			[
				'navName' => 'Giới thiệu', 
				'navLink' => route('IntroduceRoute'), 
			],
			[
				'navName' => 'Dịch vụ', 
				'navLink' => '/', 
			],
			[
				'navName' => 'Hỏi đáp', 
				'navLink' => '/', 
			],
			[
				'navName' => 'Tin tức', 
				'navLink' => '/', 
			],
			[
				'navName' => 'Hỗ trợ', 
				'navLink' => '/', 
			],
		]
	?>

</head>

<body>
	<!-- Phần ở trên giữ nguyên -->
	<!-- Code từ đây xuống -->
	<div class="header-top">
		<div class="header-top__container container">
			<div class="header-top__address">
				<i class="fa-solid fa-location-dot"></i>
				<span>Số 269 Điện Biên Phủ, phường Võ Thị Sáu, quận 3, Tp. HCM</span>
			</div>
			<div class="header-top__email">
				<i class="fa-regular fa-envelope"></i>
				<span>hthhealth@phongkham.com</span>
			</div>
			<div class="header-top__time">
				<i class="fa-regular fa-clock"></i>
				<span>8:00-20:00</span>
			</div>
		</div>
	</div>
	<div class="header-middle">
		<div class="header-middle__container container">
			<div class="header-middle__logo">
				<img width="80px" height="80px" src="<?=public_dir('img/logo/logo-bg-white.png')?>" alt="">
				<h4 class="header-midle__slogan">Bác sĩ riêng của bạn</h4>
			</div>
			<div class="header-middle__search">
				<input class="header-middle__search-input" type="text" placeholder="Tìm kiếm...">
				<button class="header-middle__search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
			<div class="header__info">
				<div class="header-info__hotline">
					<button class="btn rounded-circle bg-white"><i class="fa-solid fa-phone"></i></button>
					<span class="header-info__text-hotline">Hotline: <strong>19000 1111</strong></span>
				</div>
				<div class="header-info__facebook">
					<button class="btn rounded-circle bg-white"><i class="fa-brands fa-facebook-f"></i></button>
					<span class="header-info__text-hotline">Fanpage: <strong>HTH HEALTH</strong></span>
				</div>
			</div>
		</div>
	</div>
	<div class="header-nav">
		<div class="header-nav__container container">
			<ul class="header-nav__menu">
				<?php foreach($navs as $nav) : 
					if(isset($navActive) && trim(strtolower($nav['navName'])) === trim(strtolower($navActive))) :
				?>
				<li class="header-nav__item header-nav__item--active">
					<a class="header-nav__link" href="<?= $nav['navLink'] ?>">
						<?= $nav['navName'] ?>
					</a>
				</li>
				<?php else: ?>
					<li class="header-nav__item header-nav__item">
						<a class="header-nav__link" href="<?= $nav['navLink'] ?>">
							<?= $nav['navName'] ?>
						</a>
					</li>
				<?php endif; endforeach; ?>
			</ul>
			<div class="header-cta">
				<a href="<?=route('UserAppointmentRoute')?>" class="header-nav__link header-cta__link">
					<i class="fa-regular fa-calendar-days"></i>
					<span class="header-cta__text">Đặt lịch</span>
				</a>
			</div>
		</div>
	</div>