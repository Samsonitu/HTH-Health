<?php

$Title = "Đặt lịch khám";

$extraCSS = [public_dir('css/UserCSS/style.css')];
$extraJS = [public_dir('js/UserJS/script.js')];
?>

<?php require_once __DIR__ . "/../UserLayouts/UserHeader.php"; ?>

<div class="container">
	<form action="<?= route('AppointmentRoute') ?>" method="post" class="AppointmentForm">
		<div class="title-form">
			<h2>ĐĂNG KÝ KHÁM</h2>
			<p>vui lòng điền thông tin vào form bên dưới để đẩ đăng ký khám bệnh theo yêu cầu</p>
		</div>
		<div class="form-Appointment">
			<div class="Note-info">
				<h4>Lưu ý</h4>
				<p>1. Lịch hẹn có hiệu lực sau khi có xác nhận chính thức từ Phòng khám HTH</p>
				<p>2. Quý khánh hàng vui lòng cung cấp thông tin chính xác để được phục vụ tốt nhất. Trong trường hợp cung cấp sai thông tin email &amp; điện thoại, việc xác nhận cuộc hẹn sẽ không hiệu lực.</p>
				<p>3. Quý khách sử dụng dịch vụ đặt hẹn trực tuyến, xin vui lòng đặt trước ít nhất là 24 giờ trước khi đến khám.</p>
				<p>4. Trong trường hợp khẩn cấp hoặc nghi ngờ có các triệu chứng nguy hiểm, quý khách vui lòng ĐẾN TRỰC TIẾP Phòng khám hoặc các trung tâm y tế gần nhất để kịp thời xử lý.</p>
			</div>
			<div class="Form-info">
				<div class="f-i patient-info">
					<div class="p-g name">
						<label>Tên bệnh nhân:</label><br>
						<input type="text" name="patientName">
					</div>
					<div class="birth-gen">
						<div class="p-g birthday">
							<label>Ngày sinh:</label>
							<input type="date" name="patientBirthday">
						</div>
						<div class="p-g gender">
							<label>Giới tính: </label>
							<input id="patientMan" type="radio" name="patientGender" value="1"><label for="patientMan">Nam</label>
							<input id="patientWoman" type="radio" name="patientGender" value="0"><label for="patientWoman">Nữ</label>
						</div>
					</div>

				</div>

				<div class="f-i guardian-info">
					<div class="p-g name">
						<label>Tên người bảo hộ:</label><br>
						<input type="text" name="guardianName">
					</div>
					<div class="birth-gen">
						<div class="p-g birthday">
							<label>Ngày sinh:</label>
							<input type="date" name="guardianBirthday">
						</div>
						<div class="p-g gender">
							<label>Giới tính: </label>
							<input id="guardianMan" type="radio" name="guardianGender" value="1"><label for="guardianMan">Nam</label>
							<input id="guardianWoman" type="radio" name="guardianGender" value="0"><label for="guardianWoman">Nữ</label>
						</div>
					</div>
					<div class="p-g phone">
						<label>Số điện thoại:</label><br>
						<input type="tel" name="phoneNumber">
					</div>
					<div class="p-g address">
						<label>Địa chỉ:</label><br>
						<textarea name="address" rows="4"></textarea>
					</div>
				</div>

				<div class="manifest-patient">
					<label>Triệu chứng - Biểu hiện:</label>
					<textarea name="symptom" class="symptom" rows="6"></textarea>
				</div>

				<div class="service-exam">
					<div class="exam">
						<div class="day-exam">
							<label for="datetime-exam">Ngày khám:</label>
							<input type="date" name="examinationDate" id="" class="date">
							<input type="time" name="examinationTime" id="" class="time">
						</div>
						<h5 class="exam-selected exam-choice">Chọn dịch vụ khám:</h5>
						<div class="box-select">
							<div class="sv sv1">
								<input type="checkbox" id="sv1" name="serviceIDs[]" value="sv1">
								<label for="sv1">Khám tâm lý</label>
							</div>
							<div class="sv sv2">
								<input type="checkbox" id="sv2" name="serviceIDs[]" value="sv2">
								<label for="sv2">Khám não</label>
							</div>
							<div class="sv sv3">
								<input type="checkbox" id="sv3" name="serviceIDs[]" value="sv3">
								<label for="sv3">Khám xương</label>
							</div>
							<div class="sv sv4">
								<input type="checkbox" id="sv4" name="serviceIDs[]" value="sv4">
								<label for="sv4">Khám phổi</label>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-sign-Appointment">
					<input type="submit" class="btn btn-sign" name="btnRegisterExamination" value="Đăng ký">
				</div>

			</div>
		</div>

	</form>
</div>

<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
