<?php 
    $Title = "DashBoard"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

    /* Cần nhúng file css nào thì sửa đường dẫn trong phần tử của extraCSS */
    $extraCSS = [                       
        public_dir('css/EmployeeCSS/EmployeeStyle.css')
    ];

    /* Cần nhúng file js nào thì sửa đường dẫn trong phần tử của extraJS */
    $extraJS = [
        public_dir('js/EmployeeJS/EmployeeScript.js')
    ];
?>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeHeader.php"; ?>

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
        <?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeSidebar.php" ?>
    </div>
</div>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeFooter.php"; ?>
