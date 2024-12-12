<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Giấy Khám Bệnh Tổng Quát</title>
	<link rel="stylesheet" href="<?php echo public_dir('css/DoctorCSS/DrPrint.css') ?>" />
</head>

<body>
	<div class="print-container">
		<?php if (isset($_SESSION['lastInsertedData'])) {
			echo '
					<header class="header">
						<h1>hth-health</h1>
						<p>Địa chỉ: Biên Hòa, Đồng Nai</p>
						<p>Điện thoại: 0987 654 321</p>
					</header>

					<main class="content">
						<h2>Thông Tin Bệnh Nhân</h2>
						<section class="section-info">
							<div class="info__group">
								<p>Họ và Tên: <span class="info">' . $_SESSION['lastInsertedData'][0]['name'] . '</span></p>
								<p>Ngày Sinh: <span class="info">' . $_SESSION['lastInsertedData'][0]['birthDate'] . '</span></p>
								<p>Giới Tính: <span class="info">' . $_SESSION['lastInsertedData'][0]['gender'] . '</span></p>
							</div>
							<div class="info__group">
								<p>Số Điện Thoại: <span class="info">' . $_SESSION['lastInsertedData'][0]['phone'] . '</span></p>
								<p>Dịch vụ khám: <span class="info">Khám tổng quát</span></p>
								<p>Triệu chứng: <span class="info">' . $_SESSION['lastInsertedData'][0]['symptoms'] . '</span></p>
							</div>
						</section>

						<h2>Kết Quả Khám</h2>
						<section class="section-info">
							<div class="info__group">
								<p>Chiều Cao: <span class="info">' . $_SESSION['lastInsertedData'][0]['height'] . ' cm</span></p>
								<p>Cân Nặng: <span class="info">' . $_SESSION['lastInsertedData'][0]['weight'] . ' kg</span></p>
								<p>BMI: <span class="info">' . $_SESSION['lastInsertedData'][0]['bmi'] . '</span></p>
							</div>

							<div class="info__group">
								<p>Vòng ngực: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['chestMeasurement'] . ' cm</span></p>
								<p>Vòng bụng: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['waistMeasurement'] . ' cm</span></p>
								<p>Vòng đùi: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['thighMeasurement'] . ' cm</span></p>
							</div>

							<div class="info__group">
								<p>Chức năng hô hấp: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['respiratoryFunction'] . '</span></p>
								<p>Cholesterol: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['cholesterolLevel'] . '</span></p>
								<p>Đường huyết: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['bloodSugarLevel'] . '</span></p>
							</div>

							<div class="info__group">
								<p>Kết luận chung: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['generalConclusion'] . '</span></p>
								<p>Ngày hẹn tái khám: <span class="info"> ' . $_SESSION['lastInsertedData'][0]['followUpAppointmentDate'] . '</span></p>
							</div>

							<div class="info__group">
								<p>
									Bác sĩ dặn dò:
									<span class="info"> ' . $_SESSION['lastInsertedData'][0]['doctorInstructions'] . '</span>
								</p>
							</div>
						</section>
					</main>
			';
		} ?>


		<footer class="footer">
			<p>Ngày Khám: <span class="info">03/12/2024</span></p>
			<p>Bác Sĩ Khám: <span class="info">BS. Trần Văn B</span></p>
			<p>Ký tên:</p>
			<div class="signature-line">Tran Van B</div>

			<!-- Nút Hủy và In -->
			<button class="btn cancel" onclick="handleCancel()">Hủy</button>
			<button class="btn print" onclick="window.print()">In phiếu</button>
		</footer>
	</div>

	<script>
		function handleCancel() {
			if (confirm('Bạn có chắc muốn hủy?')) {
				window.location.href = '<?php echo route('DrGeneralMedical') ?>'; // Điều hướng về trang chủ
			}
		}

		// window.onafterprint = function() {
		// 	const confirmed = confirm("Bạn có in thành công không?");
		// 	if (confirmed) {
		// 		console.log("Người dùng đã xác nhận in.");
		// 		window.location.href = '<?php echo route('DrGeneralMedical') ?>';
		// 	} else {
		// 		console.log("Người dùng hủy in hoặc không in.");
		// 	}
		// };
	</script>
</body>

</html>
