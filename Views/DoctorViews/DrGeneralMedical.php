<?php
$Title = "Dịch vụ khám tổng quát"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

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

<!-- Code phần main ở đây -->
<div class="container-fuild">
	<div class="d-flex" style="min-height: 85vh;">
		<!-- Article -->
		<article class="services">
			<div class="services__container">
				<div class="services__sidebar ">
					<div class="heading">Lịch sử khám bệnh</div>
					<div class="history__list">
						<a href="" class="history__item">11/03/2024</a>
						<a href="" class="history__item">12/04/2024</a>
						<a href="" class="history__item">14/05/2024</a>
					</div>
				</div>
				<div class="services__content">
					<script>
						console.log(<?= json_encode($_SESSION['resultDataPatient']) ?>)
					</script>
					<div class="services__content--heading">Thông tin cá nhân</div>
					<form class="services__content--form" action=" <?php echo route('DrGeneralMedical') ?>" method="POST">
						<?php if (isset($_SESSION['resultDataPatient']) && $_SESSION['resultDataPatient']) {
							echo '
										<div class="form__item">
										<input type="hidden" name="patientCode" value="' . $_SESSION['resultDataPatient'][0]['patientCode'] . '">
										<input type="hidden" name="formID" value="' . $_SESSION['resultDataPatient'][0]['formID'] . '">
										<div class="form__item--group">
											<label for="">Mã bệnh nhân:</label>
											<input disabled value="' . $_SESSION['resultDataPatient'][0]['patientCode'] . '" type="text" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Tên bệnh nhân:</label>
											<input disabled type="text" value="' . $_SESSION['resultDataPatient'][0]['patientName'] . '" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Giới tính:</label>
											<input style="" disabled type="text" value="' . $_SESSION['resultDataPatient'][0]['patientGender'] . '" class="form__item--input">
										</div>

									</div>
									<div class="form__item">
										<div class="form__item--group">
											<label for="">Ngày khám:</label>
											<input disabled type="text" value="' . $_SESSION['resultDataPatient'][0]['createAt'] . '" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Dịch vụ khám:</label>
											<input disabled type="text" value="Khám tổng quát" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Triệu chứng:</label>
											<textarea rows="3" wrap="soft" disabled class="form__item--input" name="" id="">' . $_SESSION['resultDataPatient'][0]['symptom'] . '</textarea>
										</div>
									</div>
							';
						} else {
							$currentDate = date('m/d/Y');
							echo '
						 				<div class="form__item">
						 				<input type="hidden" name="patientID" value="">
						 				<div class="form__item--group">
						 					<label for="">Mã bệnh nhân:</label>
						 					<input disabled name="" value="" type="text" class="form__item--input">
						 				</div>

						 				<div class="form__item--group">
						 					<label for="">Tên bệnh nhân:</label>
						 					<input disabled type="text" value="" class="form__item--input">
						 				</div>

						 				<div class="form__item--group">
						 					<label for="">Giới tính:</label>
						 					<input disabled type="text" value="" class="form__item--input">
						 				</div>

						 			</div>
						 			<div class="form__item">
						 				<div class="form__item--group">
						 					<label for="">Ngày khám:</label>
						 					<input disabled type="text" value="' . $currentDate . '" class="form__item--input">
						 				</div>

						 				<div class="form__item--group">
						 					<label for="">Dịch vụ khám:</label>
						 					<input disabled type="text" value="Khám tổng quát" class="form__item--input">
						 				</div>

						 				<div class="form__item--group">
						 					<label for="">Triệu chứng:</label>
						 					<textarea rows="3" wrap="soft" disabled class="form__item--input" name="" id=""></textarea>
						 				</div>
						 			</div>
						 	';
						}
						?>




						<div class="services__content--heading mt-3">Thông tin khám bệnh</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Huyết áp:</label>
								<input name="bloodPressure" type="text" required class="form__item--input" tabindex="1">
							</div>

							<div class="form__item--group">
								<label for="">Nhịp tim:</label>
								<input name="heartRate" type="text" required class="form__item--input" tabindex="2">
							</div>

							<div class="form__item--group">
								<label for="">Nhiệt độ (C):</label>
								<input name="temperature" type="text" required class="form__item--input" tabindex="3">
							</div>
						</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Chức năng hô hấp:</label>
								<input name="respiratoryFunction" type="text" required class="form__item--input" tabindex="4">
							</div>

							<div class="form__item--group">
								<label for="">Cholesterol:</label>
								<input name="cholesterol" type="text" required class="form__item--input" tabindex="5">
							</div>

							<div class="form__item--group">
								<label for="">Đường huyết:</label>
								<input name="bloodSugar" type="text" required class="form__item--input" tabindex="6">
							</div>
						</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Chiều cao (cm):</label>
								<input name="height" type="text" required class="form__item--input" tabindex="7">
							</div>

							<div class="form__item--group">
								<label for="">Cân nặng (kg):</label>
								<input name="weight" type="text" required class="form__item--input" tabindex="8">
							</div>

							<div class="form__item--group">
								<label for="">BMI (kg/m):</label>
								<input name="bmi" type="text" required class="form__item--input" tabindex="9">
							</div>
						</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Vòng ngực:</label>
								<input name="chestMeasurement" type="text" class="form__item--input" tabindex="10">
							</div>

							<div class="form__item--group">
								<label for="">Vòng bụng:</label>
								<input name="waistMeasurement" type="text" class="form__item--input" tabindex="11">
							</div>

							<div class="form__item--group">
								<label for="">Vòng đùi:</label>
								<input name="thighMeasurement" type="text" class="form__item--input" tabindex="12">
							</div>
						</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Kết luận chung:</label>
								<textarea name="generalConclusion" required rows="3" wrap="soft" class="form__item--input" tabindex="13"></textarea>
							</div>

							<div class="form__item--group">
								<label for="">Bác sĩ dặn dò:</label>
								<textarea name="doctorInstructions" required rows="3" wrap="soft" class="form__item--input" tabindex="14"></textarea>
							</div>

							<div class="form__item--group">
								<label for="">Ngày hẹn tái khám:</label>
								<input name="followUpAppointmentDate" type="date" class="form__item--input" tabindex="15">
							</div>
						</div>

						<div class="form__button">
							<button type="reset" class="cancel" tabindex="16">Hủy bỏ</button>
							<button name="btnInsertData" type="submit" value="Hoàn thành" class="submit" tabindex="17">Hoàn thành</button>
						</div>


					</form>
				</div>
			</div>
		</article>

		<script>
			document.querySelector('.submit').addEventListener('click', function(event) {
				const form = document.querySelector('.services__content--form');

				// Kiểm tra tính hợp lệ của form
				if (form.checkValidity()) {
					const isConfirmed = confirm("Bạn đã kiểm tra kỹ thông tin chưa?");
					if (!isConfirmed) {
						// Hủy submit nếu chọn "Cancel"
						event.preventDefault();
					}
				}
			});

			document.querySelector('.cancel').addEventListener('click', function(event) {
				const isConfirmed = confirm("Bạn có chắc chắn muốn hủy bỏ toàn bộ dữ liệu đã nhập?");
				if (!isConfirmed) {
					event.preventDefault();
				} else {
					console.log("Hủy bỏ đã được xác nhận.");
					window.location.href = '<?php echo route('DrGeneralMedical') ?>';
				}
			});
		</script>

		<!-- Sidebar -->
		<?php require_once __DIR__ . "/../DoctorLayouts/DoctorSidebar.php" ?>
	</div>
</div>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../DoctorLayouts/DoctorFooter.php"; ?>
