<?php

namespace Models\EmployeeModels;

use Core\Model;

class PatientRecordModel extends Model
{
    public function getPatientGuardianInfo() 
    {
        $Query = "SELECT p.*, g.*, e.employeeName
            FROM patient as p 
            INNER JOIN guardian as g ON g.guardianID = p.guardianID
            LEFT JOIN employee as e ON e.empCode = p.empCode
        ";
        return $this->SelectRow($Query);
    }

    public function getExaminationHistory() 
    {
        $Query = "SELECT p.patientCode, m.formID, s.serviceName, s.price ,md.status, d.doctorName, m.createAt, e.employeeName, m.totalPrice
            FROM medical_form as m
            INNER JOIN medical_form_details as md ON md.formID = m.formID
            INNER JOIN services as s ON s.serviceID = md.serviceID
            INNER JOIN doctor as d ON d.doctorCode = m.doctorCode
            INNER JOIN patient as p ON p.patientCode = m.patientCode
            INNER JOIN employee as e ON e.empCode = m.empCode
            GROUP BY p.patientCode, m.formID, s.serviceName, s.price, d.doctorName, m.createAt, e.employeeName, m.totalPrice
            ORDER BY m.createAt DESC
        ";
        return $this->SelectRow($Query);
    }

    public function insertNewPatientAndGuardian($patient, $guardian, $empCode) 
    {
        $currentDateTime = date("Y-m-d H:i:s");
        $guardianCode = $this->generateUniqueGuardianCode();
    
        // Chèn thông tin người giám hộ vào cơ sở dữ liệu
        $Query1 = "INSERT INTO `guardian`
            (`empCode`, `guardianCode`, `guardianName`, `guardianGender`, `guardianBirthday`, `phoneNumber`, `address`, `job`, `confirmAt`, `isTemporary`) 
            VALUES 
            ('$empCode', '$guardianCode', '{$guardian["name"]}', '{$guardian["gender"]}', '{$guardian["birthday"]}', '{$guardian["phoneNumber"]}', '{$guardian["address"]}', '{$guardian["job"]}', '$currentDateTime', 0)";
    
        $newGuardian = $this->InsertRow($Query1, [], true);
        if (!$newGuardian) return ['message' => 'Thêm thông tin người giám hộ thất bại!', 'message_type' => 'error'];
    
        $patientCode = $this->generateUniquePatientCode();
        
        $Query2 = "INSERT INTO `patient`
                    (`patientID`, `guardianID`, `patientName`, `patientCode`, `patientGender`, `patientBirthday`, `medicalHistory`, `allergies`, `confirmAt`, `empCode`, `relationship`, `isTemporary`) 
                    VALUES 
                    ('', '{$newGuardian}', '{$patient["name"]}', '{$patientCode}', '{$patient["gender"]}', '{$patient["birthday"]}', '{$patient["medicalHistory"]}', '{$patient["allergies"]}', '$currentDateTime', '$empCode', '{$patient["relationship"]}', 0)";
        
        $newPatient = $this->InsertRow($Query2, [], true);
        if (!$newPatient) return ['message' => 'Thêm thông tin bệnh nhân thất bại!', 'message_type' => 'error'];
        
        return ['message' => 'Thêm bệnh nhân thành công!', 'message_type' => 'success'];
    }
    
    public function updatePatientGuardianInfo($patient, $guardian, $empCode) 
    {
        // Kiểm tra nếu không có patientCode hoặc guardianCode, tạo mới cả hai
        if (!$patient['patientCode'] || !$guardian['guardianCode']) {
            $guardianCode = $this->generateUniqueGuardianCode();
            $patientCode = $this->generateUniquePatientCode();

            // Cập nhật bảng guardian và patient với guardianCode và patientCode mới
            $Query1 = "UPDATE guardian
                SET empCode = ?, guardianName = ?, guardianGender = ?, guardianBirthday = ?, phoneNumber = ?, `address` = ?, job = ?, guardianCode = ?, isTemporary = 0
                WHERE guardianID = ?
            ";
            $Values1 = [$empCode, $guardian['name'], $guardian['gender'], $guardian['birthday'], $guardian['phoneNumber'], $guardian['address'], $guardian['job'], $guardianCode, $guardian['guardianID']];

            $newGuardianInfo = $this->UpdateRow($Query1, $Values1);
            if (!$newGuardianInfo) return ['message' => 'Cập nhật thông tin người giám hộ thất bại!', 'message_type' => 'error'];

            $Query2 = "UPDATE patient
                SET empCode = ?, patientName = ?, patientGender = ?, patientBirthday = ?, medicalHistory = ?, allergies = ?, relationship = ?, patientCode = ?, isTemporary = 0
                WHERE patientID = ?
            ";
            $Values2 = [$empCode, $patient['name'], $patient['gender'], $patient['birthday'], $patient['medicalHistory'], $patient['allergies'], $patient['relationship'], $patientCode, $patient['patientID']];

            $newPatientInfo = $this->UpdateRow($Query2, $Values2);
            if (!$newPatientInfo) return ['message' => 'Cập nhật thông tin bệnh nhân thất bại!', 'message_type' => 'error'];
        } else {
            // Nếu đã có patientCode, chỉ cần cập nhật thông tin theo điều kiện WHERE đã có sẵn
            $Query1 = "UPDATE guardian
                SET empCode = ?, guardianName = ?, guardianGender = ?, guardianBirthday = ?, phoneNumber = ?, address = ?, job = ?
                WHERE guardianCode = ?
            ";
            $Values1 = [$empCode, $guardian['name'], $guardian['gender'], $guardian['birthday'], $guardian['phoneNumber'], $guardian['address'], $guardian['job'], $guardian['guardianCode']];

            $newGuardianInfo = $this->UpdateRow($Query1, $Values1);
            if (!$newGuardianInfo) return ['message' => 'Cập nhật thông tin người giám hộ thất bại!', 'message_type' => 'error'];

            $Query2 = "UPDATE patient
                SET empCode = ?, patientName = ?, patientGender = ?, patientBirthday = ?, medicalHistory = ?, allergies = ?, relationship = ?
                WHERE patientCode = ?
            ";
            $Values2 = [$empCode, $patient['name'], $patient['gender'], $patient['birthday'], $patient['medicalHistory'], $patient['allergies'], $patient['relationship'], $patient['patientCode']];

            $newPatientInfo = $this->UpdateRow($Query2, $Values2);
            if (!$newPatientInfo) return ['message' => 'Cập nhật thông tin bệnh nhân thất bại!', 'message_type' => 'error'];
        }

        return ['message' => 'Cập nhật thông tin bệnh nhân thành công!', 'message_type' => 'success'];

    }

