const patients = [
    {
        patientID: "BN345",
        patientName: 'Phạm Ngọc Huấn'
    }

]
const btnOpenModalPatientDetails = $$('.section-patient-records__body tbody tr');
const modalPatientDetails = $('#patient-details__modal');

btnOpenModalPatientDetails.forEach((btn, index) => {
    btn.onclick = () => {
        const patientID = btn.dataset.patientid;
        const patientCurrent = getPatientInfoByID(patientID);

        const modalInstance = bootstrap.Modal.getInstance(modalPatientDetails) || new bootstrap.Modal(modalPatientDetails);
        if (!modalPatientDetails.classList.contains('show')) {
            modalInstance.show();
        }
        renderModalPatientDetails(patientCurrent);

    }
});


function getPatientInfoByID(patientID) {
    return patients.find((patient) => patient.patientID == patientID)
}
function renderModalPatientDetails(patient) {
    modalPatientDetails.querySelector('.modal-title').innerText = "CHI TIẾT HỒ SƠ : " + patient.patientName;

}
