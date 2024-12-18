const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const headerNavItems = $$('header #nav a');

// Cập nhật class active khi trang được tải lại
window.onload = () => {
    // Kiểm tra đường dẫn hiện tại
    const currentPath = window.location.pathname;

    headerNavItems.forEach(item => {
        // So sánh pathname của liên kết với pathname hiện tại của trang
        if (item.href.includes(currentPath)) {
            // Thêm class active nếu đường dẫn trùng khớp
            item.classList.add('active');
        } else {
            // Xóa class active nếu không trùng khớp
            item.classList.remove('active');
        }
    });
};

// Xử lý khi người dùng nhấn vào các liên kết
headerNavItems.forEach(item => {
    item.onclick = () => {
        // Xóa class active khỏi các liên kết khác
        $('header #nav a.active')?.classList.remove('active');
        // Thêm class active cho liên kết hiện tại
        item.classList.add('active');
    };
});

const body = $('body');

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

/* Begin function format currency VND */
    function formatCurrencyVND(number) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        }).format(number);
    }
/* End function format currency VND */

/* Begin function format date time */
    function formatDateTime(dateTimeString) {
        // Tách ngày và giờ từ chuỗi
        const [date, time] = dateTimeString.split(' ');
        const [year, month, day] = date.split('-');
        
        // Định dạng lại thành MM/DD/YYYY HH:MM:SS
        return `${month}/${day}/${year} ${time}`;
    }
/* End function format date time */


/* Begin function handle age and format birthday */
    function calculateAgeAndFormat(birthday) {
        const birthDate = new Date(birthday); // Chuyển đổi ngày sinh thành đối tượng Date
        const today = new Date(); // Ngày hiện tại

        // Tính tuổi
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--; // Trừ 1 nếu chưa đến sinh nhật trong năm hiện tại
        }

        // Định dạng ngày sinh thành dd-mm-yyyy
        const formattedBirthday = `${String(birthDate.getDate()).padStart(2, '0')}/${String(birthDate.getMonth() + 1).padStart(2, '0')}/${birthDate.getFullYear()}`;

        return { age, formattedBirthday }; // Trả về đối tượng chứa tuổi và ngày định dạng
    }
/* End function handle age and format birthday */

