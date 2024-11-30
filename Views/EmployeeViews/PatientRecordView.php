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
            <div class="row gx-2">
                <div class="section section-patient-records">
                    <div class="section-patient-records__header">
                        <div class="tag--title">Danh sách hồ sơ bệnh nhân</div>
                        <div class="section-patient-records__controls">
                            <div class="section-patient-records__search-group">
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
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Lần khám cuối</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
                                <tr data-patientID="BN345">
                                    <td style="font-size: 16px; min-width: 30px;" class="px-0"><i class="fa-regular fa-square-plus"></i></td>
                                    <td style="width: 20px;">1</td>
                                    <td style="width: 100px;">BN220313023</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">10 tháng</td>
                                    <td style="min-width: 180px;">Bùi Quang Hưng</td>
                                    <td style="width: 60px;">Nam</td>
                                    <td style="min-width: 80px;">20 tuổi</td>
                                    <td style="width: 120px;">0123456789</td>
                                    <td style="width: 180px;">BN mới</td>
                                    <td style="width: 85px;">12/04/2022</td>
                                    <td style="width: 85px;">19/04/2022</td>
                                    <td style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i></td>
                                </tr>
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
            <div class="modal fade" id="patient-details__modal">
                <div class="modal-dialog modal-lg">
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
                                        <div class="d-flex gap-3 mb-2">
                                            <label for="" class="w-25">Họ và tên</label> 
                                            <span><b>: Phạm Ngọc Huấn</b></span>
                                        </div>
                                        <div class="d-flex gap-3 mb-2">
                                            <label for="" class="w-25">Giới tính</label> 
                                            <span>: Nam</span>
                                        </div>
                                        <div class="d-flex gap-3">
                                            <label for="" class="w-25 text-nowrap">Ngày sinh / Tuổi</label> 
                                            <span>: 03/05/2020 (4 tuổi)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="patient-details__content">
                                        <div class="patient-details__title">Thông tin người giám hộ</div>
                                        <div class="d-flex gap-3 mb-2">
                                            <label for="" class="w-25">Họ và tên</label> 
                                            <span><b>: Phạm Xuân Hiền</b></span>
                                        </div>
                                        <div class="d-flex gap-3 mb-2">
                                            <label for="" class="w-25">Giới tính</label> 
                                            <span>: Nam</span>
                                        </div>
                                        <div class="d-flex gap-3">
                                            <label for="" class="w-25 text-nowrap">Ngày sinh / Tuổi</label> 
                                            <span>: 01/01/1968 (58 tuổi)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding: 0 12px;">
                                <div class="patient-details__content">
                                    <div class="patient-details__title">Địa chỉ & liên hệ</div>
                                    <div class="d-flex gap-3 mb-2">
                                        <label for="" style="width: 10%;">Địa chỉ</label> 
                                        <span>: 113/4B Khu phố 9, phường Tân Hiệp, quận Tân Bình, thành phố Bảo Lộc</span>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <label for="" style="width: 10%;">Số điện thoại</label> 
                                        <span>: 0123456789</span>
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
                                                <th>Trạng thái</th>
                                                <th>Người tạo phiếu khám</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>PK-0001</td>
                                                <td>
                                                    Khám tổng quát (1) - 1.000.000đ
                                                    <br>
                                                    Khám dinh dưỡng (1) - 1.000.000đ
                                                </td>
                                                <td>Đinh Thị Xuân</td>
                                                <td>26/11/2024</td>
                                                <td>Đã khám</td>
                                                <td>Nguyễn Thị Thanh Vân</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" class="text-end"><b>Tổng tiền:</b> 2.000.000đ</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>PK-0001</td>
                                                <td>
                                                    Khám tổng quát (1) - 1.000.000đ
                                                    <br>
                                                    Khám dinh dưỡng (1) - 1.000.000đ
                                                </td>
                                                <td>Đinh Thị Xuân</td>
                                                <td>26/11/2024</td>
                                                <td>Đã khám</td>
                                                <td>Nguyễn Thị Thanh Vân</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" class="text-end"><b>Tổng tiền:</b> 2.000.000đ</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>PK-0001</td>
                                                <td>
                                                    Khám tổng quát (1) - 1.000.000đ
                                                    <br>
                                                    Khám dinh dưỡng (1) - 1.000.000đ
                                                </td>
                                                <td>Đinh Thị Xuân</td>
                                                <td>26/11/2024</td>
                                                <td>Đã khám</td>
                                                <td>Nguyễn Thị Thanh Vân</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" class="text-end"><b>Tổng tiền:</b> 2.000.000đ</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>PK-0001</td>
                                                <td>
                                                    Khám tổng quát (1) - 1.000.000đ
                                                    <br>
                                                    Khám dinh dưỡng (1) - 1.000.000đ
                                                </td>
                                                <td>Đinh Thị Xuân</td>
                                                <td>26/11/2024</td>
                                                <td>Đã khám</td>
                                                <td>Nguyễn Thị Thanh Vân</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" class="text-end"><b>Tổng tiền:</b> 2.000.000đ</td>
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
        </article>
    </div>
</div>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeFooter.php"; ?>
