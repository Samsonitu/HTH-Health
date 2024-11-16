<?php 
    $Title = "Trang chủ"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

    /* Cần nhúng file css nào thì sửa đường dẫn trong phần tử của extraCSS */
    $extraCSS = [                       
        public_dir('css/UserCSS/style.css')
    ];

    /* Cần nhúng file js nào thì sửa đường dẫn trong phần tử của extraJS */
    $extraJS = [
        public_dir('js/UserJS/script.js')
    ];
?>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../UserLayouts/UserHeader.php"; ?>

<!-- Code phần main ở đây -->
<h2>Code Phần main</h2>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
