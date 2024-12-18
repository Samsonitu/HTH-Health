<?php

namespace Models;

use Core\Model;

class QueueModel extends Model
{
    public function getTheQueueNo()
    {
        $Query = "SELECT * FROM queues
                WHERE DATE(assignedTime) = CURRENT_DATE()
                ORDER BY assignedTime DESC LIMIT 1";
        return $this->SelectRow($Query);
    }

    public function getCounterStatus() {
        $Query = "SELECT
            c.counterID,
            c.counterName,
            COUNT(CASE 
                WHEN DATE(q.assignedTime) = CURDATE() AND q.status = 0 THEN 1
                ELSE NULL
            END) AS currentQueueCount
        FROM
            counters AS c
        LEFT JOIN
            queues AS q ON c.counterID = q.counterID
        GROUP BY
            c.counterID, c.counterName";
        return $this->SelectRow($Query);
    }

    public function insertNewRowQueue($patientName, $counterID, $queueNo, $apptCode = null) {
        $Query = "INSERT INTO `queues`
        (`counterID`, `apptCode`, `patientName`, `queueNo`, `status`, `assignedTime`) 
        VALUES 
        ('.$counterID.','.$apptCode.','.$patientName.','.$queueNo.','0', NOW())";
        $result = $this->InsertRow($Query);
        if($result) {
            return ['success'=> true, 'message' => 'Cập nhật hàng chờ thành công!'];
        }
        return ['success'=> false, 'message' => 'Cập nhật hàng chờ thất bại!'];
    }

    public function getAppointmentByCode($apptCode, $arrival) {
        $Query = "SELECT * FROM appointments as a 
            WHERE a.apptCode = '$apptCode';";
        $result = $this->SelectRow($Query);
    
        if ($result) {
            $apptTime = strtotime($result[0]['apptTime']);  
            $currentDate = strtotime(date('Y-m-d')); // Ngày hiện tại tính từ hệ thống
            $apptDate = strtotime(date('Y-m-d', $apptTime)); // Chỉ lấy phần ngày của apptTime
            $arrivalTime = strtotime($arrival);  
            $timeDifference = $arrivalTime - $apptTime; // Khoảng cách tính bằng giây
    
            // Kiểm tra nếu lịch hẹn đã quá hạn
            if ($currentDate > $apptDate) {
                $daysOverdue = round(($currentDate - $apptDate) / (60 * 60 * 24)); // Số ngày đã quá hạn
                return [
                    'success' => false,
                    'message' => "Lịch hẹn đã quá hạn $daysOverdue ngày!",
                    'daysOverdue' => $daysOverdue
                ];
            }
    
            if($result[0]['status'] == '1') {
                return [
                    'success' => false,
                    'message' => "Mã lịch hẹn đã được sử dụng"
                ];
            }
    
            // Kiểm tra nếu bệnh nhân đến sớm hơn nhưng không quá 20 phút
            if ($timeDifference < 0 && abs($timeDifference) < 20 * 60) { // Sớm hơn 20 phút (chấp nhận)
                return [
                    'success' => true,
                    'message' => 'Bệnh nhân đến sớm hơn so với lịch hẹn nhưng không quá 20 phút!',
                    'time' => abs(round($timeDifference / 60)) // Đổi ra phút
                ];
            } 
    
            // Kiểm tra nếu bệnh nhân đến sớm hơn quá 20 phút (không được phép)
            if ($timeDifference < 0 && abs($timeDifference) >= 20 * 60) { 
                return [
                    'success' => false,
                    'message' => 'Bệnh nhân đến sớm hơn quá 20 phút so với lịch hẹn! Vui lòng đợi thêm.',
                    'time' => abs(round($timeDifference / 60))
                ];
            }
    
            // Kiểm tra bệnh nhân đến trễ nhưng vẫn trong ngày
            if ($timeDifference > 0 && $apptDate == $currentDate) {
                if ($timeDifference <= 20 * 60) { // Trễ không quá 20 phút
                    return [
                        'success' => true,
                        'message' => 'Bệnh nhân đến trễ nhưng không quá 20 phút.',
                        'time' => round($timeDifference / 60) // Đổi ra phút
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => 'Bệnh nhân đến trễ hơn 20 phút so với lịch hẹn!',
                        'time' => round($timeDifference / 60)
                    ];
                }
            }
    
            // Kiểm tra trường hợp hợp lệ
            return ['success' => true, 'message' => 'Mã lịch hẹn hợp lệ!'];
        } 
    
        // Trường hợp không tìm thấy mã lịch hẹn
        return ['success' => false, 'message' => 'Mã lịch hẹn không tồn tại!'];
    }
    
    

    public function getPatientNameByApptCode($apptCode) {
        $Query = "SELECT p.patientName
        FROM patient as p
        WHERE p.patientID = (SELECT a.patientID FROM appointments as a WHERE a.apptCode = '$apptCode')";
        return $this->SelectRow($Query);
    }
    
    
    public function updateStatusAppointment($apptCode) {
        $Query = "UPDATE appointments as a
            SET a.status = 1
            WHERE a.apptCode = '$apptCode'
        ";
        return $this->UpdateRow($Query, []);
    }
}