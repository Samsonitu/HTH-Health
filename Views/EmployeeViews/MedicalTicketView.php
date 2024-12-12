<?php 
    $Title = "Phiếu khám bệnh"; 

    $extraCSS = [                       
        public_dir('css/EmployeeCSS/EmpStyle.css')
    ];

    $extraJS = [
        public_dir('js/EmployeeJS/EmpScript.js'),
        public_dir('js/EmployeeJS/MedicalTicketScript.js')
    ];
?>

<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeHeader.php"; ?>

<!-- Code phần main ở đây -->
<div class="container-fuild">
    <div class="d-flex" style="min-height: 85vh;">
        <!-- Article -->
        <article>
            <div class="row gx-2">
                <div class="col-4">
                    <div class="section section-service">
                        <div class="section-service__header">
                            <div class="tag--title">Danh mục dịch vụ</div>
                        </div>
                        <div class="section-service__body mx-3 p-2">
                            <div class="input-group my-3">
                                <input type="text" id="search-service-input" class="form-control w-75" placeholder="Tìm kiếm dịch vụ...">
                                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="service__list">
                                <?php
                                    if(isset($listServices) && !empty($listServices)) {
                                        foreach($listServices as $serviceItem) {
                                            echo '
                                                <div class="service__items" 
                                                    data-service-name="'.$serviceItem['serviceName'].'"
                                                    data-service-id="'.$serviceItem['serviceID'].'"
                                                    data-service-price="'.$serviceItem['price'].'"
                                                    data-service-status="'.$serviceItem['status'].'">
                                                    <div class="col-6">
                                                        <input type="checkbox" 
                                                        '.($serviceItem['status'] !== '1' ? "disabled" : "").'>
                                                        <label for="">'.$serviceItem['serviceName'].'</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <span>Trạng thái</span>
                                                        <br>
                                                        <small>
                                                        '.($serviceItem['status'] === '1' 
                                                            ? "<b class='text-success'>Sẵn sàng</b>" 
                                                            : "<b class='text-danger'>Chưa sẵn sàng</b>")
                                                            .'
                                                        </small>
                                                    </div>
                                                    <div class="col-3">
                                                        <span>Giá</span><br>
                                                        <small><b>'.number_format($serviceItem['price'], 0, ',', '.').'đ</b></small>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="section-service__footer mx-3 p-2"></div>
                    </div>
                </div>
                <div class="col-8">
                    <div id="medical-ticket-form" class="section section-patient">
                        <div class="section-patient__header">
                            <div class="d-flex align-items-center gap-5">
                                <div class="tag--title">Phiếu khám bệnh</div>
                                <div>
                                    <b>STT: </b><span id="receivingPatientQueueNo"></span>
                                    <b class="mx-2">-</b>
                                    <b>Loại: </b><span id="receivingPatientType"></span>
                                    <b class="mx-2">-</b>
                                    <b>Đang tiếp nhận bệnh nhân: </b> <span id="receivingPatientName"></span> 
                                </div>
                            </div>
                            <ul class="nav nav-tabs mx-3 mt-3 text-center border-0">
                                <li class="nav-item w-50">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#book">
                                        <b><i class="fa-regular fa-calendar"></i> Chưa đặt lịch</b></a>
                                </li>
                                <li class="nav-item w-50 text-center">
                                    <a class="nav-link" data-bs-toggle="tab" href="#booked">
                                        <b><i class="fa-regular fa-calendar-check"></i> Đã đặt lịch</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="section-patient__body px-3 mx-3">
                            <div class="tab-content">
                                <form id="book" action="<?=route('MedicalTicketUnscheduledCreateRoute')?>"  class="tab-pane active" method="POST">
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <input type="hidden" name="queueID">
                                        <input type="hidden" name="queueNo">
                                        <label for="" class="form-label w-25"><b class="text-danger">Mã bệnh nhân:</b></label>
                                        <div class="input-group w-50">
                                            <input type="text" class="form-control w-75" placeholder="Nhập mã bệnh nhân..." name="patientCode" required>
                                            <button id="btn-findPatientCode" class="btn btn-primary" style="font-weight: bold;"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Tên bệnh nhân:</label>
                                        <input type="text" class="form-control w-75" name="patientName" disabled required>
                                    </div>
                                    <div class="my-2 d-flex">
                                        <div class="col-4 w-25 text-end">
                                            <label for="" class="form-label">Giới tính:</label>
                                            <input class="text-center w-25" type="text" name="patientGender" disabled required> 
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Ngày sinh:</label>
                                            <input class="text-center w-50" type="text" name="patientBirthday" disabled required>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Tuổi:</label>
                                            <input class="text-center w-25" type="text" name="patientAge" disabled required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Tên người giám hộ:</label>
                                        <input type="text" class="form-control w-75" name="guardianName" disabled required>
                                    </div>
                                    <div class="my-2 d-flex">
                                        <div class="col-4 w-25 text-end">
                                            <label for="" class="form-label">Giới tính:</label>
                                            <input class="text-center w-25" type="text" name="guardianGender"  disabled required> 
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Ngày sinh:</label>
                                            <input class="text-center w-50" type="text" name="guardianBirthday" disabled required>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Tuổi:</label>
                                            <input class="text-center w-25" type="text" name="guardianAge" disabled required>
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Số điện thoại:</label>
                                        <input type="text" class="form-control w-75" name="phoneNumber" disabled required>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Địa chỉ:</label>
                                        <textarea class="form-control w-75" name="address" disabled required></textarea>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Triệu chứng | Biểu hiện:</b></label>
                                        <textarea class="form-control w-75" name="symptom" required></textarea>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Chọn bác sĩ:</label>
                                        <select name="doctorCode" class="form-select w-75" required>
                                            <?php
                                                if(isset($countPatientWaitExamined) && !empty($countPatientWaitExamined)) {
                                                    foreach($countPatientWaitExamined as $room) {
                                                        echo '
                                                            <option value="'.$room['doctorCode'].'">
                                                                Phòng khám '.$room['roomID'].' - BS. '.$room['doctorName'].' (Số BN đang chờ: '.$room['formCount'].')
                                                            </option>
                                                        ';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Dịch vụ đăng ký:</label>
                                        <textarea name="selectedServiceNames" class="form-control w-75" disabled></textarea>
                                        <input type="hidden" name="selectedServiceIDs" id="selectedServiceIDs" required />
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b>Tổng tiền:</b></label>
                                        <div class="w-75 text-start">
                                            <b id="total-price"></b>
                                            <input type="hidden" name="totalPrice" id="total-price-input" value="0" required />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-3">
                                        <input type="hidden" name="createAt">
                                        <input type="submit" class="btn btn-success mx-1" id="btn-submit-form-book" value="Hoàn Tất">
                                        <button class="btn btn-danger mx-1" type="reset"><b>Hủy</b></button>
                                    </div>
                                </form>
                                <form id="booked" action="<?=route('MedicalTicketScheduledCreateRoute')?>" class="tab-pane fade" method="POST">
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <input type="hidden" name="queueID">
                                        <input type="hidden" name="queueNo">
                                        <label for="" class="form-label w-25"><b class="text-danger">Mã lịch hẹn:</b></label>
                                        <div class="input-group w-50">
                                            <input type="text" class="form-control w-75" placeholder="Nhập mã lịch hẹn..." name="apptCode" required>
                                            <button type="button" id="btn-findApptCode" class="btn btn-primary" style="font-weight: bold;"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Mã bệnh nhân:</b></label>
                                        <input type="text" name="patientCode" class="form-control w-75" readonly required>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Tên bệnh nhân:</label>
                                        <input type="text" name="patientName" class="form-control w-75" disabled required>
                                    </div>
                                    <div class="my-2 d-flex">
                                        <div class="col-4 w-25 text-end">
                                            <label for="" class="form-label">Giới tính:</label>
                                            <input class="text-center w-25" name="patientGender" type="text" disabled required> 
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Năm sinh:</label>
                                            <input class="text-center w-50" name="patientBirthday" type="text" disabled required>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Tuổi:</label>
                                            <input class="text-center w-25" name="patientAge" type="text" disabled required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Tên người giám hộ:</label>
                                        <input type="text" class="form-control w-75" name="guardianName" disabled required>
                                    </div>
                                    <div class="my-2 d-flex">
                                        <div class="col-4 w-25 text-end">
                                            <label for="" class="form-label">Giới tính:</label>
                                            <input class="text-center w-25" name="guardianGender" type="text" disabled required> 
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Năm sinh:</label>
                                            <input class="text-center w-50" name="guardianBirthday" type="text" disabled required>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Tuổi:</label>
                                            <input class="text-center w-25" name="guardianAge" type="text" disabled required>
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Số điện thoại:</label>
                                        <input type="text" class="form-control w-75" name="phoneNumber" disabled required>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Địa chỉ:</label>
                                        <textarea class="form-control w-75" name="address" disabled required></textarea>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Triệu chứng:</b></label>
                                        <textarea class="form-control w-75" required name="symptom"></textarea>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Chọn bác sĩ:</label>
                                        <select name="doctorCode" class="form-select w-75" required>
                                            <?php
                                                if(isset($countPatientWaitExamined) && !empty($countPatientWaitExamined)) {
                                                    foreach($countPatientWaitExamined as $room) {
                                                        echo '
                                                            <option value="'.$room['doctorCode'].'">
                                                                Phòng khám '.$room['roomID'].' - BS. '.$room['doctorName'].' (Số BN đang chờ: '.$room['formCount'].')
                                                            </option>
                                                        ';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Dịch vụ đã đăng ký:</label>
                                        <textarea name="selectedServiceNames" class="form-control w-75" disabled></textarea>
                                        <input type="hidden" value="[]" name="selectedServiceIDs" id="selectedServiceIDs" required />
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b>Tổng tiền:</b></label>
                                        <div class="w-75 text-start">
                                            <b id="total-price"></b>
                                            <span id="paymentStatus"></span>
                                            <input type="hidden" name="totalPrice" id="total-price-input" value="0" required />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-3">
                                        <input type="hidden" name="createAt">
                                        <input type="submit" class="btn btn-success mx-1" id="btn-submit-form-book" value="Hoàn tất">
                                        <button class="btn btn-danger mx-1" type="reset"><b>Hủy</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="section-patient__footer justify-content-end p-3 mx-3"></div>
                    </div>
                </div>                
            </div>
        </article>
        <div class="modal" id="modalConfirmCancelReception">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Xác nhận hủy hàng chờ</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body text-center fs-6">
                        <p>Xác nhận hủy tiếp nhận hàng chờ<br>
                        Bệnh nhân: <b id="cancelReceptionPatientName"></b> - STT: <b id="cancelReceptionQueueNo"></b></p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-danger" id="confirmCancelReception">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeSidebar.php" ?>
    </div>
</div>

<script>
    const counterContainer = document.querySelector('.section-waiting-list__body .tab-pane');
    const formBook = document.querySelector('form#book');
    const formBooked = document.querySelector('form#booked');
    
    const listServices = <?php echo json_encode($listServices) ?>;
    const listDoctorInfo = <?php echo json_encode($listDoctorInfo) ?>;

    const formatterPrice = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });

    formBook.addEventListener('submit', (event)=>{
        event.preventDefault();
        if(hiddenServiceIDs.value == "[]" || hiddenServiceIDs.value == "") {
            alert('Phải chọn ít nhất một dịch vụ!!');
            return
        }
        const currentDate = new Date().toLocaleString('en-US', { 
            timeZone: 'Asia/Ho_Chi_Minh',
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        });
        const formattedDate = currentDate.slice(0, 20).replace(',', '');
        formBooked.querySelector('input[name="createAt"]').value = formattedDate;

        const formData = new FormData(formBook);
        const formObject = Object.fromEntries(formData.entries());

        console.log(formObject);
        openPrintMedicalForm(formObject, formBook);
        window.onbeforeunload = function() {
            formBook.reset();
            serviceCheckBtnList.forEach(checkbox => {
                checkbox.checked = false;
            });
            hiddenServiceIDs.value = "";
            hiddenTotalPrice.value = "";
            selectedServices = [];
            totalPrice = 0;
        };
    })

    formBooked.addEventListener('submit', (event)=>{
        event.preventDefault();
        const currentDate = new Date().toLocaleString('en-US', { 
            timeZone: 'Asia/Ho_Chi_Minh',
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        });
        const formattedDate = currentDate.slice(0, 20).replace(',', '');
        formBooked.querySelector('input[name="createAt"]').value = formattedDate;
        
        const formData = new FormData(formBooked);
        const formObject = Object.fromEntries(formData.entries());
        console.log(formObject);
        openPrintMedicalForm(formObject, formBooked);
        window.onbeforeunload = function() {
            formBooked.reset();
            serviceCheckBtnList.forEach(checkbox => {
                checkbox.checked = false;
            });
            hiddenServiceIDs.value = "";
            hiddenTotalPrice.value = "";
            selectedServices = [];
            totalPrice = 0;
        };
    })

    // Begin handle open print medical form 
        function openPrintMedicalForm(data, form) {
            const printWindow = window.open('', '', 'width=560,height=794');
            const printContent = layoutPrintMedicalForm(data);
            printWindow.document.write(
                `<html>
                    <head>
                        <title>In phiếu khám</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                        <style>
                            #medicalTicketContainer {
                                width: 148mm;
                                margin: 0 auto;
                                padding: 10mm;
                                border: 1px solid #ccc;
                                font-family: Arial, sans-serif;
                                font-size: 10pt;
                            }
                            #slogan {
                                font-family: "Lobster", sans-serif;
                                color: #2B6BFF;
                            }
                        </style>
                `
            );
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            printWindow.document.getElementById("printConfirm").addEventListener("click", function() {
                // Khi nhấn "In phiếu", tiến hành in và gọi callback
                printWindow.print();

                // Đảm bảo sự kiện `onafterprint` được kích hoạt sau khi in
                printWindow.onafterprint = function() {
                    console.log("In đã hoàn tất.");
                    form.submit(); // Thực hiện callback sau khi in xong
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
    // End handle open print medical form 

    // Begin write html to medical form print
        function layoutPrintMedicalForm(data) {
            let curentPatientInfo = listPatientGuardianInfo.find((element)=> element.patientCode == data.patientCode); 
            let patientBirthday = new Date(curentPatientInfo.patientBirthday);
            let guardianBirthday = new Date(curentPatientInfo.guardianBirthday);
            data.selectedServiceIDs = JSON.stringify(data.selectedServiceIDs);
            let selectedServiceInfo = listServices.filter((service) => 
                JSON.parse(data.selectedServiceIDs).includes(service.serviceID)
            );

            return `
                <div id="medicalTicketContainer" class="container border p-4 shadow-sm">
                <div class="d-flex flex-column align-items-center">
                    <img src="<?php echo public_dir('img/logo/logo.png') ?>" width="60px" height="60px" alt="Logo">
                    <h6 id="slogan">Bác sĩ riêng của bạn</h6>
                </div>                
                <h5 class="text-center"><b>PHIẾU KHÁM BỆNH </b></h5>
                <div class="d-flex justify-content-between">
                    <p class="mb-0 mt-1"><b>Mã bệnh nhân: </b>${data.patientCode}</p>
                    <p class="mb-0 mt-1"><b>Ngày khám: </b>${data.createAt}</p>
                </div>
                <hr>

                <!-- Info Section1s -->
                <div class="info-section mb-4">
                    <div class="d-flex justify-content-between">
                        <p><strong>Họ tên:</strong> ${curentPatientInfo.patientName} </p>
                        <p><strong>Giới tính:</strong> ${curentPatientInfo.patientGener == 'man' ? 'Nam' : 'Nữ'}</p>
                        <p><strong>Tuổi:</strong> ${calculateAge(patientBirthday)}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p><strong>Người giám hộ:</strong> ${curentPatientInfo.guardianName} </p>
                        <p><strong>Giới tính:</strong> ${curentPatientInfo.guardianGender == 'man' ? 'Nam' : 'Nữ'}</p>
                        <p><strong>Tuổi:</strong> ${calculateAge(guardianBirthday)}</p>
                    </div>
                    <p><strong>Địa chỉ:</strong> ${curentPatientInfo.address}</p>
                    <p><strong>Số điện thoại:</strong> ${curentPatientInfo.phoneNumber}</p>
                    <p><strong>Triệu chứng lâm sàng:</strong> ${data.symptom}</p>
                </div>

                <!-- Table Section -->
                <table class="table table-bordered" style="font-size: 13px;">
                    <thead class="table-success text-center">
                        <tr>
                            <th>STT</th>
                            <th>Tên Dịch Vụ</th>
                            <th>Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${selectedServiceInfo.map((element, index) => `
                            <tr>
                                <td class="text-center">${index + 1}</td>
                                <td>${element.serviceName}</td>
                                <td class="text-end">${formatterPrice.format(element.price)}</td>
                            </tr>
                        `).join('')}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Tổng tiền: ${formatterPrice.format(data.totalPrice)}</td>
                        </tr>
                    </tfoot>
                </table>

                <!-- Footer -->
                <div class="footer mt-4 text-center">
                    <p class="fw-bold mb-2">STT</p>
                    <p class="display-6  text-success mb-2">${data.queueNo}</p>
                    <p class="text-muted">Phòng khám số ${data.roomID}</p>
                </div>
            </div>
            <button id="printConfirm">In phiếu</button>
            `;
        }

    // End write html to medical form print
        
    // Begin call ajax queues for sidebar
        function callAjax() {
            fetch('<?php echo route('getTheQueueListRoute')?>', {
                method: 'GET', // Phương thức HTTP
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())  // Chuyển đổi phản hồi sang JSON
            .then(response => {
                if(response.success) {
                    renderQueueList(response.data);
                }else {
                    alert(response.message);
                }
            })
            .catch(error => {
                console.error('AJAX error:', error);
            });
        }

        callAjax();  
        // setInterval(callAjax, 5000);  
    // End call ajax queues for sidebar

    // Begin function btn find patient code
        const listPatientGuardianInfo = <?php echo(json_encode($listPatientGuardianInfo)); ?> 
        const btnFindPatientCode = formBook.querySelector('#btn-findPatientCode');
        btnFindPatientCode.onclick = () => {
            console.log(document.querySelector('#receivingPatientQueueNo'));
            if(document.querySelector('#receivingPatientQueueNo').innerText != "") {
                const patientCodeInput = document.querySelector('form#book input[name="patientCode"]').value;
                findPatientGuardianInfo(patientCodeInput);
            }
        }

    // End function btn find patient code

    // Begin function find patientInfo 
        function findPatientGuardianInfo (patientCode) {
            let resultFind = listPatientGuardianInfo.find((patientGuardianInfo) => patientGuardianInfo.patientCode == patientCode);
            if(!resultFind) {
                formBook.reset();
                alert("Không tìm thấy mã bệnh nhân!");
                return;
            }
            renderMedicalTicketFormBook(resultFind);
        }
    // End function patietnInfo

    // Begin function btn find appointment code 
        const listAppointmentInfo = <?php echo json_encode($listAppointment) ?>;
        console.log(listAppointmentInfo);
        const btnFindApptCode = formBooked.querySelector('#btn-findApptCode');
        btnFindApptCode.onclick = () => {
            if(document.querySelector('#receivingPatientQueueNo').innerText != "") {
                const apptCodeInput = formBooked.querySelector('input[name="apptCode"]').value;
                findAppointmentInfo(apptCodeInput);
            }
        }
    // End function btn find appointment code 

    // Begin function find appointment code
        function findAppointmentInfo(apptCode) {
            let resultFind = listAppointmentInfo.find((element) => element.apptCode == apptCode);
            if(!resultFind) {
                formBooked.reset();
                alert("Mã lịch hẹn không tồn tại!");
                return;
            }
            if(resultFind.status == '2') {
                alert("Mã lịch hẹn đã được sử dụng!");
                return;
            } 
            let patientGuardianInfo = listPatientGuardianInfo.find((element)=> element.patientCode == resultFind.patientCode)
            renderMedicalTicketFormBooked(patientGuardianInfo, resultFind);
        }
    // End function find appointment code
    
    // Begin function render medical ticket form booked
        function renderMedicalTicketFormBooked(patientGuardianInfo, appointmentInfo) {
            formBooked.querySelector('input[name="patientCode"]').value = patientGuardianInfo.patientCode;

            // Hiển thị tên bệnh nhân
            formBooked.querySelector('input[name="patientName"]').value = patientGuardianInfo.patientName ? patientGuardianInfo.patientName : "";

            // Hiển thị giới tính bệnh nhân
            formBooked.querySelector('input[name="patientGender"]').value = patientGuardianInfo.patientGender === 'man' ? "Nam" : "Nữ";
            
            // Hiển thị ngày sinh bệnh nhân theo định dạng dd-mm-yyyy
            if (patientGuardianInfo.patientBirthday) {
                const birthday = new Date(patientGuardianInfo.patientBirthday);
                const day = String(birthday.getDate()).padStart(2, '0');
                const month = String(birthday.getMonth() + 1).padStart(2, '0');
                const year = birthday.getFullYear();
                formBooked.querySelector('input[name="patientBirthday"]').value = `${day}-${month}-${year}`;
            }

            // Tính toán tuổi bệnh nhân
            if (patientGuardianInfo.patientBirthday) {
                const birthday = new Date(patientGuardianInfo.patientBirthday);
                const age = calculateAge(birthday);
                formBooked.querySelector('input[name="patientAge"]').value = age;
            }

            // Hiển thị tên người giám hộ
            formBooked.querySelector('input[name="guardianName"]').value = patientGuardianInfo.guardianName ? patientGuardianInfo.guardianName : "";

            // Hiển thị giới tính người giám hộ
            formBooked.querySelector('input[name="guardianGender"]').value = patientGuardianInfo.guardianGender === 'man' ? "Nam" : "Nữ";

            if (patientGuardianInfo.guardianBirthday) {
                const birthday = new Date(patientGuardianInfo.guardianBirthday);
                const day = String(birthday.getDate()).padStart(2, '0');
                const month = String(birthday.getMonth() + 1).padStart(2, '0');
                const year = birthday.getFullYear();
                formBooked.querySelector('input[name="guardianBirthday"]').value = `${day}-${month}-${year}`;
            }

            // Tính toán tuổi người giám hộ
            if (patientGuardianInfo.guardianBirthday) {
                const guardianBirthday = new Date(patientGuardianInfo.guardianBirthday);
                const guardianAge = calculateAge(guardianBirthday);
                formBooked.querySelector('input[name="guardianAge"]').value = guardianAge;
            }

            // Hiển thị số điện thoại người giám hộ
            formBooked.querySelector('input[name="phoneNumber"]').value = patientGuardianInfo.phoneNumber ? patientGuardianInfo.phoneNumber : "";

            // Hiển thị địa chỉ người giám hộ
            formBooked.querySelector('textarea[name="address"]').value = patientGuardianInfo.address ? patientGuardianInfo.address : "";

            // Hiển thị triệu chứng khai báo trước đó
            formBooked.querySelector('textarea[name="symptom"]').value = appointmentInfo.symptom;

            let listPreSelectedService = listServices.filter((service) => 
                appointmentInfo.services.includes(service.serviceID)
            );

            formBooked.querySelector('textarea[name="selectedServiceNames"]').value = listPreSelectedService.map(element => element.serviceName).join(' - ');
            formBooked.querySelector('input[name="selectedServiceIDs"]').value = `[${appointmentInfo.services}]`;

            formBooked.querySelector('#total-price').innerText = formatterPrice.format(appointmentInfo.totalPrice);
            formBooked.querySelector('input[name="totalPrice"]').value = appointmentInfo.totalPrice;

            let preAppointedDoctor = appointmentInfo.doctorCode;
            let listDoctorByRoom = formBooked.querySelectorAll('select[name="doctorCode"] option');
            if(preAppointedDoctor) {
                listDoctorByRoom.forEach((element)=>{
                    if (element.value === preAppointedDoctor) { 
                        element.selected = true; 
                        element.disabled = false; 
                    } else { element.disabled = true;}
                })
            }

            formBooked.querySelector('#paymentStatus').innerText = appointmentInfo.paymentStatus == '0' ? 'Chưa thanh toán' : 'Đã thanh toán';
        }
    // Begin function render medical tocket form booked

    // Begin function listener tab pane active
        const formObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const target = mutation.target;
                    
                    // Check if the form does NOT have 'active' class
                    if (!target.classList.contains('active')) {
                        if (target.id === 'book') {
                            resetBookForm();
                        } else if (target.id === 'booked') {
                            resetBookedForm();
                        }
                    }
                }
            });
        });

        formObserver.observe(formBook, { 
            attributes: true, 
            attributeFilter: ['class'] 
        });

        formObserver.observe(formBooked, { 
            attributes: true, 
            attributeFilter: ['class'] 
        });
    // End function listener tab pane active

    // Begin function reset form book
        function resetBookForm() {
            console.log('resetBookForm');
            serviceCheckBtnList.forEach((element) => {
                element.checked = false;
            });
            selectedServices = [];
            totalPrice = 0;
            updateRegisteredServiceContainer();
            updateTotalPrice();
        }
    // End function reset form book

    // Begin function reset form booked
        function resetBookedForm() {
            formBooked.querySelector('#paymentStatus').innerText = '';
            formBooked.querySelector('#selectedServiceIDs').value = '[]';
            formBooked.querySelector('#total-price').innerText = '';
            formBooked.querySelector('input[name="totalPrice"]').value = '';
        }
    // End function reset form booked

    // Begin function render medical ticket form book
        function renderMedicalTicketFormBook(patientGuardianInfo) {
            // Hiển thị tên bệnh nhân
            document.querySelector('form#book input[name="patientName"]').value = patientGuardianInfo.patientName ? patientGuardianInfo.patientName : "";

            // Hiển thị giới tính bệnh nhân
            document.querySelector('form#book input[name="patientGender"]').value = patientGuardianInfo.patientGender === 'man' ? "Nam" : "Nữ";
            
            // Hiển thị ngày sinh bệnh nhân theo định dạng dd-mm-yyyy
            if (patientGuardianInfo.patientBirthday) {
                const birthday = new Date(patientGuardianInfo.patientBirthday);
                const day = String(birthday.getDate()).padStart(2, '0');
                const month = String(birthday.getMonth() + 1).padStart(2, '0');
                const year = birthday.getFullYear();
                document.querySelector('form#book input[name="patientBirthday"]').value = `${day}-${month}-${year}`;
            }

            // Tính toán tuổi bệnh nhân
            if (patientGuardianInfo.patientBirthday) {
                const birthday = new Date(patientGuardianInfo.patientBirthday);
                const age = calculateAge(birthday);
                document.querySelector('form#book input[name="patientAge"]').value = age;
            }

            // Hiển thị tên người giám hộ
            document.querySelector('form#book input[name="guardianName"]').value = patientGuardianInfo.guardianName ? patientGuardianInfo.guardianName : "";

            // Hiển thị giới tính người giám hộ
            document.querySelector('form#book input[name="guardianGender"]').value = patientGuardianInfo.guardianGender === 'man' ? "Nam" : "Nữ";

            if (patientGuardianInfo.guardianBirthday) {
                const birthday = new Date(patientGuardianInfo.guardianBirthday);
                const day = String(birthday.getDate()).padStart(2, '0');
                const month = String(birthday.getMonth() + 1).padStart(2, '0');
                const year = birthday.getFullYear();
                document.querySelector('form#book input[name="guardianBirthday"]').value = `${day}-${month}-${year}`;
            }
            
            // Tính toán tuổi người giám hộ
            if (patientGuardianInfo.guardianBirthday) {
                const guardianBirthday = new Date(patientGuardianInfo.guardianBirthday);
                const guardianAge = calculateAge(guardianBirthday);
                document.querySelector('form#book input[name="guardianAge"]').value = guardianAge;
            }

            // Hiển thị số điện thoại người giám hộ
            document.querySelector('form#book input[name="phoneNumber"]').value = patientGuardianInfo.phoneNumber ? patientGuardianInfo.phoneNumber : "";

            // Hiển thị địa chỉ người giám hộ
            document.querySelector('form#book textarea[name="address"]').value = patientGuardianInfo.address ? patientGuardianInfo.address : "";
        }
    // End function render medical ticket form book

    // Begin function calculate Age
        function calculateAge(birthday) {
            const today = new Date();
            let age = today.getFullYear() - birthday.getFullYear();
            const month = today.getMonth();
            const day = today.getDate();

            // Điều chỉnh nếu chưa đến sinh nhật trong năm nay
            if (month < birthday.getMonth() || (month === birthday.getMonth() && day < birthday.getDate())) {
                age--;
            }

            return age;
        }
    // End function calculate Age

    // Begin function render field need queue list data
        function renderQueueList(queueListData) {
            const activeQueueInfo = queueListData.find((element)=>element.status == '1');
            const htmlContent = queueListData
            .filter((element) => element.status == '0')
            .map((element, index) => {
                return `
                    <form action="<?=route('HandleQueueRoute')?>" method="POST">
                        <input type="hidden" name="queuePatientName" value="${element.patientName}">
                        <input type="hidden" name="queueID" value="${element.queueID}">
                        <input type="hidden" name="queueNo" value="${element.queueNo}">
                        <p class="border-bottom"><span style="font-size: 12px;">${element.assignedTime || ''}</p>
                        <p class="mt-2"><b>Trẻ:</b> ${element.patientName || ''}</p>
                        <p><b>STT:</b> ${element.queueNo || ''}</p>
                        <p class="mb-2 pb-2 border-bottom"><b>Loại:</b> ${element.apptID !== "0" ? "A" : "B"}</p>
                        <input class="btn btn-success py-1 px-1 " style="font-weight:bold;" type="submit" name="btnReception" value="Tiếp nhận">
                        <input class="btn btn-danger py-1 px-1 " style="font-weight:bold;" type="submit" name="btnCancelReception" value="Hủy">
                    </form>
                `;
            })
            .join('');
            counterContainer.innerHTML = 
            `
            <div class="px-3 mt-2">
                <i class="fa-solid fa-circle text-success"></i> Số lượng: 
                <b class="text-success">${
                    queueListData.reduce((totalNumberOfQueue, element) => {
                        if(element.status == '0') {
                            return totalNumberOfQueue + 1; 
                        }
                        return totalNumberOfQueue;  
                    }, 0)
                
                }</b>
            </div>
            ` +  htmlContent;
            
            // Render receiving queue
            if(activeQueueInfo) {
                document.querySelector('#receivingPatientName').innerText = activeQueueInfo.patientName;
                document.querySelector('#receivingPatientQueueNo').innerText = activeQueueInfo.queueNo;
                document.querySelector('#receivingPatientType').innerText = activeQueueInfo.apptID == '0' ? "Chưa đặt lịch" : "Đã đặt lịch";

                document.querySelector('form#book input[name="queueID"]').value = activeQueueInfo.queueID;
                document.querySelector('form#book input[name="queueNo"]').value = activeQueueInfo.queueNo;

                document.querySelector('form#booked input[name="queueID"]').value = activeQueueInfo.queueID;
                document.querySelector('form#booked input[name="queueNo"]').value = activeQueueInfo.queueNo;
            }
        }
    // End function render field need queue list Data

    // Begin function reset form not active
        const btnChangeForm = document.querySelectorAll('.section-patient__header .nav-link'); 
        const formContainer = document.querySelectorAll('.section-patient__body form');
        btnChangeForm.forEach((element) => {
            element.onclick = () => {
                const targetHref = element.getAttribute('href');
                formContainer.forEach((form) => {
                    if (`#${form.id}` !== targetHref) {
                        form.reset(); 
                    }
                });
            }
        })
    // End function reset form not active

    document.addEventListener('DOMContentLoaded', () => {
        counterContainer.addEventListener('click', (event) => {
            if(event.target.matches("input[name='btnReception']")) {
                event.preventDefault();
                console.log(event.target.parentElement);
                if(document.querySelector('form#book input[name="queueID"]').value) {
                    alert('Vui lòng hoàn tất phiếu khám cho bệnh nhân đang tiếp nhận !!!')
                    return;
                }
                const inputReceiveQueue = document.createElement('input');
                inputReceiveQueue.type = 'hidden';
                inputReceiveQueue.name = 'receiveQueue'; 
                inputReceiveQueue.value = true;

                event.target.form.appendChild(inputReceiveQueue);
                event.target.form.submit();
            }

            if (event.target.matches("input[name='btnCancelReception']")) {
                event.preventDefault(); // Ngừng gửi form mặc định

                const formQueue = event.target.parentElement;
                const btnConfirmCancelReception = document.querySelector('#confirmCancelReception');
                const modal = new bootstrap.Modal(document.getElementById("modalConfirmCancelReception"));
                modal.show();  // Hiển thị modal

                // Cập nhật thông tin bệnh nhân trong modal
                document.querySelector('#cancelReceptionPatientName').innerText = formQueue.querySelector('input[name="queuePatientName"]').value;
                document.querySelector('#cancelReceptionQueueNo').innerText = formQueue.querySelector('input[name="queueNo"]').value;


                // Xử lý khi người dùng xác nhận hủy
                btnConfirmCancelReception.onclick = () => {
                    const cancelQueueReception = document.createElement('input');
                    cancelQueueReception.type = 'hidden';
                    cancelQueueReception.name = 'cancelQueueReception'; 
                    cancelQueueReception.value = true;
                    formQueue.appendChild(cancelQueueReception);
                    formQueue.submit();  // Gửi form sau khi xác nhận
                    modal.hide();  // Đóng modal sau khi gửi form
                };
            }
        })
    })
</script>

<!-- Begin alert message respone from db (*Upgrade to toast message or something else) -->
    <?php
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $messageType = $_SESSION['message_type'];
        
            // Hiển thị thông báo bằng cách sử dụng JavaScript alert
            echo '
                <script>
                    alert("' . $_SESSION['message'] . '");
                </script>
            ';
        
            // Xóa thông báo khỏi session để tránh hiển thị lại sau khi refresh trang
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
    ?>
<!-- End alert message respone from db -->


<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeFooter.php"; ?>
