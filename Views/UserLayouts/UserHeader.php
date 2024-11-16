<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Title ?? "HTH HEALTH" ?></title>
    <link rel="shortcut icon" href="<?php public_dir('img/logo/log-bg-white.png') ?>" type="image/x-icon">
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
    <h2>Header</h2>