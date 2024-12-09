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
                                <form id="book" class="tab-pane active">
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <input type="hidden" name="queueID">
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
                                        <label for="" class="form-label w-25">Bác sĩ chỉ định:</label>
                                        <select name="" class="form-select w-75">
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                        </select>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Chọn phòng khám:</label>
                                        <select name="" class="form-select w-75" required>
                                            <option value="">Phòng khám 1 - BS. Phạm Minh Khang (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 2 - BS. Phạm Minh Khang (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 3 - BS. Phạm Minh Khang (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 4 - BS. Phạm Minh Khang (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 5 - BS. Phạm Minh Khang (Số BN đang chờ: 1)</option>
                                        </select>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Dịch vụ đăng ký:</label>
                                        <textarea name="selectedServiceNames" class="form-control w-75" disabled></textarea>
                                        <input type="hidden" name="selectedServiceIDs[]" id="selectedServiceIDs" required />
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b>Tổng tiền:</b></label>
                                        <div class="w-75 text-start">
                                            <b id="total-price"></b>
                                            <input type="hidden" name="total-price" id="total-price-input" value="0" required />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-3">
                                        <button type="submit" class="btn btn-success mx-1" id="btn-submit-form-book"><b>Hoàn Tất</b></button>
                                        <button class="btn btn-danger mx-1" type="reset"><b>Hủy</b></button>
                                    </div>
                                </form>
                                <form id="booked" class="tab-pane fade">
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Mã lịch hẹn:</b></label>
                                        <div class="input-group w-50">
                                            <input type="text" class="form-control w-75" placeholder="Nhập mã lịch hẹn..." name="patientID" required>
                                            <button class="btn btn-primary" style="font-weight: bold;"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Mã bệnh nhân:</b></label>
                                        <input type="text" name="" class="form-control w-75" disabled required>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Tên bệnh nhân:</label>
                                        <input type="text" class="form-control w-75" disabled required>
                                    </div>
                                    <div class="my-2 d-flex">
                                        <div class="col-4 w-25 text-end">
                                            <label for="" class="form-label">Giới tính:</label>
                                            <input class="text-center w-25" type="text" value="Nữ" disabled required> 
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Năm sinh:</label>
                                            <input class="text-center w-25" type="text" value="2020" disabled required>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Tuổi:</label>
                                            <input class="text-center w-25" type="text" value="4" disabled required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Tên người giám hộ:</label>
                                        <input type="text" class="form-control w-75" disabled required>
                                    </div>
                                    <div class="my-2 d-flex">
                                        <div class="col-4 w-25 text-end">
                                            <label for="" class="form-label">Giới tính:</label>
                                            <input class="text-center w-25" type="text" value="Nữ" disabled required> 
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Năm sinh:</label>
                                            <input class="text-center w-25" type="text" value="2020" disabled required>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label for="" class="form-label">Tuổi:</label>
                                            <input class="text-center w-25" type="text" value="4" disabled required>
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Số điện thoại:</label>
                                        <input type="text" class="form-control w-75" disabled required>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Địa chỉ:</label>
                                        <textarea class="form-control w-75" disabled required></textarea>
                                    </div>
                                    <hr>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Triệu chứng:</b></label>
                                        <textarea class="form-control w-75" required></textarea>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Bác sĩ chỉ định:</label>
                                        <select name="" class="form-select w-75">
                                            <option value=""></option>
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                            <option value="">Bác sĩ 1</option>
                                        </select>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Chọn phòng khám:</label>
                                        <select name="" class="form-select w-75" required>
                                            <option value="">Phòng khám 1 (Khoa tổng quát) (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 1 (Khoa tổng quát) (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 1 (Khoa tổng quát) (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 1 (Khoa tổng quát) (Số BN đang chờ: 1)</option>
                                            <option value="">Phòng khám 1 (Khoa tổng quát) (Số BN đang chờ: 1)</option>
                                        </select>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25">Dịch vụ đăng ký:</label>
                                        <input type="text" class="form-control w-75" disabled required>
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b>Tổng tiền:</b></label>
                                        <div class="w-75 text-start">
                                            <b>1.000.000 VNĐ</b>
                                            <b>(Đã thanh toán)</b>
                                            <input type="hidden" name="total-price" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-3">
                                        <button type="submit" class="btn btn-success mx-1" id="btn-submit-form-book"><b>Hoàn Tất</b></button>
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
    // document.querySelectorAll('medical-ticket-form .btn-success').addEventListener('click', function(e) {
    //     e.preventDefault(); 
        
    //     // const formData = new FormData(this); 
    //     // fetch('echo('SendDataMedicalFormRoute')', { 
    //     //     method: 'POST',  
    //     //     body: formData
    //     // })
    //     // .then(response => response.json()) 
    //     // .then(data => {
    //     //     if (data.success) {
    //     //         console.log(data);
    //                 openPrintMedicalForm();
    //     //     } else {
    //     //         alert("Lỗi khi gửi dữ liệu!");
    //     //     }
    //     // })
    //     // .catch(error => {
    //     //     console.error('Error:', error);
    //     //     alert("Có lỗi xảy ra khi gửi dữ liệu.");
    //     // });
    // });

    // Begin handle open print medical form 
        function openPrintMedicalForm(data) {
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
            printWindow.print();
        }
    // End handle open print medical form 

    // Begin write html to medical form print
        function layoutPrintMedicalForm() {
            return `
                <div id="medicalTicketContainer" class="container border p-4 shadow-sm">
                <div class="d-flex flex-column align-items-center">
                    <img src="<?php echo public_dir('img/logo/logo.png') ?>" width="60px" height="60px" alt="Logo">
                    <h6 id="slogan">Bác sĩ riêng của bạn</h6>
                </div>                
                <h5 class="text-center"><b>PHIẾU KHÁM BỆNH </b></h5>
                <div class="d-flex justify-content-between">
                    <p class="mb-0 mt-1"><b>Mã bệnh nhân: </b>#BN01345</p>
                    <p class="mb-0 mt-1"><b>Ngày khám: </b>01/02/2024</p>
                </div>
                <hr>

                <!-- Info Section1s -->
                <div class="info-section mb-4">
                    <div class="d-flex justify-content-between">
                        <p><strong>Họ tên:</strong> Phạm Ngọc Huấn </p>
                        <p><strong>Giới tính:</strong> Nam</p>
                        <p><strong>Tuổi:</strong> 18</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p><strong>Người giám hộ:</strong> Phạm Ngọc Huấn </p>
                        <p><strong>Giới tính:</strong> Nam</p>
                        <p><strong>Tuổi:</strong> 18</p>
                    </div>
                    <p><strong>Địa chỉ:</strong> 505 Minh Khai, Hai Bà Trưng, Hà Nội</p>
                    <p><strong>Số điện thoại:</strong> 0123456789</p>
                    <p><strong>Triệu chứng lâm sàng:</strong> Đau bụng</p>
                </div>

                <!-- Table Section -->
                <table class="table table-bordered" style="font-size: 13px;">
                    <thead class="table-success text-center">
                        <tr>
                            <th>STT</th>
                            <th>Tên Dịch Vụ</th>
                            <th>SL</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Khám dinh dưỡng</td>
                            <td class="text-center">1</td>
                            <td class="text-end">1.000.000đ</td>
                            <td class="text-end">1.000.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Khám dinh dưỡng</td>
                            <td class="text-center">1</td>
                            <td class="text-end">1.000.000đ</td>
                            <td class="text-end">1.000.000đ</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Tổng tiền: 2.000.000đ</td>
                        </tr>
                    </tfoot>
                </table>

                <!-- Footer -->
                <div class="footer mt-4 text-center">
                    <p class="fw-bold mb-2">STT</p>
                    <p class="display-6  text-success mb-2">0103</p>
                    <p class="text-muted">Phòng khám 1</p>
                </div>
            </div>
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

    // Begin function btn find patientCode
        const listPatientGuardianInfo = <?php echo(json_encode($listPatientGuardianInfo)); ?> 
        const formBook = document.querySelector('form#book');
        const btnFindPatientCode = formBook.querySelector('#btn-findPatientCode');
        btnFindPatientCode.onclick = () => {
            const patientCodeInput = document.querySelector('form#book input[name="patientCode"]').value;
            findPatientGuardianInfo(patientCodeInput);
        }

    // End function btn find patientCode

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

    // Begin function render medical ticket form
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
    // End function render medical ticket form

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
