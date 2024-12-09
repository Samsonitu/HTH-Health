<?php

namespace Models\EmployeeModels;

use Core\Model;

class PatientRecordModel extends Model
{
    public function getPatientGuardianInfo() {
        $Query = "SELECT p.*, g.*, e.employeeName
            FROM patient as p 
            INNER JOIN guardian as g ON g.guardianID = p.guardianID
            INNER JOIN employee as e ON e.empCode = p.empCode
        ";
        return $this->SelectRow($Query);
    }

    public function insertNewPatientAndGuardian($patient, $guardian, $empCode) {
        // Lặp cho đến khi có mã người giám hộ không trùng
        do {
            $prefix = 'G';  
            $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);  
            $guardianCode = $prefix . $randomNumber;  
            echo $guardianCode;
            // Truy vấn để kiểm tra xem mã người giám hộ đã tồn tại chưa
            $query = "SELECT COUNT(*) FROM guardian WHERE guardianCode = '$guardianCode'";
            $result1 = $this->SelectRow($query);
    
            // Kiểm tra nếu có bản ghi trùng lặp
            if ($result1 && $result1[0]['COUNT(*)'] > 0) {
                // Có bản ghi trùng lặp, tiếp tục vòng lặp
                continue;
            } else {
                // Không có bản ghi trùng lặp
                break;
            }
        } while (true);
    
        // Chèn thông tin người giám hộ vào cơ sở dữ liệu
        $Query1 = "INSERT INTO `guardian`
            (`empCode`, `guardianCode`, `guardianName`, `guardianGender`, `guardianBirthday`, `phoneNumber`, `address`, `job`, `createAt`, `isTemporary`) 
            VALUES 
            ('$empCode', '$guardianCode', '{$guardian["name"]}', '{$guardian["gender"]}', '{$guardian["birthday"]}', '{$guardian["phoneNumber"]}', '{$guardian["address"]}', '{$guardian["job"]}', NOW(), 0)";
    
        $newGuardian = $this->InsertRow($Query1, [], true);
        if (!$newGuardian) return ['message' => 'Thêm thông tin người giám hộ thất bại!', 'message_type' => 'error'];
    
        // Lặp cho đến khi có mã bệnh nhân không trùng
        do {
            // Sử dụng timestamp với độ dài 6 ký tự
            $timestamp = date('ymdHis'); // Sử dụng định dạng ngắn hơn (6 ký tự)
            $randomNumber = rand(0, 999); // Tăng phạm vi số ngẫu nhiên nếu cần
            $patientCode = 'P' . substr($timestamp, 0, 6) . str_pad($randomNumber, 3, '0', STR_PAD_LEFT); // Tổng độ dài: 10 ký tự
            
            echo $patientCode; // In mã bệnh nhân để kiểm tra
            
            // Truy vấn để kiểm tra xem mã bệnh nhân đã tồn tại chưa
            $query = "SELECT COUNT(*) AS count FROM patient WHERE patientCode = '$patientCode'";
            $result2 = $this->SelectRow($query);
            
            // In kết quả để kiểm tra
            var_dump($result2); // Kiểm tra kết quả trả về
            
            // Kiểm tra kết quả
            if ($result2 && $result2[0]['count'] > 0) {
                continue;
            } else {
                break;
            }
        } while (true);
        
        $Query2 = "INSERT INTO `patient`
                    (`patientID`, `guardianID`, `patientName`, `patientCode`, `patientGender`, `patientBirthday`, `medicalHistory`, `allergies`, `createAt`, `empCode`, `relationship`, `isTemporary`) 
                    VALUES 
                    ('', '{$newGuardian}', '{$patient["name"]}', '{$patientCode}', '{$patient["gender"]}', '{$patient["birthday"]}', '{$patient["medicalHistory"]}', '{$patient["allergies"]}', NOW(), '$empCode', '{$patient["relationship"]}', 0)";
        
        $newPatient = $this->InsertRow($Query2, [], true);
        if (!$newPatient) return ['message' => 'Thêm thông tin bệnh nhân thất bại!', 'message_type' => 'error'];
        
        return ['message' => 'Thêm bệnh nhân thành công!', 'message_type' => 'success'];
    }
    
}