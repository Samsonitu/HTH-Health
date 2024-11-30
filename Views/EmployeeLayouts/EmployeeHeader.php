<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Title ?? "HTH HEALTH" ?></title>
    <link rel="shortcut icon" href="<?php public_dir('/img/logo/logo-bg-white.png') ?>" type="image/x-icon">
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
            <a href="/"><img src="<?php echo public_dir('img/logo/logo.png') ?>" alt=""></a>
        </div>

        <!-- Navigation -->
        <ul id="nav">
            <li>
                <a href="<?= route('MedicalTicketRoute')?>">
                    <i class="fa-solid fa-notes-medical"></i> 
                    <span>Phiếu khám bệnh</span>
                </a>
            </li>
            <li>
                <a href="<?= route('PatientRecordsRoute')?>">
                    <i class="fa-solid fa-hospital-user"></i> 
                    <span>Hồ sơ bệnh nhân</span>
                </a>
            </li>
            <li>
                <a href="/abc">
                    <i class="fa-solid fa-stethoscope"></i> 
                    <span>Chi tiết dịch vụ</span></a>
                </li>
            <li>
                <a href="/abc">
                    <i class="fa-solid fa-chart-pie"></i> 
                    <span>Báo cáo</span>
                </a>
            </li>
        </ul>
        
        <!-- Avatar -->
        <div id="avatar">
            <i class="fa-solid fa-user"></i>
            <ul id="avatar__subnav">
                <li><b>Bác sĩ</b> <br>Nguyễn Minh Thuyết</li>
                <li><a href=""><i class="fa-regular fa-address-card"></i> Sửa thông tin</a></li>
                <li><a href=""><i class="fa-regular fa-newspaper"></i> Hướng dẫn sử dụng</a></li>
                <li><a href=""><i class="fa-solid fa-power-off"></i> Đăng Xuất</a></li>
            </ul>
        </div>
    </header>