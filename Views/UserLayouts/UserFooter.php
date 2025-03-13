<footer class="footer bg-light pt-4">
    <div class="container">
        <div class="row footer__top">
            <div class="col-lg-3 col-md-6 footer__intro">
                <img src="/public/img/logo/logo-bg-white.jpg" alt="Logo" class="footer__logo mb-2">
                <p class="footer__description">
                    Hệ thống Phòng khám đa khoa HTH được điều hành bởi Công ty TNHH HTH Việt Nam. Những thông tin y khoa trên trang web chỉ dùng để tham khảo.
                </p>
            </div>
            
            <div class="col-lg-3 col-md-6 footer__locations">
                <h5 class="footer__title">Hệ thống phòng khám</h5>
                <ul class="list-unstyled">
                    <li><i class="fa-solid fa-location-dot me-2"></i> Quận 1 - 66-68 Nam Kỳ Khởi Nghĩa, Q.1, TP.HCM</li>
                    <li><i class="fa-solid fa-location-dot me-2"></i> Quận 7 - 105 Tôn Dật Tiên, Q.7, TP.HCM</li>
                    <li><i class="fa-solid fa-location-dot me-2"></i> Tân Bình - 107 Tân Hải, Q. Tân Bình, TP.HCM</li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 footer__schedule">
                <h5 class="footer__title">Lịch làm việc</h5>
                <ul class="list-unstyled">
                    <li>Thứ 2 - Thứ 7 | 8:00 - 17:00</li>
                    <li>Thứ 2 - Thứ 6 | 17:00 - 20:00 (Khám Nhi, Xét nghiệm)</li>
                    <li>Chủ nhật | 8:00 - 12:00 (Khám Nhi, Xét nghiệm)</li>
                    <li>12:00 - 13:00 (Giờ nghỉ trưa)</li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 footer__contact">
                <h5 class="footer__title">Liên hệ</h5>
                <p>Hotline: <strong>1900 0000 - 093 647 7799</strong></p>
                <div class="footer__social d-flex">
                    <i class="fa-brands fa-facebook me-3"></i>
                    <i class="fa-brands fa-tiktok me-3"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
                <div class="footer__policy mt-3">
                    <h6>Chính sách</h6>
                    <p>Chính sách bảo mật</p>
                    <p>Chính sách hoạt động</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__bottom text-center py-3 mt-4 bg-primary text-white">
        <p>* Website cung cấp nội dung thông tin tham khảo, hiệu quả hỗ trợ điều trị phụ thuộc vào thể trạng từng người.</p>
        <p>&copy; 2023 Phòng khám Đa khoa HTH</p>
    </div>
</footer>
<div id="toast__container"></div>
<script src="<?= public_dir('/js/toastMessage.js') ?>"></script>
<?php
include './Views/Partials/toast.php';
if (!empty($extraJS)) {
	foreach ($extraJS as $js) {
		echo '<script src="' . $js . '"></script>';
	}
}
?>
</body>
</html>
