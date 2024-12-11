<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\ReceptionPatientModel;

class ReceptionPatient extends \Core\BaseController
{
	protected string $Model = "DoctorModels\ReceptionPatientModel";

	public function ReceptionPatient()
	{

		if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
			$check = $this->Database->getReceptionPatient();
			if ($check) {
				$_SESSION['getListPatient'] = $check;

				ob_start();
				foreach ($check as $patient) {
					echo '<form action="' . route('DrGetPatientID') . '" method="POST">';
					echo '<input type="hidden" name="patientID" value="' . htmlspecialchars($patient['patientID']) . '">';
					echo '<input type="hidden" name="medicalID" value="' . htmlspecialchars($patient['medicalID']) . '">';
					echo '<p class="border-bottom"><span style="font-size: 12px;">' . htmlspecialchars($patient['medicalDate']) . '</span></p>';
					echo '<p class="mt-2"><b>Trẻ:</b> ' . htmlspecialchars($patient['patientName']) . '</p>';
					echo '<p><b>ID:</b> (#' . htmlspecialchars($patient['patientID']) . ')</p>';
					echo '<p class="mb-2"><b>Dịch vụ khám:</b> ' . htmlspecialchars($patient['serviceNames']) . '</p>';
					echo '<p class="border-top pt-2">';
					echo '<input name="submitID" type="submit" value="Tiếp nhận" class="btn btn-success py-1 px-1" style="font-size: 13px; margin-right: 5px">';
					echo '<button class="btn btn-danger py-1 px-1" style="font-size: 13px;">Hủy</button>';
					echo '</p>';
					echo '</form>';
				}
				$html = ob_get_clean();

				echo $html;
			} else {
				echo '<p>Không có bệnh nhân nào chờ khám.</p>';
			}
		}
	}
}
