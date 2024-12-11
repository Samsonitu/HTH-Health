<?php
$Title = "Dịch vụ khám tai mũi họng"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

/* Cần nhúng file css nào thì sửa đường dẫn trong phần tử của extraCSS */
$extraCSS = [
	public_dir('css/DoctorCSS/DoctorStyle.css'),
	public_dir('css/DoctorCSS/DrForm.css')
];

/* Cần nhúng file js nào thì sửa đường dẫn trong phần tử của extraJS */
$extraJS = [
	public_dir('js/DoctorJS/DoctorScript.js')
];
?>


<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../DoctorLayouts/DoctorHeader.php"; ?>

<div class="container-fuild">
	<div class="d-flex" style="min-height: 85vh;">
		<!-- Article -->
		<article class="services">
			<div class="services__container">
				<div class="services__sidebar ">
					<div class="heading">Lịch sử khám bệnh</div>
					<div class="history__list">
					</div>
				</div>
				<div class="services__content">
				</div>
			</div>
		</article>
		<!-- Sidebar -->
		<?php require_once __DIR__ . "/../DoctorLayouts/DoctorSidebar.php" ?>
	</div>
</div>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../DoctorLayouts/DoctorFooter.php"; ?>
