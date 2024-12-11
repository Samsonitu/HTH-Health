<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $Title ?? "HTH HEALTH" ?></title>
	<link rel="shortcut icon" href="<?php public_dir('img/logo/log-bg-white.png') ?>" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
	<header>
		<!-- Logo -->
		<div id="logo">
			<a href="/"><img src="<?php echo public_dir('img/logo/logo.png') ?>" alt=""></a>
		</div>

		<!-- Navigation -->
		<ul id="nav">
			<li><a href="<?php echo route('DrGeneralMedical') ?>"><i class="fa-solid fa-file"></i> <span>Khám tổng quát</span></a></li>
			<li><a href="<?php echo route('DrHeartExam') ?>"><i class="fa-solid fa-file"></i> <span>Khám tim</span></a></li>
			<li><a href="<?php echo route('DrENTExam') ?>"><i class="fa-solid fa-file"></i> <span>Khám tai mũi họng</span></a></li>
			<li><a href="<?php echo route('DrEyeExam') ?>"><i class="fa-solid fa-file"></i> <span>Khám thị lực</span></a></li>
		</ul>

		<!-- Avatar -->
		<div id="avatar">
			<i class="fa-solid fa-user"></i>
			<ul id="avatar__subnav">
				<li><b>Bác sĩ</b> <br>Nguyễn Minh Thuyết</li>
				<li><a href=""><i class="fa-regular fa-address-card"></i> Sửa thông tin</a></li>
				<li><a href=""><i class="fa-regular fa-newspaper"></i> Hướng dẫn sử dụng</a></li>
				<li><a href=""><i class="fa-solid fa-power-off"></i> Đăng Xuất</a></li>
			</ul>
		</div>
	</header>
