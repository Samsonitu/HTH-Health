<footer>
</footer>
<?php
if (!empty($extraJS)) {
	foreach ($extraJS as $js) {
		echo '<script src="' . $js . '"></script>';
	}
}
?>
</body>

</html>
