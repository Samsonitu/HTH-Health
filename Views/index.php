<?php 
    $Title = "Home Page"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

    /* Cần nhúng file css nào thì sửa đường dẫn trong phần tử của extraCSS */
    $extraCSS = [                       
        public_dir('css/style.css')
    ];

    /* Cần nhúng file js nào thì sửa đường dẫn trong phần tử của extraJS */
    $extraJS = [
        public_dir('js/script.js')
    ];
?>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "../layouts/header.php"; ?>

<!-- Code phần main ở đây -->
<h2>Alo</h2>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "../layouts/footer.php"; ?>
