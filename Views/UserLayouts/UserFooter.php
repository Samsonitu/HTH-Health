<h2>Footer</h2>

<?php
    if (!empty($extraJS)) {
        foreach ($extraJS as $js) {
            echo '<script src="' . $js . '"></script>';
        }
    }
?>
</body>
</html>