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
        $Query = "SELECT a.*, ad.*, p.patientName, p.patientGender, p.patientBirthday, g.guardianName, g.phoneNumber, g.address
            FROM appointments as a 
            INNER JOIN appointment_details as ad ON ad.apptID = a.apptID
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
}