<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Title ?? "HTH HEALTH" ?></title>
    <link rel="shortcut icon" href="<?= public_dir('img/logo/logo-bg-white.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= public_dir('css/QueueStyle.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <div class="text-center mb-1">
            <img src="<?= public_dir('img/logo/logo.png') ?>" width="60px" height="60px" alt="">
            <h5 id="slogan">Bác sĩ riêng của bạn</h5>
        </div>
        <h2 class="text-center mb-4" style=""><b>TIẾP NHẬN BỆNH NHÂN</b></h2>
        <div class="tabs">
            <div class="tab-item active">
                <i class="fa fa-user-plus"></i>
                Đến lần đầu
            </div>
            <div class="tab-item">
                <i class="fa fa-file-alt"></i>
                Đã có hồ sơ (Chưa đặt lịch)
            </div>
            <div class="tab-item">
                <i class="fa fa-calendar-check"></i>
                Đã có hồ sơ (Đã đặt lịch)
            </div>
            <div class="line"></div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
            <div class="tab-pane active">
                <h3>Đến Lần Đầu</h3>
                <div class="alert alert-info">
                    <strong>Hướng dẫn:</strong> Hệ thống sẽ cấp số thứ tự cho lần đầu đến khám.
                </div>
                <div class="mb-3">
                    <label for="preview-stt" class="form-label">Số Thứ Tự</label>
                    <input type="text" id="preview-stt" class="form-control" value="12345" readonly>
                </div>
                <button class="btn btn-primary w-100">In Phiếu</button>
            </div>
            <div class="tab-pane">
                <h3>Đã Có Hồ Sơ (Chưa Đặt Lịch)</h3>
                <div class="alert alert-warning">
                    <strong> Hướng dẫn:</strong> Nhập mã bệnh nhân để kiểm tra thông tin và cấp số thứ tự.
                </div> 
                <form> 
                    <div class="mb-3"> 
                        <label for="patient-code" class="form-label">Mã Bệnh Nhân</label> 
                        <input type="text" id="patient-code" class="form-control" placeholder="Nhập mã bệnh nhân"> 
                    </div> 
                    <button type="button" class="btn btn-secondary w-100 mb-3">Kiểm Tra</button> 
                </form> 
                <div class="mb-3"> 
                    <label for="preview-stt-profile" class="form-label">Số Thứ Tự</label> 
                    <input type="text" id="preview-stt-profile" class="form-control" value="67890" readonly> 
                </div> 
                <button class="btn btn-primary w-100">In Phiếu</button> 
            </div>
            <div class="tab-pane">
                <h3>Đã Có Hồ Sơ (Đã Đặt Lịch)</h3>
                <div class="alert alert-success">
                    <strong>Hướng dẫn:</strong> Nhập mã lịch hẹn và mã bệnh nhân để kiểm tra thông tin và cấp số thứ tự.</div>
                <form>
                    <div class="mb-3">
                        <label for="schedule-code" class="form-label">Mã Lịch Hẹn</label>
                        <input type="text" id="schedule-code" class="form-control" placeholder="Nhập mã lịch hẹn">
                    </div>
                    <div class="mb-3">
                        <label for="patient-code-schedule" class="form-label">Mã Bệnh Nhân</label>
                        <input type="text" id="patient-code-schedule" class="form-control" placeholder="Nhập mã bệnh nhân">
                    </div>
                    <button type="button" class="btn btn-secondary w-100 mb-3">Kiểm Tra</button>
                </form>
                <div class="mb-3">
                    <label for="preview-stt-schedule" class="form-label">Số Thứ Tự</label>
                    <input type="text" id="preview-stt-schedule" class="form-control" value="34567" readonly>
                </div>
                <button class="btn btn-primary w-100">In Phiếu</button>
            </div>
        </div>
    </div>
    <script src="<?= public_dir('js/QueueScript.js') ?>"></script>
</body>
</html>