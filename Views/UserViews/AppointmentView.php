<?php

$Title = "Đặt Lịch Khám | HTH Health";

$extraCSS = [
	public_dir('css/UserCSS/style.css'), 
	public_dir('css/UserCSS/appointment.css')
];
$extraJS = [public_dir('js/UserJS/script.js')];
?>

<?php require_once __DIR__ . "/../UserLayouts/UserHeader.php"; ?>

<div class="container">
    <div class="appointment">
        <!-- Tiêu đề -->
        <div class="text-center mb-4">
            <h2 class="appointment__title">ĐẶT LỊCH KHÁM</h2>
            <p class="appointment__description">Vui lòng điền thông tin vào form bên dưới</p>
        </div>

        <form action="<?= route('UserAppointmentRoute') ?>" method="POST" class="appointment__form">
            <div class="row">
                <!-- Cột trái -->
                <div class="col-md-6">
                    <div class="section-title">Thông tin bệnh nhân</div>
                    
                    <div class="mb-3">
                        <label for="patientCode" class="form-label">Mã bệnh nhân (nếu có):</label>
                        <input type="text" class="form-control" id="patientCode" name="patientCode">
                    </div>

                    <div class="mb-3">
                        <label for="patientName" class="form-label">Tên bệnh nhân:</label>
                        <input type="text" class="form-control" id="patientName" name="patientName" required>
                    </div>

                    <div class="mb-3">
                        <label for="patientBirthday" class="form-label">Ngày sinh:</label>
                        <input type="date" class="form-control" id="patientBirthday" name="patientBirthday" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Giới tính:</label>
                        <div class="gender-options">
                            <div class="gender-option">
                                <input type="radio" id="patientMan" name="patientGender" value="man" required>
                                <label for="patientMan">Nam</label>
                            </div>
                            <div class="gender-option">
                                <input type="radio" id="patientWoman" name="patientGender" value="woman">
                                <label for="patientWoman">Nữ</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="symptom" class="form-label">Triệu chứng - Biểu hiện:</label>
                        <textarea id="symptom" name="symptom" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                
                <!-- Cột phải -->
                <div class="col-md-6">
                    <div class="section-title">Thông tin người bảo hộ</div>
                    
                    <div class="mb-3">
                        <label for="guardianName" class="form-label">Tên người bảo hộ:</label>
                        <input type="text" class="form-control" id="guardianName" name="guardianName" required>
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Số điện thoại:</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                    </div>

                    <div class="section-title mt-4">Thời gian đặt lịch</div>
                    
                    <div class="mb-3">
                        <label for="apptDate" class="form-label">Ngày đặt lịch:</label>
                        <input type="date" class="form-control" id="apptDate" name="apptDate" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="apptTime" class="form-label">Giờ khám:</label>
                        <input type="time" class="form-control" id="apptTime" name="apptTime" required>
                    </div>
                </div>
            </div>

            <!-- Nút gửi -->
            <div class="text-center mt-4">
                <button type="submit" class="btn text-light" 
                    name="btnRegisterExamination" value="SubmitRegister"
                    style="width: 50%; background-color: var(--main-color);">Đặt lịch</button>
            </div>
        </form>
        <!-- Lưu ý -->
        <div class="appointment__note">
            <h4 class="appointment__note-title">Lưu ý</h4>
            <p>1. Lịch hẹn có hiệu lực sau khi có xác nhận chính thức từ Phòng khám HTH.</p>
            <p>2. Quý khách vui lòng cung cấp thông tin chính xác để được phục vụ tốt nhất.</p>
            <p>3. Xin vui lòng đặt lịch ít nhất 24 giờ trước khi đến khám.</p>
            <p>4. Trong trường hợp khẩn cấp, vui lòng đến trực tiếp phòng khám.</p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
