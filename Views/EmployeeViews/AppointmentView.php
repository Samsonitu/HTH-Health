<?php 
    $Title = "Phiếu khám bệnh"; 

    $extraCSS = [                       
        public_dir('css/EmployeeCSS/EmpStyle.css')
    ];

    $extraJS = [
        public_dir('js/EmployeeJS/EmpScript.js'),
        public_dir('js/EmployeeJS/PatientRecordScript.js'),
    ];
?>

<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeHeader.php"; ?>

<!-- Code phần main ở đây -->
<div class="container-fuild">
    <div class="d-flex" style="min-height: 85vh;">
        <!-- Article -->
        <article class="flex-fill py-3 px-4">
            <!-- Begin list appointment info -->
                <div class="row gx-2">
                    <div class="section section-appointment-records">
                        <div class="section-appointment__header">
                            <div class="tag--title">Danh sách hồ sơ bệnh nhân</div>
                            <div class="section-appointment__controls">
                                <div class="section-appointment__search-group">
                                <button class="btn btn-default" id="btnOpenModalNewAppointment" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#modalFormNewAppointment">Tạo lịch hẹn mới</button>
                                    <div class="form-group">
                                        <select name="" class="form-select section-appointment__select">
                                            <option value="">Mã lịch hẹn</option>
                                            <option value="">Tên bệnh nhân</option>
                                            <option value="">Số điện thoại</option>
                                        </select>
                                        <input type="text" name="" class="form-control" placeholder="Nhập mã lịch hẹn cần tìm...">
                                    </div>
                                    <button class="btn btn-default" id="section-appointment__btn--search">Tìm kiếm</button>
                                </div>
                                <div class="section-appointment__export">
                                    <button class="btn btn-default" id="section-appointment__btn--export">Xuất ra Excel</button>
                                </div>
                            </div>
                        </div>
                        <div class="section-appointment__body">
                            <table>
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Mã lịch hẹn</th>
                                        <th rowspan="2">Mã bệnh nhân</th>
                                        <th colspan="7" class="border-bottom">Thông tin liên lạc tạm</th>
                                        <th rowspan="2">Thời gian tạo</th>
                                        <th rowspan="2">Trạng thái</th>
                                        <th rowspan="2">Sửa</th>
                                        <th rowspan="2">Xóa</th>
                                    </tr>
                                    <tr>
                                        <th>Tên bệnh nhân</th>
                                        <th>Giới tính</th>
                                        <th>Tuổi</th>
                                        <th>Triệu chứng</th>
                                        <th>Người giám hộ</th>
                                        <th>Điện thoại</th>
                                        <th>Đặt lịch lúc</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Render trong ngày -->
                                    <?php
                                        // Lấy ngày hiện tại
                                        $currentDate = date('Y-m-d');

                                        // Lặp qua danh sách $listAppointmentInfo
                                        foreach ($listAppointmentInfo as $index => $appointment) {
                                            // Kiểm tra nếu apptTime là cùng ngày với ngày hiện tại
                                            $apptDate = date('Y-m-d', strtotime($appointment['apptTime']));
                                            if ($apptDate === $currentDate) {
                                                // Tính tuổi từ patientBirthday
                                                $patientBirthday = new DateTime($appointment['patientBirthday']);
                                                $currentDateObj = new DateTime($currentDate);
                                                $age = $patientBirthday->diff($currentDateObj)->y; // Tính tuổi (năm)

                                                ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td>
                                                        <?php 
                                                        // Kiểm tra nếu apptCode tồn tại
                                                        if (!empty($appointment['apptCode'])) { 
                                                            echo htmlspecialchars($appointment['apptCode']);
                                                        } else { 
                                                            ?>
                                                            <button type="button" class="btn btn-success p-1" style="font-size: 11px !important; font-weight: bold;">Tạo mã</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= 
                                                            $appointment['patientCode'] 
                                                            ? htmlspecialchars($appointment['patientCode'])
                                                            : '<button type="button" class="btn btn-warning p-1" style="font-size: 11px !important; font-weight: bold;">Cập nhật</button>'; 
                                                        ?>
                                                    </td>
                                                    <td><?= htmlspecialchars($appointment['patientName']) ?></td>
                                                    <td><?= htmlspecialchars($appointment['patientGender']) == 'man' ? 'Nam' : 'Nữ' ?></td>
                                                    <td><?= $age ?></td> <!-- Hiển thị tuổi đã tính -->
                                                    <td><?= htmlspecialchars($appointment['symptom']) ?></td>
                                                    <td><?= htmlspecialchars($appointment['guardianName']) ?></td>
                                                    <td><?= htmlspecialchars($appointment['phoneNumber']) ?></td>
                                                    <td><?= htmlspecialchars($appointment['apptTime']) ?></td>
                                                    <td><?= htmlspecialchars($appointment['createAt'] ?? '') ?></td>
                                                    <td>
                                                        <?php  
                                                        if(htmlspecialchars($appointment['status']) == '-1') {
                                                            echo 'Chưa có mã lịch hẹn';
                                                        }elseif(htmlspecialchars($appointment['status']) == '0') {
                                                            echo 'Đã có mã lịch hẹn';
                                                        }else {
                                                            echo 'Đã sử dụng mã lịch hẹn';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                                    <td><i class="fa-regular fa-trash-can"></i></td>
                                                    <input type="hidden" name="apptID" value="<?= htmlspecialchars($appointment['apptID']) ?>">
                                                    <input type="hidden" name="apptTime" value="<?= htmlspecialchars($appointment['apptTime']) ?>">
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>


                                </tbody>
                            </table>
                        </div>
                        <div class="section-appointment__footer">
                            <ul class="pagination mb-0 me-3">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item "><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <div style="align-self: flex-end; font-size: 16px;" class="mx-1">...</div>
                                <li class="page-item"><a class="page-link" href="#">9</a></li>
                                <li class="page-item"><a class="page-link" href="#">10</a></li>
                            </ul>
                            <div class="d-flex align-items-center gap-2 me-2">Trang <input type="text" value="1" class="border text-center" style="padding: 6px 0; width: 30px;"></div>
                            
                            <div class="d-flex text-nowrap align-items-center gap-2 me-2">
                                Số mục / trang 
                                <select name="" class="form-select">
                                    <option value="">10</option>
                                    <option value="">20</option>
                                    <option value="">30</option>
                                    <option value="">40</option>
                                    <option value="">50</option>
                                    <option value="">100</option>
                                    <option value="">200</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End list short patient and guardian info -->
        </article>
        
        <!-- Begin modal update patient info -->
            <div class="modal fade" id="modalAdditionPatientCode">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật mã bệnh nhân</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?=route('AdditionPatientCodeAppointmentRoute')?>" method="POST">
                            <div class="modal-body">
                                <div class="input-group">
                                    <input type="text" id="search-patient-input" class="form-control w-75" placeholder="Tìm kiếm mã bệnh nhân...">
                                    <button type="button" class="btn btn-primary" id="btn-findPatientCode"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                                <hr>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="visibility: hidden;">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="patient-info-tab" data-bs-toggle="tab" data-bs-target="#patient-info" type="button" role="tab" aria-controls="patient-info" aria-selected="true">
                                        Thông tin bệnh nhân
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="guardian-info-tab" data-bs-toggle="tab" data-bs-target="#guardian-info" type="button" role="tab" aria-controls="guardian-info" aria-selected="false">
                                        Thông tin người giám hộ
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-info-tab" data-bs-toggle="tab" data-bs-target="#contact-info" type="button" role="tab" aria-controls="contact-info" aria-selected="false">
                                        Thông tin liên hệ
                                        </button>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content mt-3" id="myTabContent" style="visibility: hidden;">
                                    <!-- Thông tin bệnh nhân -->
                                    <div class="tab-pane fade show active" id="patient-info" role="tabpanel" aria-labelledby="patient-info-tab">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <label for="patientName" class="form-label text-danger"><b>Họ và tên bệnh nhân</b></label>
                                                <input type="text" class="form-control" id="patientName" disabled required>
                                            </div>
                                            <div class="col-2">
                                                <label for="patientGender" class="form-label">Giới tính</label>
                                                <input type="text" class="form-control" id="patientGender" disabled required>
                                            </div>
                                            <div class="col-4">
                                                <label for="patientBirthday" class="form-label">Ngày sinh</label>
                                                <input type="text" class="form-control" id="patientBirthday" disable required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="allergies" class="form-label">Dị ứng</label>
                                            <textarea class="form-control" id="allergies" rows="2" disable required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="medicalHistory" class="form-label">Lịch sử y tế</label>
                                            <textarea class="form-control" id="medicalHistory" rows="2" disable required></textarea>
                                        </div>
                                    </div>

                                    <!-- Thông tin người giám hộ -->
                                    <div class="tab-pane fade" id="guardian-info" role="tabpanel" aria-labelledby="guardian-info-tab">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <label for="guardianName" class="form-label text-danger"><b>Họ và tên người giám hộ</b></label>
                                                <input type="text" class="form-control" id="guardianName" disable required>
                                            </div>
                                            <div class="col-2">
                                                <label for="guardianGender" class="form-label">Giới tính</label>
                                                <input type="text" class="form-control" id="guardianGender" disable required>
                                            </div>
                                            <div class="col-4">
                                                <label for="guardianBirthday" class="form-label">Ngày sinh</label>
                                                <input type="text" class="form-control" id="guardianBirthday" disable required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="relationship" class="form-label">Mối quan hệ</label>
                                            <input type="text" class="form-control" id="relationship" disable required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="guardianJob" class="form-label">Nghề nghiệp</label>
                                            <input type="text" class="form-control" id="guardianJob" disable required> 
                                        </div>
                                    </div>

                                    <!-- Thông tin liên hệ -->
                                    <div class="tab-pane fade" id="contact-info" role="tabpanel" aria-labelledby="contact-info-tab">
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Số điện thoại</label>
                                            <input type="tel" class="form-control" id="phoneNumber" disable required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <textarea class="form-control" id="address" rows="2" disable required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="currentApptID">
                                    <input type="hidden" name="patientCode">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <input type="submit" class="btn btn-danger" name="btnAdditionPatienCode" value="Xác nhận">
                                </div>   
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        <!-- End modal update patient info -->
        
        <!-- Begin modal create appointment code -->
            <div class="modal fade" id="modalCreateAppointmentCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="<?=route('CreateAppointmentCodeRoute')?>" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tạo mã lịch hẹn</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="appointment-details__content">
                                        <div class="appointment-details__title">Thông tin bệnh nhân</div>
                                        <div class="d-flex mb-2">
                                            <label class="me-2">Họ và tên: </label> 
                                            <span><b id="appointment-details--patientName"></b></span>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <label class="me-2">Giới tính: </label> 
                                            <span id="appointment-details--patientGender"></span>
                                        </div>
                                        <div class="d-flex">
                                            <label class="me-2">Ngày sinh: </label> 
                                            <span id="appointment-details--patientBirthday"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="appointment-details__content">
                                        <div class="appointment-details__title">Triệu chứng | Biểu hiện</div>
                                        <textarea name="symptom" id="appointment-details--symptom" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="appointment-details__content">
                                        <div class="appointment-details__title">Thời gian hẹn</div>
                                        <input type="datetime-local" name="apptTime" class="form-control" id="appointment-details--apptTime">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="appointment-details__content">
                                        <div class="appointment-details__title">Chọn bác sĩ</div>
                                        <select name="doctorCode" class="form-select">
                                            <option value="">---</option>
                                            <?php
                                                if(isset($listDoctorInfo) && !empty($listDoctorInfo)) {
                                                    foreach($listDoctorInfo as $doctor) {
                                                        echo '
                                                            <option value="'.$doctor['doctorCode'].'">Bs. '.$doctor['doctorName'].'</option>
                                                        ';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="appointment-details__content">
                                        <div class="appointment-details__title">Chọn dịch vụ</div>
                                        <?php
                                            if(isset($listServices) && !empty($listServices)) {
                                                foreach($listServices as $service) {
                                                    echo '
                                                        <div class="service-items mx-2" style="display: inline-block;" data-price="'.$service['price'].'">
                                                            <input type="checkbox" name="serviceIDs[]" id="service'.$service['serviceID'].'" value="'.$service['serviceID'].'">
                                                            <label for="service'.$service['serviceID'].'">'.$service['serviceName'].'</label>
                                                            <span data->- Giá: '.number_format($service['price'],0,',','.').'đ</span>
                                                        </div>
                                                    ';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <b>Tổng tiền: </b><span id="appointment-details--totalPrice"></span>
                                    <input type="hidden" name="totalPrice"> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="appointment-details--apptID" name="apptID">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <input type="submit" class="btn btn-primary" id="btnConfirmCreateApptCode" name="createNewApptCode" value="Xác nhận">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End modal create appointment code -->
</div>
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

<script>
    const rowAppointmentData = document.querySelectorAll('.section-appointment__body tbody tr');
    rowAppointmentData.forEach((element, index) => {
        element.addEventListener('click', (event) => {
            if (event.target.classList.contains('btn-success')) {
                if(element.querySelector('td:nth-child(3n) button')) {
                    alert('Vui lòng cập nhật mã bệnh nhân trước!!!');
                    return;
                }
                const currentPatientCode = element.querySelector('td:nth-child(3n)').innerText;
                const symptom = element.querySelector('td:nth-child(7n)').innerText;
                const apptTime = element.querySelector('input[name="apptTime"]').value;
                const curentApptIDTarget = element.querySelector('input[name="apptID"]').value; 
                const modalElement = document.getElementById('modalCreateAppointmentCode');
                const modalInstance = new bootstrap.Modal(modalElement);
                modalInstance.show();
                renderModalCreateAppointment(currentPatientCode, symptom, apptTime, curentApptIDTarget);
            }

            if (event.target.classList.contains('btn-warning')) {
                const curentApptIDTarget = element.querySelector('input[name="apptID"]').value; 
                const modalElement = document.getElementById('modalAdditionPatientCode');
                const modalInstance = new bootstrap.Modal(modalElement);
                modalElement.querySelector('form').reset();
                modalInstance.show();
                modalElement.querySelector('input[name="currentApptID"]').value = curentApptIDTarget;
            }
        })
    })

    // Begin function btn find patientCode
        const listPatientGuardianInfo = <?php echo(json_encode($listPatientGuardianInfo)); ?> 
        const modalAdditionPatientCode = document.querySelector('#modalAdditionPatientCode');
        const btnFindPatientCode = modalAdditionPatientCode.querySelector('#btn-findPatientCode');
        btnFindPatientCode.onclick = (event) => {
            const patientCodeInput = modalAdditionPatientCode.querySelector('#search-patient-input').value;
            findPatientGuardianInfo(patientCodeInput);
        }
    // End function btn find patientCode

    // Begin function find patientInfo 
        function findPatientGuardianInfo (patientCode) {
            let resultFind = listPatientGuardianInfo.find((patientGuardianInfo) => patientGuardianInfo.patientCode == patientCode);
            if(!resultFind) {
                alert("Không tìm thấy mã bệnh nhân!");
                return;
            }
            renderModalAdditionPatientCode(resultFind);
        }
    // End function patietnInfo

    // Begin function render modal addition patient Code
        function renderModalAdditionPatientCode(patientInfo) {
            modalAdditionPatientCode.querySelector('ul').style = "visibility: unset;"
            modalAdditionPatientCode.querySelector('.tab-content').style = "visibility: unset;"
            modalAdditionPatientCode.querySelector('#patientName').value = patientInfo.patientName;
            modalAdditionPatientCode.querySelector('#patientGender').value = patientInfo.patientGender == 'man' ? 'Nam' : 'Nữ';
            modalAdditionPatientCode.querySelector('#patientBirthday').value = patientInfo.patientBirthday;
            modalAdditionPatientCode.querySelector('#allergies').value = patientInfo.allergies ? patientInfo.allergies : "Chưa bổ sung";
            modalAdditionPatientCode.querySelector('#medicalHistory').value = patientInfo.medicalHistory ? patientInfo.medicalHistory : "Chưa bổ sung";

            modalAdditionPatientCode.querySelector('#guardianName').value = patientInfo.guardianName;
            modalAdditionPatientCode.querySelector('#guardianGender').value = patientInfo.guardianGender == 'man' ? 'Nam' : 'Nữ';
            modalAdditionPatientCode.querySelector('#guardianBirthday').value = patientInfo.guardianBirthday;
            modalAdditionPatientCode.querySelector('#relationship').value = patientInfo.relationship;
            modalAdditionPatientCode.querySelector('#guardianJob').value = patientInfo.job;

            modalAdditionPatientCode.querySelector('#phoneNumber').value = patientInfo.phoneNumber;
            modalAdditionPatientCode.querySelector('#address').value = patientInfo.address;

            modalAdditionPatientCode.querySelector('input[name="patientCode"]').value = patientInfo.patientCode;            
        }
    // End function render modal update patient info

    // Begin function reset modal update patient info
        modalAdditionPatientCode.addEventListener('hidden.bs.modal', function () {
            modalAdditionPatientCode.querySelector('ul').style = "visibility: hidden;"
            modalAdditionPatientCode.querySelector('.tab-content').style = "visibility: hidden;"
            modalAdditionPatientCode.querySelector('form').reset();
        });
    // End function reset modal update patient info

    // Begin function validate before submit form update patient info 
        modalAdditionPatientCode.querySelector('input[name="btnAdditionPatienCode"]').onclick = (event) => {
            event.preventDefault();
            const form = modalAdditionPatientCode.querySelector('form');
            const apptID = form.querySelector('input[name="currentApptID"]').value;
            const patientCode = form.querySelector('input[name="patientCode"]').value;

            if (form.checkValidity() && patientCode !="" && apptID !="") {
                form.submit();  
            }
        };
    // End function validate before submit form update patient info

    // Begin function render modal create appointment
        const modalCreateAppointmentCode = document.querySelector('#modalCreateAppointmentCode');
        function renderModalCreateAppointment(patientCode, symptom, apptTime, curentApptIDTarget) {
            let currentPatientInfo = listPatientGuardianInfo.find((element)=> element.patientCode == patientCode);
            modalCreateAppointmentCode.querySelector('#appointment-details--patientName').innerText = currentPatientInfo.patientName;
            modalCreateAppointmentCode.querySelector('#appointment-details--patientGender').innerText = currentPatientInfo.patientGender == 'man' ? 'Nam' : 'Nữ';
            modalCreateAppointmentCode.querySelector('#appointment-details--patientBirthday').innerText = currentPatientInfo.patientBirthday;
            modalCreateAppointmentCode.querySelector('#appointment-details--symptom').innerText = symptom;
            modalCreateAppointmentCode.querySelector('#appointment-details--apptTime').value = apptTime;
            modalCreateAppointmentCode.querySelector('#appointment-details--apptID').value = curentApptIDTarget;
        }
    // End function render modal create appointment

    document.addEventListener('DOMContentLoaded', function () {
        // Lấy tất cả các checkbox trong danh sách dịch vụ
        const serviceItems = document.querySelectorAll('.service-items input[type="checkbox"]');
        const totalPriceElement = document.getElementById('appointment-details--totalPrice');
        const totalPriceInput = document.querySelector('input[name="totalPrice"]');

        // Hàm tính tổng tiền
        function updateTotalPrice() {
            let totalPrice = 0;

            // Lặp qua tất cả các checkbox
            serviceItems.forEach((checkbox) => {
                if (checkbox.checked) {
                    // Lấy giá từ thuộc tính data-price của cha (service-items)
                    const price = parseFloat(checkbox.closest('.service-items').getAttribute('data-price')) || 0;
                    totalPrice += price;
                }
            });

            // Cập nhật giao diện
            totalPriceElement.textContent = totalPrice.toLocaleString('vi-VN') + ' đ'; // Định dạng tiền tệ
            totalPriceInput.value = totalPrice; // Gán tổng tiền vào input hidden
        }

        // Lắng nghe sự kiện thay đổi trạng thái checkbox
        serviceItems.forEach((checkbox) => {
            checkbox.addEventListener('change', updateTotalPrice);
        });

        // Begin function validate before submit form crate appointment code
            const btnConfirmCreateApptCode = document.querySelector('#btnConfirmCreateApptCode');
            btnConfirmCreateApptCode.onclick = (event) => {
                event.preventDefault();
                let allowSubmit = false;
                serviceItems.forEach((checkbox)=>{
                    if(checkbox.checked) {
                        allowSubmit = true;
                    }
                })

                if(allowSubmit) {
                    modalCreateAppointmentCode.querySelector('form').submit();
                } else {
                    alert('Vui lòng chọn ít nhất một dịch vụ!');
                }
            }
        // End function validate before submit form crate appointment code
    });

</script>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeFooter.php"; ?>
