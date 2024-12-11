<aside>
	<div class="tag--title" style="margin-top: 20px;">Bệnh nhân đang tiếp nhận</div>
	<form action="">
		<?php if (isset($_SESSION['patientPresent']) && $_SESSION['patientPresent'][0]['status'] == 1) {
			echo '
							<p class="border-bottom"><span style="font-size: 12px;">' . $_SESSION['patientPresent'][0]['date'] . '</span></p>
							<p class="mt-2"><b>Trẻ:</b> ' . $_SESSION['patientPresent'][0]['name'] . '</p>
							<p><b>ID:</b> (#' . $_SESSION['patientPresent'][0]['ID'] . ')</p>
							<p class="mb-2"><b>Dịch vụ khám:</b> ' . $_SESSION['patientPresent'][0]['serviceNames'] . '</p>
			';
		} else {
			echo 'Không tiếp nhận bệnh nhân nào';
		} ?>

	</form>

	<div class="tag--title" style="margin-top: 20px;">Danh sách bệnh nhân chờ khám</div>
	<div id="patient-list">
		<?php if (isset($_SESSION['getListPatient']) && !empty($_SESSION['getListPatient'])): ?>
			<?php foreach ($_SESSION['getListPatient'] as $patient): ?>
				<form action="<?php echo route('DrGetPatientID'); ?>" method="POST">
					<input type="hidden" name="patientID" value="<?php echo $patient['patientID']; ?>">
					<p class="border-bottom"><span style="font-size: 12px;"><?php echo $patient['medicalDate']; ?></span></p>
					<p class="mt-2"><b>Trẻ:</b> <?php echo $patient['patientName']; ?></p>
					<p><b>ID:</b> (#<?php echo $patient['patientID']; ?>)</p>
					<p class="mb-2"><b>Dịch vụ khám:</b> <?php echo $patient['serviceNames']; ?></p>
					<p class="border-top pt-2">
						<input name="submitID" type="submit" value="Tiếp nhận" class="btn btn-success py-1 px-1" style="font-size: 13px;">
						<button class="btn btn-danger py-1 px-1" style="font-size: 13px;">Hủy</button>
					</p>
				</form>
			<?php endforeach; ?>
		<?php else: ?>
			<p>Không có bệnh nhân nào chờ khám.</p>
		<?php endif; ?>

	</div>
</aside>

<script>
	function loadPatientList() {
		fetch('/receptionPatient', {
				headers: {
					'X-Requested-With': 'XMLHttpRequest' // Header xác định AJAX request
				}
			})
			.then(response => response.text())
			.then(html => {
				// Cập nhật nội dung danh sách bệnh nhân
				document.querySelector('#patient-list').innerHTML = html;
			})
			.catch(error => console.error('Error:', error));
	}

	// Lần đầu tiên khi trang tải
	document.addEventListener('DOMContentLoaded', loadPatientList);

	// Lặp lại sau mỗi 10 giây
	setInterval(loadPatientList, 10000);
</script>
