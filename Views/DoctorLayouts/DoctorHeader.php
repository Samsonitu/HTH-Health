<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $Title ?? "HTH HEALTH" ?></title>
	<link rel="shortcut icon" href="<?php echo public_dir('img/logo/logo-bg-white.png') ?>" type="image/x-icon">
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
			<a href="/bac-si"><img src="<?php echo public_dir('img/logo/logo.png') ?>" alt=""></a>
		</div>

		<!-- Navigation -->
		<ul id="nav">

			<li><a data-service="Khám tổng quát" href="<?php echo route('DrGeneralMedical') ?>"><i class="fa-solid fa-file"></i> <span>Khám tổng quát</span></a></li>
			<li><a data-service="Khám tim" href="<?php echo route('DrHeartExam') ?>"><i class="fa-solid fa-file"></i> <span>Khám tim</span></a></li>
			<li><a data-service="Khám tai mũi họng" href="<?php echo route('DrENTExam') ?>"><i class="fa-solid fa-file"></i> <span>Khám tai mũi họng</span></a></li>
			<li><a data-service="Khám thị lực" href="<?php echo route('DrEyeExam') ?>"><i class="fa-solid fa-file"></i> <span>Khám thị lực</span></a></li>
		</ul>

		<!-- Avatar -->
		<div id="avatar">
			<i class="fa-solid fa-user"></i>
			<ul id="avatar__subnav">
				<?php
					if(isset($_SESSION['doctorInfo']) && !empty($_SESSION['doctorInfo'])) {
						echo '
							<li><b>Bác sĩ</b> <br>'.$_SESSION['doctorInfo']['doctorName'].'</li>
							<li><a href=""><i class="fa-regular fa-address-card"></i> Sửa thông tin</a></li>
							<li><a href=""><i class="fa-regular fa-newspaper"></i> Hướng dẫn sử dụng</a></li>
							<li><a href="'.route('AccountStaffLogoutRoute').'"><i class="fa-solid fa-power-off"></i> Đăng Xuất</a></li>
						';
					}
				?>
			</ul>
		</div>
	</header>
	<script>
		const activeServiceName = <?php echo json_encode($_SESSION['serviceName'][0]['serviceName']); ?>;
		document.addEventListener('DOMContentLoaded', () => {
			// Lấy danh sách tất cả các nút dịch vụ
			const serviceLinks = document.querySelectorAll('#nav a[data-service]');

			serviceLinks.forEach(link => {
				const service = link.getAttribute('data-service');

				// Kiểm tra nếu dịch vụ không khớp với activeService
				if (service !== activeServiceName) {
					link.classList.add('disabled'); // Thêm class để vô hiệu hóa
					link.style.pointerEvents = 'none'; // Không cho nhấn
					link.style.opacity = '0.6'; // Giảm độ trong suốt
					link.style.cursor = 'not-allowed'; // Thay đổi con trỏ
				}
			});
		});
	</script>
