<?php

namespace Controllers;

use Models\QueueModel;

class QueueController extends \Core\BaseController
{
    protected string $Model = "QueueModel";
    public function index()
    {
        $queueInfo = $this->Database->getTheQueueNo();
        $listCounterInfo = $this->Database->getCounterStatus();
    
        if (!$queueInfo) {
            $queueNo = 1; 
        } else {
            $queueNo = $queueInfo[0]['queueNo'] + 1; 
        }
    
        view('QueueViews', compact('queueNo', 'listCounterInfo'));
    }

    public function insertQueue() {
        $queueNo = isset($_POST['queueNo']) ? trim($_POST['queueNo']) : null;
        $patientName = isset($_POST['patientName']) ? trim($_POST['patientName']) : null;
        $counterID = isset($_POST['counterID']) ? trim($_POST['counterID']) : null;
        header('Content-Type: application/json');

        if (!$counterID || !$patientName || !$queueNo) {
            echo json_encode([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ. Vui lòng kiểm tra các trường nhập!'
            ]);
            exit;
        }

        $insertNewRowQueueResult = $this->Database->insertNewRowQueue($patientName, $counterID, $queueNo);
        if (!$insertNewRowQueueResult) {
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi cập nhật hàng chờ'
            ]);
            exit;
        }
    
        // Trả về kết quả JSON hợp lệ
        echo json_encode([
            'success' => $insertNewRowQueueResult['success'],
            'message' => $insertNewRowQueueResult['message']
        ]);
        exit;

    }

    public function findAppointmentCode() {
        header('Content-Type: application/json');   
        $input = json_decode(file_get_contents('php://input'), true);
    
        if (!is_array($input) || !isset($input['apptCode']) || !isset($input['arrival'])) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            exit;
        }
    
        $conditions = [
            'apptCode' => isset($input['apptCode']) && !empty($input['apptCode']),
            'arrival' => isset($input['arrival']) && !empty($input['arrival']),
        ];
        foreach ($conditions as $field => $isFieldValid) {
            if (!$isFieldValid) {
                echo json_encode([
                    'success' => false,
                    'message' => ucfirst($field) . ' không hợp lệ.'
                ]);
                exit;
            }
        }
    
        $apptCode = $input['apptCode'];
        $arrival = $input['arrival'];
    
        $appointmentResult = $this->Database->getAppointmentByCode($apptCode, $arrival);
    
        // Nếu không có kết quả trả về
        if (!$appointmentResult) {
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi truy vấn database hoặc mã lịch hẹn không tồn tại'
            ]);
            exit;
        }
    
        // Trả về kết quả JSON hợp lệ
        echo json_encode([
            'success' => $appointmentResult['success'],
            'message' => $appointmentResult['message'],
            'time' => isset($appointmentResult['time']) ? $appointmentResult['time'] : null
        ]);
        exit;
    }

    public function insertAndUpdateAppointment() {
        $queueNo = isset($_POST['queueNo']) ? trim($_POST['queueNo']) : null;
        $apptCode = isset($_POST['apptCode']) ? trim($_POST['apptCode']) : null;
        $counterID = isset($_POST['counterID']) ? trim($_POST['counterID']) : null;
        header('Content-Type: application/json');
        
        if (!$apptCode || !$counterID || !$queueNo) {
            echo json_encode([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ. Vui lòng kiểm tra các trường nhập!'
            ]);
            exit;
        }
    
        $patientName = $this->Database->getPatientNameByApptCode($apptCode);
        $updateStatusAppointmentResult = $this->Database->updateStatusAppointment($apptCode);
        if (!$patientName || !$updateStatusAppointmentResult) {
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi (' . (!$patientName ? "Lỗi tìm kiếm tên bệnh nhân" : "Lỗi cập nhật trạng thái lịch hẹn") . ')'
            ]);
            exit;
        } 
        $insertNewRowQueueResult = $this->Database->insertNewRowQueue($patientName[0]['patientName'], $counterID, $queueNo, $apptCode);
        echo json_encode([
            'success' => $insertNewRowQueueResult['success'],
            'message' => $insertNewRowQueueResult['message']
        ]);
        exit;
    }
    
}