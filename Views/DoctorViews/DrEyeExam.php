<?php
$Title = "Dịch vụ khám thị lực"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

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
						<a href="" class="history__item">19/05/2024</a>
						<a href="" class="history__item">17/09/2024</a>
						<a href="" class="history__item">20/11/2024</a>
					</div>
				</div>
				<div class="services__content">
					<div class="services__content--heading">Thông tin cá nhân</div>
					<form class="services__content--form">
						<?php if (isset($_SESSION['getDataPatient'][0]) && $_SESSION['getDataPatient'][0]) {
							echo '
										<div class="form__item">
										<input type="hidden" name="patientID" value="' . $_SESSION['getDataPatient'][0]['ID'] . '">
										<div class="form__item--group">
											<label for="">Mã bệnh nhân:</label>
											<input value="' . $_SESSION['getDataPatient'][0]['ID'] . '" type="text" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Tên bệnh nhân:</label>
											<input disabled type="text" value="' . $_SESSION['getDataPatient'][0]['name'] . '" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Giới tính:</label>
											<input disabled type="text" value="' . $_SESSION['getDataPatient'][0]['gender'] . '" class="form__item--input">
										</div>

									</div>
									<div class="form__item">
										<div class="form__item--group">
											<label for="">Ngày khám:</label>
											<input disabled type="text" value="' . $_SESSION['getDataPatient'][0]['date'] . '" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Dịch vụ khám:</label>
											<input disabled type="text" value="Khám tổng quát" class="form__item--input">
										</div>

										<div class="form__item--group">
											<label for="">Triệu chứng:</label>
											<textarea rows="3" wrap="soft" disabled class="form__item--input" name="" id="">' . $_SESSION['getDataPatient'][0]['symptoms'] . '</textarea>
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
								<label for="">Loại mắt:</label>
								<input type="text" disabled value="Mắt phải" class="form__item--input">
							</div>

							<div class="form__item--group">
								<label for="">Thị lực không kính:</label>
								<input required type="text" class="form__item--input">
							</div>

							<div class="form__item--group">
								<label for="">Thị lực có kính:</label>
								<input required type="text" class="form__item--input">
							</div>
						</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Loại mắt:</label>
								<input type="text" disabled value="Mắt trái" class="form__item--input">
							</div>

							<div class="form__item--group">
								<label for="">Thị lực không kính:</label>
								<input required type="text" class="form__item--input">
							</div>

							<div class="form__item--group">
								<label for="">Thị lực có kính:</label>
								<input required type="text" class="form__item--input">
							</div>
						</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Vận nhãn:</label>
								<select name="" id="" class="form__item--input">
									<option value="binhThuong">Bình thường</option>
									<option value="khongBinhThuong">Không bình thường</option>
								</select>
							</div>

							<div class="form__item--group">
								<label for="">Ánh sáng đồng tử:</label>
								<select name="" id="" class="form__item--input">
									<option value="doiXung">Đối xứng</option>
									<option value="khongDoiXung">Không đối xứng</option>
								</select>
							</div>

							<div class="form__item--group">
								<label for="">Lác mắt:</label>
								<input type="text" class="form__item--input">
							</div>
						</div>

						<div class="form__item">
							<div class="form__item--group">
								<label for="">Kết luận chung:</label>
								<textarea required rows="3" wrap="soft" class="form__item--input" name="" id=""></textarea>
							</div>

							<div class="form__item--group">
								<label for="">Bác sĩ dặn dò:</label>
								<textarea rows="3" wrap="soft" class="form__item--input" name="" id=""></textarea>
							</div>

							<div class="form__item--group">
								<label for="">Ngày hẹn tái khám:</label>
								<input type="date" class="form__item--input">
							</div>
						</div>

						<div class="form__button">
							<button type="button" class="cancel">Hủy bỏ</button>
							<button type="submit" class="submit">Hoàn thành</button>
						</div>
					</form>
				</div>
			</div>
		</article>

		<!-- Sidebar -->
		<?php require_once __DIR__ . "/../DoctorLayouts/DoctorSidebar.php" ?>
	</div>
</div>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../DoctorLayouts/DoctorFooter.php"; ?>
