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
            WHERE a.status = 0; 
        ";
        return $this->SelectRow($Query);
    }

    public function resultReceiveQueue($queueID, $queueNo) {
        $Query = "UPDATE queues 
            SET status = 1
            WHERE queueID = '$queueID' AND queueNo = '$queueNo'
        ";
        return $this->UpdateRow($Query, []);
    }

    public function cancelQueueReception($queueID, $queueNo) {
        $Query = "UPDATE queues 
            SET status = -1
            WHERE queueID = '$queueID' AND queueNo = '$queueNo'
        ";
        return $this->UpdateRow($Query, []);
    }
}