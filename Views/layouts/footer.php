<script src="<?= public_dir('js/script.js') ?>"></script>
<?php
    if (!empty($extraJS)) {
        foreach ($extraJS as $js) {
            echo '<script src="' . $js . '">';
        }
    }
?>
</body>
</html>