<aside>
	<div class="tag--title" style="margin-top: 20px;">Bệnh nhân đang tiếp nhận</div>
	<div id="receiving--patient__container">
		<!-- <form action="">
			<p class="border-bottom"><span style="font-size: 12px;" id="createAt"></span></p>
			<p class="mt-2" id="patientName"></p>
			<p id="patientCode"></p>
			<p class="mb-2" id="patientServices"></p>
			<p class="border-top pt-2">
				<input name="btnReceptionPatient" type="submit" value="Tiếp nhận" class="btn btn-success py-1 px-1" style="font-size: 13px;">
				<button class="btn btn-danger py-1 px-1" style="font-size: 13px;">Hủy</button>
			</p>
		</form> -->
		<p style="margin: 10px;">Không tiếp nhận bệnh nhân nào</p>

	</div>

	<div class="tag--title" style="margin-top: 20px;">Danh sách bệnh nhân chờ khám</div>
	<div id="waiting--exam__list"></div>

</aside>

<script>
	function loadPatientList() {
		fetch('<?php echo route('GetWaitingExamListRoute') ?>', {
				method: 'GET', // Phương thức HTTP
				headers: {
					'Content-Type': 'application/json'
				}
			})
			.then(response => response.json()) // Chuyển đổi phản hồi sang JSON
			.then(response => {
				if (response.success) {
					renderWaitingExamList(response.data);
				} else {
					alert(response.message);
				}
			})
			.catch(error => {
				console.error('AJAX error:', error);
			});
	}

	// Lần đầu tiên khi trang tải
	document.addEventListener('DOMContentLoaded', loadPatientList);
	setInterval(loadPatientList, 10000);

	let recevingPatientContainer = document.querySelector('#receiving--patient__container');


	function renderWaitingExamList(data) {
		let htmls = [];
		let recevingPatient = <?php if (isset($resultReceptionPatient)) {
														echo $resultReceptionPatient;
													} else {
														echo '""';
													} ?>;
		// console.log(recevingPatient);
		data.forEach(element => {
			if (element.status == 1) {
				recevingPatientContainer.innerHTML = `
								<form action="">
									<p class="border-bottom"><span style="font-size: 12px;" id="createAt">${element.createAt}</span></p>
									<p class="mt-2" id="patientName"><b>Trẻ:</b> ${element.patientName}</p>
									<p id="patientCode"><b>ID:</b> ${element.patientCode}</p>
									<p class="mb-2" id="patientServices"><b>Dịch vụ khám:</b> ${element.serviceNames}</p>
									<p class="border-top pt-2">
										<input name="btnReceptionPatient" type="submit" value="Hoàn thành" class="btn btn-success py-1 px-1" style="font-size: 13px;">
										<button class="btn btn-danger py-1 px-1 btnCancelReception" style="font-size: 13px;">Hủy</button>
									</p>
								</form>
				`;

				return;
			}
			if (element.status != 0) return;
			let html = `
					<form action="<?php echo route('ReceptionPatientRoute') ?>" method="POST">
						<input type="hidden" name="patientCode" value="${element.patientCode}">
						<input type="hidden" name="formID" value="${element.formID}">
						<p class="border-bottom"><span style="font-size: 12px;"> ${element.createAt}</span></p>
						<p class="mt-2"><b>Trẻ:</b> ${element.patientName}</p>
						<p><b>Mã bệnh nhân:</b> ${element.patientCode} </p>
						<p class="mb-2"><b>Dịch vụ khám:</b> ${element.serviceNames}</p>
						<p class="border-top pt-2">
							<input name="btnReceptionPatient" type="submit" value="Tiếp nhận" class="btn btn-success py-1 px-1" style="font-size: 13px;">
							<button class="btn btn-danger py-1 px-1" style="font-size: 13px;">Hủy</button>
						</p>
					</form>
				`;
			htmls.push(html);
		});
		// Now you can join the array and insert it into the DOM
		document.getElementById('waiting--exam__list').innerHTML = htmls.join('');
	}
</script>

<!-- Begin alert message respone from db (*Upgrade to toast message or something else) -->
<?php
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	$messageType = $_SESSION['message_type'];

	// Hiển thị thông báo bằng cách sử dụng JavaScript alert
	echo '
                <script>
                    alert("' . $_SESSION['message'] . '");
                </script>
            ';

	// Xóa thông báo khỏi session để tránh hiển thị lại sau khi refresh trang
	unset($_SESSION['message']);
	unset($_SESSION['message_type']);
}
?>
<!-- End alert message respone from db -->
