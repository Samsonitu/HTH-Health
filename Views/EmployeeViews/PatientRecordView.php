<?php 
    $Title = "Phiếu khám bệnh"; 

    $extraCSS = [                       
        public_dir('css/EmployeeCSS/EmpStyle.css')
    ];

    $extraJS = [
        public_dir('js/EmployeeJS/EmpScript.js'),
        public_dir('js/EmployeeJS/PatientRecordScript.js'),
    ];

    function formatGender($gender) {
        return $gender === "man" ? "Nam" : "Nữ";
    }
    
    function calculateAge($birthday) {
        if (!$birthday) return "-";
        $birthDate = new DateTime($birthday);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
        return $age . " tuổi";
    }
    
    function formatDate($date) {
        if (!$date) return "-";
        return (new DateTime($date))->format('d-m-Y');
    }
?>

<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeHeader.php"; ?>

<!-- Code phần main ở đây -->
<div class="container-fuild">
    <div class="d-flex" style="min-height: 85vh;">
        <!-- Article -->
        <article class="flex-fill py-3 px-4">
            <!-- Begin list short patient and guardian info -->
                <div class="row gx-2">
                    <div class="section section-patient-records">
                        <div class="section-patient-records__header">
                            <div class="tag--title">Danh sách hồ sơ bệnh nhân</div>
                            <div class="section-patient-records__controls">
                                <div class="section-patient-records__search-group">
                                <button class="btn btn-default" id="btnOpenModalNewPatient" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#modalFormNewPatient">Tạo mới hồ sơ</button>
                                    <div class="form-group">
                                        <select name="" class="form-select section-patient-records__select">
                                            <option value="">Mã bệnh nhân</option>
                                            <option value="">Tên bệnh nhân</option>
                                            <option value="">Số điện thoại</option>
                                        </select>
                                        <input type="text" name="" class="form-control" placeholder="Nhập mã bệnh nhân cần tìm...">
                                    </div>
                                    <button class="btn btn-default" id="section-patient-records__btn--search">Tìm kiếm</button>
                                </div>
                                <div class="section-patient-records__export">
                                    <button class="btn btn-default" id="section-patient-records__btn--export">Xuất ra Excel</button>
                                </div>
                            </div>
                        </div>
                        <div class="section-patient-records__body">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Mã bệnh nhân</th>
                                        <th>Bệnh nhân</th>
                                        <th>Giới tính</th>
                                        <th>Tuổi</th>
                                        <th>Người giám hộ</th>
                                        <th>Giới tính</th>
                                        <th>Tuổi</th>
                                        <th>Điện thoại</th>
                                        <th>Ngày tạo</th>
                                        <th>Lần khám cuối</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($listPatientGuardianInfo)): ?>
                                        <?php $countNo = 0; ?>
                                        <?php foreach ($listPatientGuardianInfo as $patientGuardianInfo): ?>
                                            <tr data-patientID="<?= htmlspecialchars($patientGuardianInfo['patientID']) ?>">
                                                <td class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                                <td><?= ++$countNo ?></td>
                                                <td><?= htmlspecialchars($patientGuardianInfo['patientCode']) ?></td>
                                                <td><?= htmlspecialchars($patientGuardianInfo['patientName']) ?></td>
                                                <td><?= formatGender($patientGuardianInfo['patientGender']) ?></td>
                                                <td><?= calculateAge($patientGuardianInfo['patientBirthday']) ?></td>
                                                <td>
                                                    <?= htmlspecialchars($patientGuardianInfo["guardianName"]) ?> 
                                                    (<?= htmlspecialchars($patientGuardianInfo["relationship"]) ?>)
                                                </td>
                                                <td><?= formatGender($patientGuardianInfo['guardianGender']) ?></td>
                                                <td><?= calculateAge($patientGuardianInfo['guardianBirthday']) ?></td>
                                                <td><?= htmlspecialchars($patientGuardianInfo['phoneNumber']) ?></td>
                                                <td><?= formatDate($patientGuardianInfo['createAt']) ?></td>
                                                <td>19/04/2022</td>
                                                <td><i class="fa-solid fa-pen-to-square"></i></td>
                                                <td><i class="fa-regular fa-trash-can"></i></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="15" class="text-center">Không có hồ sơ bệnh nào</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="section-patient-records__footer">
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
            
            <!-- Begin modal patient details -->
                <div class="modal fade" id="patient-details__modal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h6 class="modal-title"></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="patient-details__modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="patient-details__content">
                                            <div class="patient-details__title">Thông tin bệnh nhân</div>
                                            <div class="d-flex mb-2">
                                                <label class="col-4">Họ và tên</label> 
                                                <span><b class="col-8" id="patient-details--patientName"></b></span>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <label class="col-4">Giới tính</label> 
                                                <span class="col-8" id="patient-details--patientGender"></span>
                                            </div>
                                            <div class="d-flex">
                                                <label class="col-4">Ngày sinh / Tuổi</label> 
                                                <span class="col-8" id="patient-details--patientBirthday"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="patient-details__content">
                                            <div class="patient-details__title">Thông tin người giám hộ</div>
                                            <div class="d-flex mb-2">
                                                <label class="col-4">Họ và tên</label> 
                                                <span><b class="col-8" id="patient-details--guardianName"></b></span>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <label class="col-4">Giới tính</label> 
                                                <span class="col-8" id="patient-details--guardianGender"></span>
                                            </div>
                                            <div class="d-flex">
                                                <label class="col-4">Ngày sinh / Tuổi</label> 
                                                <span class="col-8" id="patient-details--guardianBirthday"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="patient-details__content">
                                            <div class="patient-details__title">Lịch sử y tế & dị ứng</div>
                                            <div class="d-flex mb-2">
                                                <label class="col-4">Lịch sử y tế</label> 
                                                <span class="col-8" id="patient-details--medicalHistory"></span>
                                            </div>
                                            <div class="d-flex">
                                                <label class="col-4">Dị ứng</label> 
                                                <span class="col-8" id="patient-details--allergies" class="w-75"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="patient-details__content">
                                            <div class="patient-details__title">Địa chỉ & liên hệ</div>
                                            <div class="d-flex mb-2">
                                                <label class="col-4">Địa chỉ</label> 
                                                <span class="col-8" id="patient-details--address"></span>
                                            </div>
                                            <div class="d-flex">
                                                <label class="col-4">Số điện thoại</label> 
                                                <span class="col-8" id="patient-details--phoneNumber"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 0 12px;">
                                    <div class="patient-details__content mb-0">
                                        <div class="patient-details__title">Lịch sử khám bệnh</div>
                                        <table class="mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Mã phiếu khám</th>
                                                    <th>Dịch vụ</th>
                                                    <th>Bác sĩ khám</th>
                                                    <th>Trạng thái</th>
                                                    <th>Ngày khám</th>
                                                    <th>Người tạo phiếu khám</th>
                                                    <th>Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>PK-0001</td>
                                                    <td >
                                                        Khám tổng quát (1) - 1.000.000đ
                                                        <br>
                                                        Khám dinh dưỡng (1) - 1.000.000đ
                                                    </td>
                                                    <td>Đinh Thị Xuân</td>
                                                    <td>Đã khám</td>
                                                    <td>26/11/2024</td>
                                                    <td>Nguyễn Thị Thanh Vân</td>
                                                    <td><b>2.000.000đ</b></td>
                                                </tr>
                                                <tr><td colspan="8"> </td></tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>PK-0001</td>
                                                    <td >
                                                        Khám tổng quát (1) - 1.000.000đ
                                                        <br>
                                                        Khám dinh dưỡng (1) - 1.000.000đ
                                                    </td>
                                                    <td>Đinh Thị Xuân</td>
                                                    <td>Đã khám</td>
                                                    <td>26/11/2024</td>
                                                    <td>Nguyễn Thị Thanh Thảo</td>
                                                    <td><b>2.000.000đ</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-success">In</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- End modal patient details -->

            <!-- Begin modal form new patient -->
                <div class="modal fade" id="modalFormNewPatient">
                    <div class="modal-dialog modal-xl">
                        <form action="<?=route('CreateNewPatientRoute')?>" method="post" class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h6 class="modal-title"><i class="fa-solid fa-pen"></i> Tạo hồ sơ bệnh nhân mới</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body row">
                                <!-- Begin patient input -->
                                    <div class="col-6" style="border-right: 1px solid #e1e1e1;">
                                        <div class="my-2 d-flex align-items-center">
                                            <label class="form-label w-25 text-danger"><b>Tên bệnh nhân:</b></label>
                                            <input type="text" class="form-control w-75" placeholder="Nhập họ và tên bệnh nhân" name="patient[name]" required>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label mb-0 w-25">Giới tính:</label>
                                            <div class="w-75 d-flex gap-2 align-items-center">
                                                <input type="radio" id="patientMan" name="patient[gender]" value="man">
                                                <label for="patientMan">Nam</label>
                                                <input type="radio" id="patientWoman" name="patient[gender]" value="woman">
                                                <label for="patientWoman">Nữ</label>
                                            </div>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 mb-0">Ngày sinh:</label>
                                            <input class="text-center form-control w-75" type="date" name="patient[birthday]" required>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 mb-0">Lịch sử y tế:</label>
                                            <textarea rows="5" class="form-control w-75" name="patient[medicalHistory]" placeholder="Nhập thông tin khám bệnh trước đó"></textarea>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 mb-0">Dị ứng:</label>
                                            <textarea rows="3" class="form-control w-75" name="patient[allergies]" placeholder="Nhập thông tin các thành phần thuốc dị ứng"></textarea>
                                        </div>
                                    </div>
                                <!-- End patient input -->

                                <!-- Begin guardian input -->
                                    <div class="col-6">
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 text-danger"><b>Tên người giám hộ:</b></label>
                                            <input type="text" class="form-control w-75" placeholder="Nhập họ và tên người giám hộ" name="guardian[name]" required>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25">Mối quan hệ:</label>
                                            <input type="text" class="form-control w-75" placeholder="Cha/Mẹ - Anh/Chị - Cô/Chú"
                                            name="patient[relationship]" required>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label for="" class="form-label mb-0 w-25">Giới tính:</label>
                                            <div class="w-75 d-flex gap-2 align-items-center">
                                                <input id="guardianMan" type="radio" name="guardian[gender]" value="man" required>
                                                <label for="guardianMan">Nam</label>
                                                <input id="guardianWoman" type="radio" name="guardian[gender]" value="woman">
                                                <label for="guardianWoman">Nữ</label>
                                            </div>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 mb-0">Ngày sinh:</label>
                                            <input class="text-center form-control w-75" type="date" name="guardian[birthday]" required>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 mb-0">Nghề nghiệp:</label>
                                            <input class="form-control w-75" type="text" name="guardian[job]" placeholder="Nhập nghề nghiệp của người giám hộ" required>
                                        </div>
                                    </div>
                                <!-- End guardian input -->

                                <!-- Begin contact input -->
                                    <div class="col-10">
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 text-end">Số điện thoại:</label>
                                            <input type="tel" class="form-control w-75" placeholder="Nhập số điện thoại người giám hộ" name="guardian[phoneNumber]" required>
                                        </div>
                                        <div class="my-2 d-flex gap-3 align-items-center">
                                            <label class="form-label w-25 text-end">Địa chỉ:</label>
                                            <textarea class="form-control w-75" placeholder="Nhập địa chỉ bệnh nhân ở" name="guardian[address]" required></textarea>
                                        </div>
                                    </div>
                                <!-- End contact input -->
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="hidden" name="empCode" value="<?=$_SESSION['employeeInfo']['empCode']?>">
                                <input type="submit" class="btn btn-success" name="createNewPatient" value="Tạo">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>

                        </form>
                    </div>
                </div>
            <!-- End modal form new patient -->
        </article>
    </div>
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
    const listPatientGuardianInfo = <?php echo json_encode($listPatientGuardianInfo); ?>;
    const modalPatientDetails = document.querySelector('#patient-details__modal');
    // Begin handle modal patient record
        document.querySelector('.section-patient-records__body tbody').addEventListener('click', (event) => {
            const btn = event.target.closest('tr');
            if (btn && btn.dataset.patientid) {
                const patientID = btn.dataset.patientid;
                const patientCurrent = getPatientInfoByID(patientID);
                const modalInstance = bootstrap.Modal.getInstance(modalPatientDetails) || new bootstrap.Modal(modalPatientDetails);
                if (!modalPatientDetails.classList.contains('show')) {
                    modalInstance.show();
                }
                renderModalPatientDetails(patientCurrent);
            }
        });

        function renderModalPatientDetails(patient) {
            modalPatientDetails.querySelector('.modal-title').innerHTML = `<div>CHI TIẾT HỒ SƠ : ${patient.patientName}</div> 
            <small>Nhận viên tạo: ${patient.employeeName}</small>`;
            modalPatientDetails.querySelector('#patient-details--patientName').innerText = `: ${patient.patientName}`;
            modalPatientDetails.querySelector('#patient-details--patientGender').innerText = `: ${patient.patientGender == 'man' ? "Nam" 
            : "Nữ"}`;

            const patientBirthday = calculateAgeAndFormat(patient.patientBirthday);
            modalPatientDetails.querySelector('#patient-details--patientBirthday').innerText = `: ${patientBirthday.formattedBirthday} (${patientBirthday.age} tuổi)`;

            modalPatientDetails.querySelector('#patient-details--guardianName').innerHTML = `: ${patient.guardianName} (${patient.relationship})`;
            modalPatientDetails.querySelector('#patient-details--guardianGender').innerHTML = `: ${patient.guardianGender == 'man' ? "Nam" : "Nữ"}`;

            const guardianBirthday = calculateAgeAndFormat(patient.guardianBirthday);
            modalPatientDetails.querySelector('#patient-details--guardianBirthday').innerText = `: ${guardianBirthday.formattedBirthday} (${guardianBirthday.age} tuổi)`;

            modalPatientDetails.querySelector('#patient-details--medicalHistory').innerText = `: ${patient.medicalHistory ? patient.medicalHistory : 'Chưa bổ sung'}`;
            modalPatientDetails.querySelector('#patient-details--allergies').innerText = `: ${patient.allergies ? patient.allergies : 'Chưa bổ sung'}`;

            modalPatientDetails.querySelector('#patient-details--address').innerText = `: ${patient.address}`;
            modalPatientDetails.querySelector('#patient-details--phoneNumber').innerText = `: ${patient.phoneNumber}`;
        }
    // End handle modal patient record

    // Begin function filter patient by patientID
        function getPatientInfoByID(patientID) {
            console.log(listPatientGuardianInfo.find((patientGuardianInfo) => patientGuardianInfo.patientID == patientID));
            return listPatientGuardianInfo.find((patientGuardianInfo) => patientGuardianInfo.patientID == patientID)
        }
    // End function filter patient by patientID

    // Begin function handle age
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
            const formattedBirthday = `${String(birthDate.getDate()).padStart(2, '0')}-${String(birthDate.getMonth() + 1).padStart(2, '0')}-${birthDate.getFullYear()}`;

            return { age, formattedBirthday }; // Trả về đối tượng chứa tuổi và ngày định dạng
        }
    // End function handle age
</script>
<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeFooter.php"; ?>