    public function deletePatientRecord($patientRecord) 
    {
        if(!$patientRecord['patientCode'] || !$patientRecord['guardianCode']) {
            $Query1 = "DELETE FROM `patient` WHERE `patientID` = ? AND `isTemporary` = 1";
            $resultDeteltePatientRecord = $this->DeleteRow($Query1, [$patientRecord['patientID']]);

            if(!$resultDeteltePatientRecord) return ['message' => 'Xóa hồ sơ bệnh nhân thất bại!', 'message_type' => 'error']; 

            $Query2 = "DELETE FROM `guardian` WHERE `guardianID` = ? AND `isTemporary` = 1";
            $resultDetelteGuardianRecord = $this->DeleteRow($Query2, [$patientRecord['guardianID']]);

            if(!$resultDetelteGuardianRecord) return ['message' => 'Xóa hồ sơ thông tin người giám hộ của bệnh nhân thất bại!', 'message_type' => 'error']; 

            return ['message' => 'Xóa hồ sơ thông tin bệnh nhân và người giám hộ của bệnh nhân thành công!', 'message_type' => 'success'];
        }else {
            $Query1 = "DELETE FROM `patient` WHERE `patientCode` = ?";
            $resultDeteltePatientRecord = $this->DeleteRow($Query1, [$patientRecord['patientCode']]);
    
            if(!$resultDeteltePatientRecord) return ['message' => 'Xóa hồ sơ bệnh nhân thất bại!', 'message_type' => 'error']; 
    
            $Query2 = "SELECT g.guardianID  
                FROM `guardian` as g
                INNER JOIN `patient` as p ON p.guardianID = g.guardianID
                WHERE g.guardianCode = ?
            ";
            $checkTheRemainingConstraints = $this->SelectRow($Query2, [$patientRecord['guardianCode']]);
            if($checkTheRemainingConstraints) return ['message' => 'Xóa hồ sơ bệnh nhân thành công!', 'message_type' => 'success']; 
    
            $Query3 = "DELETE FROM `guardian` WHERE `guardianCode` = ?";
            $resultDetelteGuardianRecord= $this->DeleteRow($Query3, [$patientRecord['guardianCode']]);
            
            if(!$resultDetelteGuardianRecord) return ['message' => 'Xóa hồ sơ thông tin người giám hộ của bệnh nhân thất bại!', 'message_type' => 'error']; 
    
            return ['message' => 'Xóa hồ sơ thông tin bệnh nhân và người giám hộ của bệnh nhân thành công!', 'message_type' => 'success']; 
        }
    }

    public function generateUniqueGuardianCode() 
    {
        do {
            $prefix = 'G';  
            $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);  
            $guardianCode = $prefix . $randomNumber;  

            $query = "SELECT COUNT(*) FROM guardian WHERE guardianCode = '$guardianCode'";
            $result1 = $this->SelectRow($query);
    
            if ($result1 && $result1[0]['COUNT(*)'] > 0) {
                // Có bản ghi trùng lặp, tiếp tục vòng lặp
                continue;
            } else {
                return $guardianCode;
            }
        } while (true);
    }

    public function generateUniquePatientCode() 
    {
        do {
            // Sử dụng timestamp với độ dài 6 ký tự
            $timestamp = date('ymdHis'); // Sử dụng định dạng ngắn hơn (6 ký tự)
            $randomNumber = rand(0, 999); // Tăng phạm vi số ngẫu nhiên nếu cần
            $patientCode = 'P' . substr($timestamp, 0, 6) . str_pad($randomNumber, 3, '0', STR_PAD_LEFT); // Tổng độ dài: 10 ký tự
            
            // Truy vấn để kiểm tra xem mã bệnh nhân đã tồn tại chưa
            $query = "SELECT COUNT(*) AS count FROM patient WHERE patientCode = '$patientCode'";
            $result2 = $this->SelectRow($query);
            
            if ($result2 && $result2[0]['count'] > 0) {
                continue;
            } else {
                return $patientCode;
            }
        } while (true);
    }
}