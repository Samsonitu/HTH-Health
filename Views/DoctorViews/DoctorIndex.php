<?php 
    $Title = "DashBoard"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

    /* Cần nhúng file css nào thì sửa đường dẫn trong phần tử của extraCSS */
    $extraCSS = [                       
        public_dir('css/DoctorCSS/DoctorStyle.css')
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
        <article>
            <form action="">
                <div class="tag--title">Dịch vụ 1</div>
            </form>
        </article>

        <!-- Sidebar -->
        <?php require_once __DIR__ . "/../DoctorLayouts/DoctorSidebar.php" ?>
    </div>
</div>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../DoctorLayouts/DoctorFooter.php"; ?>
