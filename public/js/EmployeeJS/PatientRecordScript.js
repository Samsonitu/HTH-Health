// Begin handle Modal Add New Patient
body.addEventListener('keyup', (event) => {
    if (event.keyCode === 27) {
        const openModals = document.querySelectorAll('.modal.show');

        openModals.forEach(modal => {
            const modalInstance = bootstrap.Modal.getInstance(modal);
            if (modalInstance) {
                modalInstance.hide();
            }
        });
    }
});
// End handle modal add new patient

