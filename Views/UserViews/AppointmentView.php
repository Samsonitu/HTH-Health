<?php

$Title = "Đặt lịch khám";

$extraCSS = [public_dir('css/UserCSS/style.css')];
$extraJS = [public_dir('js/UserJS/script.js')];
?>

<?php require_once __DIR__ . "/../UserLayouts/UserHeader.php"; ?>


<div class="container">
	<form action="<?= route('AppointmentRoute') ?>" method="POST" class="AppointmentForm">

		<div class="form-Appointment">

			<div class="Note-info">
				<h4>Lưu ý</h4>
				<p>1. Lịch hẹn có hiệu lực sau khi có xác nhận chính thức từ Phòng khám HTH</p>
				<p>2. Quý khánh hàng vui lòng cung cấp thông tin chính xác để được phục vụ tốt nhất. Trong trường hợp cung cấp sai thông tin email &amp; điện thoại, việc xác nhận cuộc hẹn sẽ không hiệu lực.</p>
				<p>3. Quý khách sử dụng dịch vụ đặt hẹn trực tuyến, xin vui lòng đặt trước ít nhất là 24 giờ trước khi đến khám.</p>
				<p>4. Trong trường hợp khẩn cấp hoặc nghi ngờ có các triệu chứng nguy hiểm, quý khách vui lòng ĐẾN TRỰC TIẾP Phòng khám hoặc các trung tâm y tế gần nhất để kịp thời xử lý.</p>
			</div>
			<div class="Form-info">

				<div class="title-form">
					<h2>ĐẶT LỊCH KHÁM</h2>
					<p>vui lòng điền thông tin vào form bên dưới để đẩ đăng ký khám bệnh theo yêu cầu</p>
				</div>
				<div class="open-form register" id="register">
					<div class="f-i patient-info">
						<div class="p-g patientID">
							<label>Mã bệnh nhân(nếu có):</label><br>
							<input type="text" name="apptCode">
						</div>
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
					<div class="manifest-patient">
						<label>Triệu chứng - Biểu hiện:</label>
						<textarea name="manifest" class="manifest" rows="6"></textarea>
					</div>
					<hr>
					<div class="f-i guardian-info">
						<div class="p-g name">
							<label>Tên người bảo hộ:</label><br>
							<input type="text" name="guardianName">
						</div>
						<div class="p-g phone">
							<label>Số điện thoại:</label><br>
							<input type="tel" name="phoneNumber">
						</div>
					</div>
					<hr>
					<div class="f-i AppointmentTime">
						<div class="Time">
							<label>Thời gian đặt lịch:</label><br>
							<input type="date" name="apptDate">
							<input type="time" name="apptTime">
						</div>
					</div>



				</div>
				<div class="btn-sign-Appointment">
					<input type="submit" class="btn-sign" name="btnRegisterExamination" value="Đặt lịch">
				</div>
			</div>
		</div>

	</form>
</div>
<?php
if (isset($flag) && $flag == 1) {
	echo "

		";
} elseif (isset($flag) && $flag == 0) {
	echo "

		";
}
?>

<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
