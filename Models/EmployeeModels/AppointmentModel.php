<?php

namespace Models\EmployeeModels;

use Core\Model;

class AppointmentModel extends Model {
    public function getlistPatientGuardianInfo()
    {
        $Query = "SELECT p.*, g.*
            FROM patient AS p 
            INNER JOIN guardian AS g ON g.guardianID = p.guardianID; 
        ";

        return $this->SelectRow($Query);
    }

    public function getlistDoctorInfo()
    {
        $Query = "SELECT doctorName, doctorCode
        FROM doctor
        ";
        return $this->SelectRow($Query);
    }

    public function getSerivces()
    {
        $Query = "SELECT *
            FROM services
        ";
        return $this->SelectRow($Query);
    }

    public function getListAppointMentInfo()
    {
        $Query = "SELECT a.*, p.patientName, p.patientGender, p.patientBirthday, g.guardianName, g.phoneNumber, g.address
            FROM appointments as a 
            INNER JOIN patient as p ON p.patientID = a.patientID
            INNER JOIN guardian as g ON g.guardianID = p.guardianID;
        ";
        return $this->SelectRow($Query);
    }

    public function additionPatientCodeAppointment($apptID, $patientCode)
    {
        $Query = "UPDATE appointments 
        SET patientCode = '$patientCode'
        WHERE apptID = '$apptID';
        ";
        return $this->UpdateRow($Query, []);
    }

    public function createAppointmentCode($POST, $empCode) 
    {
        do {
            $prefix = 'A';  
            $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);  
            $apptCode = $prefix . $randomNumber;  
            
            $query = "SELECT COUNT(*) FROM appointments WHERE apptCode = '$apptCode'";
            $result = $this->SelectRow($query);
        
            if ($result && $result[0]['COUNT(*)'] > 0) {
                continue;
            } else {
                break;
            }
        } while (true);

        $doctorCode = $POST['doctorCode'] != "" ? $POST['doctorCode'] : "";
        
        $Query1 = "UPDATE appointments 
                SET empCode = '$empCode', 
                    doctorCode = '$doctorCode', 
                    apptCode = '$apptCode', 
                    apptTime = '{$POST['apptTime']}', 
                    status = 0, 
                    symptom = '{$POST['symptom']}', 
                    totalPrice = '{$POST['totalPrice']}', 
                    confirmAt = NOW()
                WHERE apptID = '{$POST['apptID']}'"; 

        $result1 = $this->UpdateRow($Query1, []);
        if(!$result1) return false;

        $values = [];
        foreach ($POST['serviceIDs'] as $serviceID) {
            $values[] = "('{$POST['apptID']}', '$serviceID')";
        }

        $Query2 = "INSERT INTO appointment_details (apptID, serviceID) VALUES " 
        . implode(', ', $values);

        return $this->UpdateRow($Query2, []);
    }
}