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
                            <div class="d-flex gap-3">
                                <div class="tag--title">Danh sách hồ sơ bệnh nhân</div>
                                <ul class="nav align-items-center">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#confirmed">Chính thức</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#temporary">Tạm thời</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-patient-records__controls">
                                <div class="section-patient-records__search-group">
                                <button class="btn btn-default" id="btnOpenModalNewPatient" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#modalFormNewPatient">Tạo mới hồ sơ</button>
                                    <div class="form-group">
                                        <select name="" class="form-select section-patient-records__select">
                                            <option value="Tên bệnh nhân">Tên bệnh nhân</option>
                                            <option value="Số điện thoại">Số điện thoại</option>
                                            <option value="Mã bệnh nhân">Mã bệnh nhân</option>
                                        </select>
                                        <input type="text" name="" class="form-control" placeholder="Nhập tên bệnh nhân cần tìm...">
                                    </div>
                                    <button class="btn btn-default" id="section-patient-records__btn--search">Tìm kiếm</button>
                                </div>
                                <div class="section-patient-records__export">
                                    <button class="btn btn-default" id="section-patient-records__btn--export">Xuất ra Excel</button>
                                </div>
                            </div>
                        </div>
                        <div class="section-patient-records__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="confirmed">
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
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($listPatientGuardianInfo)): ?>
                                                <?php $countNo = 0; ?>
                                                <?php foreach ($listPatientGuardianInfo as $patientGuardianInfo): ?>
                                                    <?php if ($patientGuardianInfo['patientCode']) :?>
                                                        <tr data-patientCode="<?= htmlspecialchars($patientGuardianInfo['patientCode']) ?>">
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
                                                            <td><i class="fa-solid fa-pen-to-square"></i></td>
                                                            <td><i class="fa-regular fa-trash-can"></i></td>
                                                        </tr>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="temporary">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Bệnh nhân</th>
                                                <th>Giới tính</th>
                                                <th>Tuổi</th>
                                                <th>Người giám hộ</th>
                                                <th>Điện thoại</th>
                                                <th>Ngày tạo</th>
                                                <th>Hoàn thiện</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($listPatientGuardianInfo)): ?>
                                                <?php $countNo = 0; ?>
                                                <?php foreach ($listPatientGuardianInfo as $patientGuardianInfo): ?>
                                                    <?php if (!$patientGuardianInfo['patientCode']) :?>
                                                        <tr data-patientID="<?= htmlspecialchars($patientGuardianInfo['patientID']) ?>">
                                                            <td class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                                            <td><?= ++$countNo ?></td>
                                                            <td><?= htmlspecialchars($patientGuardianInfo['patientName']) ?></td>
                                                            <td><?= formatGender($patientGuardianInfo['patientGender']) ?></td>
                                                            <td><?= calculateAge($patientGuardianInfo['patientBirthday']) ?></td>
                                                            <td>
                                                                <?= htmlspecialchars($patientGuardianInfo["guardianName"]) ?> 
                                                            </td>
                                                            <td><?= htmlspecialchars($patientGuardianInfo['phoneNumber']) ?></td>
                                                            <td><?= formatDate($patientGuardianInfo['createAt']) ?></td>
                                                            <td><button class="btn btn-primary btn-sm">Cập nhật</button></td>
                                                            <td><i class="fa-regular fa-trash-can"></i></td>
                                                        </tr>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="section-patient-records__footer">
                            <ul class="pagination mb-0 me-3">
                                <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-page="3">3</a></li>
                                <div style="align-self: flex-end; font-size: 16px;" class="mx-1">...</div>
                                <li class="page-item"><a class="page-link" href="#" data-page="9">9</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-page="10">10</a></li>
                            </ul>
                            <div class="d-flex align-items-center gap-2 me-2">
                                Trang <input type="text" value="1" id="pageInput" class="border text-center" style="padding: 6px 0; width: 30px;">
                            </div>
                            <div class="d-flex text-nowrap align-items-center gap-2 me-2">
                                Số mục / trang 
                                <select name="" class="form-select" id="itemsPerPage">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
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
                                                <label class="col-4">Ngày sinh</label> 
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
                                                <label class="col-4">Ngày sinh</label> 
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
                                                    <th>Ngày khám</th>
                                                    <th>Người tạo phiếu khám</th>
                                                    <th>Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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

            <!-- Begin modal form update patient info -->
                <div class="modal fade" id="modalFormUpdatePatient">
                    <div class="modal-dialog modal-xl">
                        <form action="<?=route('UpdatePatientGuardianInfoRoute')?>" method="post" class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h6 class="modal-title"></h6>
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
                                                <input type="radio" id="patientMan" name="patient[gender]" value="man" required>
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
                                <input type="hidden" name="patient[patientCode]">
                                <input type="hidden" name="guardian[guardianCode]">

                                <input type="hidden" name="guardian[guardianID]">
                                <input type="hidden" name="patient[patientID]">
                                <input type="submit" class="btn btn-success" name="updatePatientInfo" value="Cập nhật">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>

                        </form>
                    </div>
                </div>
            <!-- End modal form update patient info -->

            <!-- Begin modal confirm delete patient record -->
                <div class="modal fade" id="modalConfirmDeletePatientRecord">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= route('DeletePatientRecordRoute') ?>" method="POST">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Xác nhận xóa hồ sơ bệnh nhân</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body text-center fs-6">
                                    <p>Xác nhận xóa hồ sơ bệnh nhân<br>
                                    Bệnh nhân: <b id="deleteRecordPatientName"></b><br>
                                    Mã bệnh nhân: <b id="patientCode"></b></p>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <input type="hidden" name="patientCode">
                                    <input type="hidden" name="guardianCode">

                                    <input type="hidden" name="patientID">
                                    <input type="hidden" name="guardianID">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <input type="submit" class="btn btn-danger" name="confirmDeletePatientRecord" value="Xác nhận">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- End modal confirm delete patient record -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    const listPatientGuardianInfo = <?php echo json_encode($listPatientGuardianInfo); ?>;
    const listExaminationHistory = <?php echo json_encode($listExaminationHistory); ?>;
    const modalPatientDetails = document.querySelector('#patient-details__modal');
    const modalUpdatePatientInfo = document.querySelector('#modalFormUpdatePatient');
    const modalConfirmDeletePatient = document.querySelector('#modalConfirmDeletePatientRecord');
    const btnExportExcel = document.querySelector('#section-patient-records__btn--export');
    const sectionPatientRecordControls = document.querySelector('.section-patient-records__controls');
    const searchButton = sectionPatientRecordControls.querySelector('#section-patient-records__btn--search');
    const selectBox = sectionPatientRecordControls.querySelector('.section-patient-records__select');
    const inputBox = sectionPatientRecordControls.querySelector('.form-control');
    const rows = document.querySelectorAll('#confirmed tbody tr, #temporary tbody tr'); // Lấy tất cả các dòng trong bảng
    const placeholderMap = {
        "Mã bệnh nhân": "Nhập mã bệnh nhân cần tìm...",
        "Tên bệnh nhân": "Nhập tên bệnh nhân cần tìm...",
        "Số điện thoại": "Nhập số điện thoại cần tìm..."
    };
    const patientListData = Array.from(rows).map(row => {
        return Array.from(row.children).map(cell => cell.textContent.trim());
    });

    document.querySelector('.section-patient-records__body #confirmed tbody').addEventListener('click', (event) => {
    
        const editIcon = event.target.closest('.fa-solid.fa-pen-to-square');
        if (editIcon) {
            event.stopPropagation(); 
            const parentRow = editIcon.closest('tr');
            if (parentRow && parentRow.dataset.patientcode) {
                const patientCode = parentRow.dataset.patientcode; 
                const patientCurrent = getCurrentPatientInfo(patientCode);

                const modalInstance = bootstrap.Modal.getInstance(modalUpdatePatientInfo) || new bootstrap.Modal(modalUpdatePatientInfo);
                if (!modalUpdatePatientInfo.classList.contains('show')) {
                    modalInstance.show();
                }
                console.log(patientCurrent);
                
                renderModalUpdatePatientInfo(patientCurrent);
            }
            return; 
        }

        const trashIcon = event.target.closest('.fa-regular.fa-trash-can');
        if (trashIcon) {
            event.stopPropagation(); 
            const parentRow = trashIcon.closest('tr');
            if (parentRow && parentRow.dataset.patientcode) {
                const patientCode = parentRow.dataset.patientcode; 
                const patientCurrent = getCurrentPatientInfo(patientCode);

                const modalInstance = bootstrap.Modal.getInstance(modalConfirmDeletePatient) || new bootstrap.Modal(modalConfirmDeletePatient);
                if (!modalConfirmDeletePatient.classList.contains('show')) {
                    modalInstance.show();
                }
                console.log(patientCurrent);
                
                renderModalConfirmDeleteRecordPatient(patientCurrent);
            }
            return; 
        }
        
        const btn = event.target.closest('tr');
        if (btn && btn.dataset.patientcode) {
            const patientCode = btn.dataset.patientcode;
            const patientCurrent = getCurrentPatientInfo(patientCode);
            const modalInstance = bootstrap.Modal.getInstance(modalPatientDetails) || new bootstrap.Modal(modalPatientDetails);
            if (!modalPatientDetails.classList.contains('show')) {
                modalInstance.show();
            }
            renderModalPatientDetails(patientCurrent);
        }
    });

    document.querySelector('.section-patient-records__body #temporary tbody').addEventListener('click', (evnet) => {
        const completeBtn = event.target.closest('.btn.btn-primary.btn-sm');
        if (completeBtn) {
            event.stopPropagation(); 
            const parentRow = completeBtn.closest('tr');
            if (parentRow && parentRow.dataset.patientid) {
                const patientID = parentRow.dataset.patientid; 
                const patientCurrent = getCurrentPatientInfo(null, patientID);

                const modalInstance = bootstrap.Modal.getInstance(modalUpdatePatientInfo) || new bootstrap.Modal(modalUpdatePatientInfo);
                if (!modalUpdatePatientInfo.classList.contains('show')) {
                    modalInstance.show();
                }
                console.log(patientCurrent);
                
                renderModalUpdatePatientInfo(patientCurrent);
            }
            return; 
        }

        const trashIcon = event.target.closest('.fa-regular.fa-trash-can');
        if (trashIcon) {
            event.stopPropagation(); 
            const parentRow = trashIcon.closest('tr');
            if (parentRow && parentRow.dataset.patientid) {
                const patientID = parentRow.dataset.patientid; 
                const patientCurrent = getCurrentPatientInfo(null, patientID);

                const modalInstance = bootstrap.Modal.getInstance(modalConfirmDeletePatient) || new bootstrap.Modal(modalConfirmDeletePatient);
                if (!modalConfirmDeletePatient.classList.contains('show')) {
                    modalInstance.show();
                }
                console.log(patientCurrent);
                
                renderModalConfirmDeleteRecordPatient(patientCurrent);
            }
            return; 
        }
    });

    // Begin function render modal patient details
        function renderModalPatientDetails(patient) {
        // Patient & Guardian Basic Info
            modalPatientDetails.querySelector('.modal-title').innerHTML = `<div>CHI TIẾT HỒ SƠ : ${patient[0].patientName}</div> 
            <small>Nhận viên tạo: ${patient[0].employeeName}</small>`;
            modalPatientDetails.querySelector('#patient-details--patientName').innerText = `: ${patient[0].patientName}`;
            modalPatientDetails.querySelector('#patient-details--patientGender').innerText = `: ${patient[0].patientGender == 'man' ? "Nam" 
            : "Nữ"}`;

            const patientBirthday = calculateAgeAndFormat(patient[0].patientBirthday);
            modalPatientDetails.querySelector('#patient-details--patientBirthday').innerText = `: ${patientBirthday.formattedBirthday} (${patientBirthday.age} tuổi)`;

            modalPatientDetails.querySelector('#patient-details--guardianName').innerHTML = `: ${patient[0].guardianName} (${patient[0].relationship})`;
            modalPatientDetails.querySelector('#patient-details--guardianGender').innerHTML = `: ${patient[0].guardianGender == 'man' ? "Nam" : "Nữ"}`;

            const guardianBirthday = calculateAgeAndFormat(patient[0].guardianBirthday);
            modalPatientDetails.querySelector('#patient-details--guardianBirthday').innerText = `: ${guardianBirthday.formattedBirthday} (${guardianBirthday.age} tuổi)`;

            modalPatientDetails.querySelector('#patient-details--medicalHistory').innerText = `: ${patient[0].medicalHistory ? patient.medicalHistory : 'Chưa bổ sung'}`;
            modalPatientDetails.querySelector('#patient-details--allergies').innerText = `: ${patient[0].allergies ? patient.allergies : 'Chưa bổ sung'}`;

            modalPatientDetails.querySelector('#patient-details--address').innerText = `: ${patient[0].address}`;
            modalPatientDetails.querySelector('#patient-details--phoneNumber').innerText = `: ${patient[0].phoneNumber}`;

        // Patient Examination History
            let trHTMLExminationHistory = "";
        // Gom nhóm các phần tử có cùng formID
            const groupedData = patient[1].reduce((acc, current) => {
            const existing = acc.find(item => item.formID === current.formID);

                if (existing) {
                    // Gộp serviceName và thêm trạng thái (đã khám)
                    existing.services.push(
                        `${current.serviceName} (1) - ${formatCurrencyVND(current.price)} ${current.status === '1' ? '(đã khám)' : '(chưa khám)'}`
                    );
                } else {
                    // Nếu chưa có, khởi tạo phần tử mới
                    acc.push({
                        ...current,
                        services: [`${current.serviceName} (1) - ${formatCurrencyVND(current.price)} ${current.status === '1' ? '(đã khám)' : '(chưa khám)'}`]
                    });
                }
                return acc;
            }, []);

        // Tạo HTML từ dữ liệu đã gom nhóm
            groupedData.forEach((element, index) => {
                trHTMLExminationHistory += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${element.formID}</td>
                    <td>
                        ${element.services.join('<br>')}
                    </td>
                    <td>${element.employeeName}</td>
                    <td>${formatDateTime(element.createAt)}</td>
                    <td>${element.doctorName}</td>
                    <td><b>${formatCurrencyVND(element.totalPrice)}</b></td>
                </tr>
                <tr><td colspan="8"></td></tr>
                `;
            });
            modalPatientDetails.querySelector('tbody').innerHTML = trHTMLExminationHistory;
        }
    // End function render modal patient details

    // Begin function render modal update patient info
        function renderModalUpdatePatientInfo(patient) {
            // Determine if patient is an array or a single object
            const patientData = Array.isArray(patient) ? patient[0] : patient;

            // Patient & Guardian Basic Info
            modalUpdatePatientInfo.querySelector('.modal-title').innerHTML = `
            <i class="fa-solid fa-pen"></i> 
            ${patientData.employeeName ? 
            `Cập nhật hồ sơ bệnh nhân: ${patientData.patientName}
                <br>
                <small>Nhân viên tạo: ${patientData.employeeName || "N/A"}</small>
            ` 
            : 
            `Hoàn tất hồ sơ bệnh nhân: ${patientData.patientName || ""}`}`;

            modalUpdatePatientInfo.querySelector('input[name="patient[name]"]').value = patientData.patientName || "";

            if (patientData.patientGender === 'man') {
                modalUpdatePatientInfo.querySelector('input#patientMan').checked = true;
            } else {
                modalUpdatePatientInfo.querySelector('input#patientWoman').checked = true;
            }

            modalUpdatePatientInfo.querySelector('input[name="patient[birthday]"]').value = patientData.patientBirthday || "";
            
            modalUpdatePatientInfo.querySelector('textarea[name="patient[medicalHistory]"]').value = patientData.medicalHistory || "";
            modalUpdatePatientInfo.querySelector('textarea[name="patient[allergies]"]').value = patientData.allergies || "";

            modalUpdatePatientInfo.querySelector('input[name="guardian[name]"]').value = patientData.guardianName || "";

            if (patientData.guardianGender === 'man') {
                modalUpdatePatientInfo.querySelector('input#guardianMan').checked = true;
            } else {
                modalUpdatePatientInfo.querySelector('input#guardianWoman').checked = true;
            }

            modalUpdatePatientInfo.querySelector('input[name="patient[relationship]"]').value = patientData.relationship || "";
            modalUpdatePatientInfo.querySelector('input[name="guardian[birthday]"]').value = patientData.guardianBirthday || "";
            modalUpdatePatientInfo.querySelector('input[name="guardian[job]"]').value = patientData.job || "";

            modalUpdatePatientInfo.querySelector('input[name="guardian[phoneNumber]"]').value = patientData.phoneNumber || "";
            modalUpdatePatientInfo.querySelector('textarea[name="guardian[address]"]').innerText = patientData.address || "";

            modalUpdatePatientInfo.querySelector('input[name="patient[patientCode]"]').value = patientData.patientCode || "";
            modalUpdatePatientInfo.querySelector('input[name="guardian[guardianCode]"]').value = patientData.guardianCode || "";

            modalUpdatePatientInfo.querySelector('input[name="patient[patientID]"]').value = patientData.patientID || "";
            modalUpdatePatientInfo.querySelector('input[name="guardian[guardianID]"]').value = patientData.guardianID || "";
        }
    // End function render modal update patient info

    // Begin function render modal delete record patient
        function renderModalConfirmDeleteRecordPatient(patient) {
            const patientData = Array.isArray(patient) ? patient[0] : patient;

            modalConfirmDeletePatient.querySelector('#deleteRecordPatientName').innerText = patientData.patientName;
            modalConfirmDeletePatient.querySelector('#patientCode').innerText = patientData.patientCode ? patientData.patientCode : 'Chưa cấp';
            modalConfirmDeletePatient.querySelector('input[name="patientCode"]').value = patientData.patientCode ? patientData.patientCode : '';
            modalConfirmDeletePatient.querySelector('input[name="guardianCode"]').value = patientData.guardianCode ? patientData.guardianCode : '';

            modalConfirmDeletePatient.querySelector('input[name="patientID"]').value = patientData.patientID ? patientData.patientID : '';
            modalConfirmDeletePatient.querySelector('input[name="guardianID"]').value = patientData.guardianID ? patientData.guardianID : '';
        }
    // End function render modal delete record patient

    // Begin function filter patient info 
        function getCurrentPatientInfo(patientCode = null, patientID) {
            if(!patientCode) {
                return listPatientGuardianInfo
                .find((patientGuardianInfo) => patientGuardianInfo.patientID == patientID);
            }
            
            const patientGuardianInfo = listPatientGuardianInfo
            .find((patientGuardianInfo) => patientGuardianInfo.patientCode == patientCode);

            const patientExaminationHistory = listExaminationHistory
            .filter((patientExaminationHistory)=> patientExaminationHistory.patientCode == patientCode);

            return [].concat(patientGuardianInfo || [], [patientExaminationHistory] || []);
        }
    // End function filter patient info 
    
    // Begin function export patientlist to excel
        btnExportExcel.onclick = () => {
            const header = [
                "patientID", "guardianID", "empCode", "patientCode", "patientName", "accID", "address", "allergies", "confirmAt", 
                "createAt", "employeeName", "guardianBirthday", "guardianCode", "guardianGender", "guardianName", "isTemporary", 
                "job", "medicalHistory", "patientBirthday", "phoneNumber", "relationship"
                ];
            const ws = XLSX.utils.json_to_sheet(listPatientGuardianInfo, {header: header});
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Patient Records");
            XLSX.writeFile(wb, "ho_so_benh_nhan.xlsx");
        }
    // End function export patientlist to excel

    // Begin listening to the event options to search
        selectBox.addEventListener('change', () => {
            const selectedOption = selectBox.value; // Lấy giá trị của option được chọn
            inputBox.placeholder = placeholderMap[selectedOption] || "Nhập thông tin cần tìm..."; // Cập nhật placeholder
        });
    // End listening to the event options to search

    // Begin function highlight row data match input search
        function highlightMatches(row, searchType, inputValue) {
            let patientCode = row.querySelector('td:nth-child(3)'); // Mã bệnh nhân cho tab #confirmed
            let patientName = row.querySelector('td:nth-child(4)'); // Tên bệnh nhân cho tab #confirmed
            let phoneNumber = row.querySelector('td:nth-child(10)'); // Số điện thoại cho tab #confirmed

            // Kiểm tra nếu là tab #temporary, thì cập nhật lại các chỉ số cột
            if (row.closest('.tab-pane').id === "temporary") {
                patientName = row.querySelector('td:nth-child(3)'); // Tên bệnh nhân cho tab #temporary
                phoneNumber = row.querySelector('td:nth-child(7)'); // Số điện thoại cho tab #temporary
            }

            // Reset màu nền trước khi highlight
            [patientCode, patientName, phoneNumber].forEach(cell => cell.style.backgroundColor = '');

            if (!inputValue) return; // Không làm gì nếu input trống

            // Highlight ô khớp với điều kiện
            if (searchType === "Mã bệnh nhân" && patientCode.innerText.includes(inputValue)) {
                patientCode.style.backgroundColor = '#4FB5DD';
            } else if (searchType === "Tên bệnh nhân" && patientName.innerText.includes(inputValue)) {
                patientName.style.backgroundColor = '#4FB5DD';
            } else if (searchType === "Số điện thoại" && phoneNumber.innerText.includes(inputValue)) {
                phoneNumber.style.backgroundColor = '#4FB5DD';
            }
        }

    // End function highlight row data match input search

    // Begin listening event input search & searchBtn
        // Sự kiện keyup cho input
        inputBox.addEventListener('keyup', () => {
            
            const searchType = selectBox.value;
            const inputValue = inputBox.value.trim();

            rows.forEach(row => {
                // Highlight ô khớp
                highlightMatches(row, searchType, inputValue);

                // Hiển thị tất cả các hàng khi input trống
                row.style.display = inputValue ? '' : '';
            });
        });

        // Sự kiện keyup cho ô input (nhấn Enter)
        inputBox.addEventListener('keyup', (event) => {
            if (event.key === 'Enter') {
                searchHandler(); // Gọi lại hàm tìm kiếm
            }
        });
            
        // Sự kiện click cho nút tìm kiếm
        searchButton.addEventListener('click', searchHandler);
    // End listening event input search & searchBtn
    
    // Begin function handle search 
        function searchHandler() {
            const searchType = selectBox.value;
            const inputValue = inputBox.value.trim();

            rows.forEach(row => {
                let patientCode = row.querySelector('td:nth-child(3)').innerText.trim();
                let patientName = row.querySelector('td:nth-child(4)').innerText.trim();
                let phoneNumber = row.querySelector('td:nth-child(10)').innerText.trim();

                // Kiểm tra nếu là tab #temporary, thay đổi cách chọn các ô
                if (row.closest('.tab-pane').id === "temporary") {
                    patientName = row.querySelector('td:nth-child(3)').innerText.trim(); // Tên bệnh nhân cho #temporary
                    phoneNumber = row.querySelector('td:nth-child(7)').innerText.trim(); // Số điện thoại cho #temporary
                }

                // Highlight các ô khớp
                highlightMatches(row, searchType, inputValue);

                // Ẩn các hàng không khớp, hiển thị lại khi input trống
                if (!inputValue || 
                    (searchType === "Mã bệnh nhân" && patientCode.includes(inputValue)) ||
                    (searchType === "Tên bệnh nhân" && patientName.includes(inputValue)) ||
                    (searchType === "Số điện thoại" && phoneNumber.includes(inputValue))) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    // End function handle search 

    // Hàm render dữ liệu cho trang hiện tại
        function renderPage(pageNumber, itemsPerPage) {
            const startIndex = (pageNumber - 1) * itemsPerPage;
            const endIndex = pageNumber * itemsPerPage;

            const rowsToDisplay = patientListData.slice(startIndex, endIndex);
            const tbody = document.getElementById('patientList');  // Kiểm tra ID của tbody tại đây

            if (!tbody) {
                console.error("Element with id 'patientList' not found!");
                return;
            }

            tbody.innerHTML = '';  // Xóa dữ liệu cũ trong tbody

            rowsToDisplay.forEach(rowData => {
                const row = document.createElement('tr');
                rowData.forEach(cellData => {
                    const cell = document.createElement('td');
                    cell.textContent = cellData;
                    row.appendChild(cell);
                });
                tbody.appendChild(row);
            });
        }

        // Đặt các sự kiện cho phân trang
        document.querySelectorAll('.page-link').forEach(pageLink => {
            pageLink.addEventListener('click', function(event) {
                event.preventDefault();
                const page = parseInt(this.getAttribute('data-page'));
                renderPage(page, 10);  // Hiển thị 10 mục mỗi trang
            });
        });

        // Gọi hàm render cho trang đầu tiên
        renderPage(1, 10);
</script>
</script>
<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeFooter.php"; ?>
