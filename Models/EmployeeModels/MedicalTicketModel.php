<?php

namespace Models\EmployeeModels;

use Core\Model;

class MedicalTicketModel extends Model
{
    public function getListServices()
    {
        $Query = "SELECT * 
            FROM services
        ";
        return $this->SelectRow($Query);
    }

    public function getlistPatientGuardianInfo()
    {
        $Query = "SELECT p.*, g.*
            FROM patient AS p 
            INNER JOIN guardian AS g ON g.guardianID = p.guardianID; 
        ";

        return $this->SelectRow($Query);
    }

    public function getTheQueueListByCounterID($counterID)
    {
        $Query = "SELECT * 
            FROM queues WHERE DATE(assignedTime) = CURDATE() AND status != 2 AND status != -1 AND counterID = '$counterID';
        ";
        return $this->SelectRow($Query);
    }

    public function getListAppointment() 
    {
        $Query = "SELECT a.*, ad.*
            FROM appointments as a
            INNER JOIN appointment_details as ad on a.apptID = ad.apptID
            WHERE a.status = 1 AND DATE(a.apptTime) = CURRENT_DATE(); 
        ";
        return $this->SelectRow($Query);
    }

    public function receiveQueue($queueID, $queueNo) 
    {
        $Query = "UPDATE queues 
            SET status = 1
            WHERE queueID = '$queueID' AND queueNo = '$queueNo'
        ";
        return $this->UpdateRow($Query, []);
    }

    public function cancelQueueReception($queueID, $queueNo)
    {
        $Query = "UPDATE queues 
            SET status = -1
            WHERE queueID = '$queueID' AND queueNo = '$queueNo'
        ";
        return $this->UpdateRow($Query, []);
    }

    public function getDoctorInfo($roomID = null) 
    {
        $Query = "SELECT * 
            FROM doctor
            WHERE 1 
        ";
        if($roomID) {
            $Query . "AND roomID = '$roomID'";
        }
        return $this->SelectRow($Query);    
    }

    public function completeQueue($queueID, $queueNo)
    {
        $Query = "UPDATE queues 
        SET status = 2
        WHERE queueID = '$queueID' AND queueNo = '$queueNo'
        ";
        return $this->UpdateRow($Query, []);
    }

    public function countPatientWaitExamined() {
        $Query = "SELECT d.doctorName, d.doctorCode , d.roomID, COUNT(m.doctorCode) AS formCount
            FROM doctor AS d
            LEFT JOIN medical_form AS m ON d.doctorCode = m.doctorCode 
                AND DATE(m.createAt) = CURRENT_DATE() 
                AND m.status = 0
            GROUP BY d.doctorCode, d.doctorName, d.roomID;";
        return $this->SelectRow($Query);
    }

    public function createMedicalTicket($info, $empCode) 
    {  
        $result1 = $this->completeQueue($info['queueID'], $info['queueNo']);
        if(!$result1) return false;

        do {
            // Sử dụng timestamp với độ dài 6 ký tự
            $timestamp = date('ymdHis'); // Sử dụng định dạng ngắn hơn (6 ký tự)
            $randomNumber = rand(0, 999); // Tăng phạm vi số ngẫu nhiên nếu cần
            $formCode = 'F' . substr($timestamp, 0, 6) . str_pad($randomNumber, 3, '0', STR_PAD_LEFT); // Tổng độ dài: 10 ký tự
            
            echo $formCode; // In mã bệnh nhân để kiểm tra
            
            // Truy vấn để kiểm tra xem mã bệnh nhân đã tồn tại chưa
            $Query2 = "SELECT COUNT(*) AS count FROM medical_form WHERE formCode = '$formCode'";
            $result2 = $this->SelectRow($Query2);
            
            // In kết quả để kiểm tra
            var_dump($result2); // Kiểm tra kết quả trả về
            
            // Kiểm tra kết quả
            if ($result2 && $result2[0]['count'] > 0) {
                continue;
            } else {
                break;
            }
        } while (true);

        $info['createAt'] = date('Y-m-d H:i:s', strtotime($info['createAt']));
        $Query3 = "INSERT INTO `medical_form`(`formID`, `patientCode`, `doctorCode`, `empCode`, `formCode`, `symptom`, `totalPrice`, `createAt`, `status`) 
        VALUES ('','{$info['patientCode']}','{$info['doctorCode']}','$empCode','$formCode','{$info['symptom']}','{$info['totalPrice']}','{$info['createAt']}','')
        ";
        $result3 = $this->InsertRow($Query3, [], true);
        echo '<br>result3'. $result3;

        if(!$result3) return false;

        $serviceIDs = json_decode($_POST['selectedServiceIDs'], true);
        $values = [];;
        foreach ($serviceIDs as $serviceID) {
            $values[] = "('$result3', '$serviceID')";
        }

        $Query4 = "INSERT INTO medical_form_details (formID, serviceID) VALUES " 
        . implode(', ', $values);

        return $this->InsertRow($Query4, []);
    
    }

    public function createMedicalTicketScheduled($info, $empCode)
    {
        $resultCompleteAppointment = $this->completeAppointment($info['apptCode']);
        if(!$resultCompleteAppointment) return false;
        return $this->createMedicalTicket($info, $empCode);
    }

    public function completeAppointment($apptCode)
    {
        $Query = "UPDATE appointments
        SET status = 2
        WHERE apptCode = '$apptCode'";
        return $this->UpdateRow($Query, []);
    }
}