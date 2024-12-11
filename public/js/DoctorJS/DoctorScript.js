const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const headerNavItems = $$('header #nav a');

// Cập nhật class active khi trang được tải lại
window.onload = () => {
  // Kiểm tra đường dẫn hiện tại
  const currentPath = window.location.pathname;

  headerNavItems.forEach((item) => {
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
headerNavItems.forEach((item) => {
  item.onclick = () => {
    // Xóa class active khỏi các liên kết khác
    $('header #nav a.active')?.classList.remove('active');
    // Thêm class active cho liên kết hiện tại
    item.classList.add('active');
  };
});
