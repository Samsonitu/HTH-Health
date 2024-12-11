<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Title ?? "HTH HEALTH" ?></title>
    <link rel="shortcut icon" href="<?= public_dir('img/logo/logo-bg-white.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= public_dir('css/QueueStyle.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <div class="text-center mb-1">
            <img src="<?= public_dir('img/logo/logo.png') ?>" width="60px" height="60px" alt="">
            <h5 id="slogan">Bác sĩ riêng của bạn</h5>
        </div>
        <h2 class="text-center mb-4"><b>TIẾP NHẬN BỆNH NHÂN</b></h2>
        <div class="tabs">
            <div class="tab-item active">
                <i class="fa-regular fa-calendar"></i>
                Chưa đặt lịch
            </div>
            <div class="tab-item">
                <i class="fa-regular fa-calendar-check"></i>
                Đã đặt lịch
            </div>
            <div class="line"></div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
            <div class="tab-pane active">
                <form id="form-not-scheduled">
                    <div class="alert alert-info">
                        <strong>Hướng dẫn:</strong> Hệ thống sẽ cấp số thứ tự, vui lòng nhập đầy đủ họ tên.
                    </div>
                    <div class="mb-3">
                        <label for="patient-name" class="form-label">Tên Bệnh Nhân</label>
                        <input type="text" id="patient-name" name="patientName" class="form-control" placeholder="Nhập tên bệnh nhân">
                    </div>
                    <div class="mb-3">
                        <label for="preview-stt" class="form-label">Số Thứ Tự</label>
                        <input type="text" id="preview-stt" name="queueNo" class="form-control" 
                        value="<?php if(isset($queueNo) && $queueNo) echo $queueNo; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <select name="counterID" class="form-select">
                            <?php
                                if(isset($listCounterInfo) && !empty($listCounterInfo)) {
                                    foreach($listCounterInfo as $counterInfo) {
                                        echo '
                                            <option value="'.$counterInfo["counterID"].'">
                                                '.$counterInfo['counterName'].'
                                                (Đang có: '.$counterInfo['currentQueueCount'].' bệnh nhân)
                                            </option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary w-100">In Phiếu</button>
                </form>
            </div>
            <div class="tab-pane">
                <form id="form-scheduled">
                    <div class="alert alert-success">
                        <strong>Hướng dẫn:</strong> Nhập mã lịch hẹn để kiểm tra thông tin và cấp số thứ tự.
                    </div>
                    <div class="mb-3">
                        <label for="schedule-code" class="form-label">Mã Lịch Hẹn</label>
                        <input type="text" name="apptCode" class="form-control" placeholder="Nhập mã lịch hẹn">
                    </div>
                    <div class="mb-3">
                        <label for="preview-stt" class="form-label">Số Thứ Tự</label>
                        <input type="text" name="queueNo" id="preview-stt" class="form-control" 
                        value="<?php if(isset($queueNo) && $queueNo) echo $queueNo; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <select name="counterID" class="form-select">
                            <?php
                                if(isset($listCounterInfo) && !empty($listCounterInfo)) {
                                    foreach($listCounterInfo as $counterInfo) {
                                        echo '
                                            <option 
                                            value="'.$counterInfo['counterID'].'">
                                            '.$counterInfo['counterName'].' 
                                            (Đang có: '.$counterInfo['currentQueueCount'].' BN)
                                            </option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary w-100">In Phiếu</button>
                </form>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Begin handle doc print
                function openPrintWindow(content, callback) {
                    const printWindow = window.open("", "_blank", "width=600,height=400");
                    printWindow.document.write(`
                        <html>
                            <head>
                                <link rel="preconnect" href="https://fonts.googleapis.com">
                                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                                <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                                <title>Phiếu Số Thứ Tự</title>
                                <style>
                                    body { font-family: Arial, sans-serif; text-align: center; margin: 20px; }
                                    h1 { font-size: 24px; margin-bottom: 20px; }
                                    p { font-size: 18px; }
                                    .stt { font-size: 32px; font-weight: bold; color: #007BFF; margin: 20px 0; }
                                    #slogan { font-family: "Lobster", sans-serif; color: #2B6BFF; }
                                    span { text-align: end; }
                                    @media print {
                                        #printConfirm {
                                            display: none;
                                        }
                                    }
                                </style>
                            </head>
                            <body>
                                <img src="<?= public_dir('img/logo/logo.png') ?>" width="60px" height="60px" alt="Logo">
                                <p id="slogan">Bác sĩ riêng của bạn</p>
                                <h1>PHIẾU THỨ TỰ</h1>
                                <div style="display: flex; gap: 8px; justify-content: center; align-items:center;">
                                    <p><strong>Loại:</strong> ${content.type}</p> 
                                    <span>|</span>
                                    <p><strong>Quầy:</strong> ${content.counterID}</p>
                                </div>
                                <div>
                                    <p><strong>Số thứ tự của bạn:</strong></p>
                                    <div class="stt">${content.queueNo}</div>
                                </div>
                                <p>Vui lòng giữ phiếu này để được gọi tên.</p>
                                <hr>
                                <span style="text-align: end;"><b>Liên hệ:</b>(012)-356789 để được hỗ trợ</span>
                                <button id="printConfirm">In phiếu</button>
                            </body>
                        </html>
                    `);

                    // Đảm bảo sự kiện được gắn sau khi cửa sổ tài liệu đã được viết xong
                    printWindow.document.close(); // Đảm bảo tài liệu đã hoàn tất tải trước khi gắn sự kiện

                    printWindow.document.getElementById("printConfirm").addEventListener("click", function() {
                        // Khi nhấn "In phiếu", tiến hành in và gọi callback
                        printWindow.print();

                        // Đảm bảo sự kiện `onafterprint` được kích hoạt sau khi in
                        printWindow.onafterprint = function() {
                            console.log("In đã hoàn tất.");
                            callback(); // Thực hiện callback sau khi in xong
                            printWindow.close(); // Đóng cửa sổ in
                        };

                        // Giả lập sự kiện `onafterprint` nếu không có máy in
                        // setTimeout(function() {
                        //     console.log("In đã hoàn tất (Giả lập).");
                        //     callback(); // Thực hiện callback sau khi in xong
                        //     printWindow.close(); // Đóng cửa sổ in
                        // }, 3000); // Chờ 3 giây để giả lập quá trình in
                    });
                }
            // End handle doc print

            // Begin handle listener event button print
                const formNotScheduled = document.querySelector('#form-not-scheduled');
                const formScheduled = document.querySelector('#form-scheduled');

                const printButtonNotScheduled = formNotScheduled.querySelector('.btn-primary');
                const printButtonScheduled = formScheduled.querySelector('.btn-primary');

                printButtonNotScheduled.addEventListener('click', (event) => {
                    event.preventDefault();  // Ngăn gửi form đi ngay lập tức

                    if (!validateFormInputs(formNotScheduled)) return;

                    const queueNo = formNotScheduled.querySelector('#preview-stt').value;
                    const counterID = formNotScheduled.querySelector('select[name="counterID"]').value;

                    openPrintWindow({queueNo: queueNo, type: 'B', counterID: counterID}, () => {
                        // Send data for insert to table queue
                        const formData = new FormData(formNotScheduled);
                        fetch('<?php echo route('InsertQueueRoute') ?>', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(`${data.message}!`);
                                window.location.reload();
                            } else {
                                console.log(data);
                                alert(`Lỗi: ${data.message}!`);
                            }
                        })
                        .catch(error => console.error("Lỗi: ", error));
                    });
                });

                printButtonScheduled.addEventListener('click', (event) => {
                    event.preventDefault();
                    if (!validateFormInputs(formScheduled)) return;
                    checkApptCodeValid()
                        .then((data) => {
                            if (data.success) {
                                console.log('Mã lịch hẹn hợp lệ:', data);
                                alert(data.message || 'Mã lịch hẹn hợp lệ');

                                const queueNo = formScheduled.querySelector('#preview-stt').value;
                                const counterID = formScheduled.querySelector('select[name="counterID"]').value;
                                openPrintWindow({queueNo: queueNo, type: 'A', counterID: counterID}, () => {
                                    const formData = new FormData(formScheduled);
                                    return fetch('<?php echo route('InsertAndUpdateAppointmentRoute') ?>', {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert(`${data.message}!`);
                                            window.location.reload();
                                        } else {
                                            console.log(data);
                                            alert(`Lỗi: ${data.message}!`);
                                        }
                                    })
                                    .catch(error => console.error("Lỗi: ", error));
                                });

                            } else {
                                console.log('Mã lịch hẹn không hợp lệ:', data);
                                alert(`${data.message} ${data.time ? data.time + "phút" : ""}`);
                            }
                        })
                        .catch((error) => {
                            console.error('Có lỗi xảy ra:', error);
                            alert('Lỗi khi kiểm tra mã lịch hẹn.');
                        });
                });
            // End handle listener event button print

            // Begin function validate input & select
                function validateFormInputs(form) {
                    const inputs = form.querySelectorAll('input, select');
                    for (let input of inputs) {
                        if (input.value.trim() === "") {
                            alert("Vui lòng điền đầy đủ thông tin!");
                            return false;
                        }
                    }
                    return true;
                }
            // End function validate input & select

            // Begin handle check appointment code
                function checkApptCodeValid() {
                    const apptCode = document.querySelector('input[name="apptCode"]').value.trim();
                    const arrival = getCurrentDateTime();

                    return fetch('<?php echo route("FindAppointmentCodeRoute")?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ apptCode, arrival })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Server trả về lỗi!');
                        }
                        return response.json();
                    })
                };
            // End handle check appointment code

            // Begin function get current datetime format match mysql
                function getCurrentDateTime() {
                    const now = new Date(); // Lấy thời gian hiện tại
                    const year = now.getFullYear();
                    const month = String(now.getMonth() + 1).padStart(2, '0'); // Tháng (0-11), cộng thêm 1 để có tháng (1-12)
                    const day = String(now.getDate()).padStart(2, '0'); // Ngày
                    const hours = String(now.getHours()).padStart(2, '0'); // Giờ
                    const minutes = String(now.getMinutes()).padStart(2, '0'); // Phút
                    const seconds = String(now.getSeconds()).padStart(2, '0'); // Giây

                    // Định dạng datetime theo chuẩn 'YYYY-MM-DD HH:MM:SS'
                    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                }
            // End function get current datetime format match mysql
        });
            
    </script>
    <script src="<?= public_dir('js/QueueScript.js') ?>"></script>
</body>
</html>