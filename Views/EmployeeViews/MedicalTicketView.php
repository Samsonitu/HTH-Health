<?php 
    $Title = "Phiếu khám bệnh"; 

    $extraCSS = [                       
        public_dir('css/EmployeeCSS/EmpStyle.css')
    ];

    $extraJS = [
        public_dir('js/EmployeeJS/EmpScript.js'),
        public_dir('js/EmployeeJS/MedicalTicketScript.js')
    ];


    $serviceList = [
        [
            'serviceID'=> 1,
            'serviceName'=> 'Khám tổng quát',
            'price'=> 1000000,
            'status' => 1
        ],
        [
            'serviceID'=> 2,
            'serviceName'=> 'Khám dinh dưỡng',
            'price'=> 2000000,
            'status' => 0
        ],
        [
            'serviceID'=> 3,
            'serviceName'=> 'Khám tai mắt mũi họng',
            'price'=> 2000000,
            'status' => 1
        ],
        [
            'serviceID'=> 4,
            'serviceName'=> 'Khám xương',
            'price'=> 2000000,
            'status' => 1
        ],
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
                                    if(isset($serviceList) && !empty($serviceList)) {
                                        foreach($serviceList as $serviceItem) {
                                            echo '
                                                <div class="service__items" 
                                                    data-service-name="'.$serviceItem['serviceName'].'"
                                                    data-service-id="'.$serviceItem['serviceID'].'"
                                                    data-service-price="'.$serviceItem['price'].'"
                                                    data-service-status="'.$serviceItem['status'].'">
                                                    <div class="col-6">
                                                        <input type="checkbox" 
                                                        '.($serviceItem['status'] !== 1 ? "disabled" : "").'>
                                                        <label for="">'.$serviceItem['serviceName'].'</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <span>Trạng thái</span>
                                                        <br>
                                                        <small>
                                                        '.($serviceItem['status'] === 1 
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
                    <form id="medical-ticket-form" class="section section-patient">
                        <div class="section-patient__header">
                            <div class="tag--title">Phiếu khám bệnh</div>
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
                                <div id="book" class="tab-pane active">
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Mã bệnh nhân:</b></label>
                                        <div class="input-group w-50">
                                            <input type="text" class="form-control w-75" placeholder="Nhập mã bệnh nhân..." name="patientID" required>
                                            <button class="btn btn-primary" style="font-weight: bold;"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                        <button class="btn btn-secondary" id="btnOpenModalNewPatient" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#modalFormNewPatient">Tạo mới (F1)</button>
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
                                        <input type="hidden" name="selectedServiceIDs" id="selectedServiceIDs" required />
                                    </div>
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b>Tổng tiền:</b></label>
                                        <div class="w-75 text-start">
                                            <b id="total-price"></b>
                                            <input type="hidden" name="total-price" id="total-price-input"  value="0" required />
                                        </div>
                                    </div>
                                </div>
                                <div id="booked" class="tab-pane fade">
                                    <div class="my-2 d-flex gap-3 align-items-center">
                                        <label for="" class="form-label w-25"><b class="text-danger">Mã đặt lịch:</b></label>
                                        <input type="text" class="form-control w-50" required>
                                        <input type="submit" class="btn btn-primary" style="font-size: 13px; font-weight: bold;" value="Kiểm tra">
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
                                </div>
                            </div>
                        </div>
                        <div class="section-patient__footer justify-content-end p-3 mx-3">
                            <div>
                                <button type="submit" class="btn btn-success mx-1" id="btn-submit-form-book"><b>Hoàn Tất</b></button>
                                <button class="btn btn-danger mx-1" type="reset"><b>Hủy</b></button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
            <div class="modal fade" id="modalFormNewPatient">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title"><i class="fa-solid fa-pen"></i> Tạo bệnh nhân mới</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25"><b class="text-danger">Mã bệnh nhân:</b></label>
                            <input type="text" class="form-control w-75" disabled>
                            </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25">Tên bệnh nhân:</label>
                            <input type="text" class="form-control w-75">
                        </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25">CMND / Căn cước:</label>
                            <input type="text" class="form-control w-75">
                        </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label mb-0 w-25">Giới tính:</label>
                            <div class="w-75 d-flex gap-2 align-items-center">
                                <input type="radio" name="gender">Nam
                                <input type="radio" name="gender">Nữ
                            </div>
                        </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25 mb-0">Ngày sinh:</label>
                            <input class="text-center form-control w-75" type="date">
                        </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25">Số điện thoại:</label>
                            <input type="text" class="form-control w-75">
                        </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25">Địa chỉ:</label>
                            <textarea class="form-control w-75"></textarea>
                        </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25">Người đăng ký:</label>
                            <input type="text" class="form-control w-75">
                        </div>
                        <div class="my-2 d-flex gap-3 align-items-center">
                            <label for="" class="form-label w-25">CMND / Căn cước <br> người đăng ký:</label>
                            <input type="text" class="form-control w-75">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Xác nhận">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                    </div>

                    </div>
                </div>
            </div>
        </article>

        <!-- Sidebar -->
        <?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeSidebar.php" ?>
    </div>
</div>

<script>
    document.getElementById('medical-ticket-form').addEventListener('click', function(e) {
        e.preventDefault(); 
        
        // const formData = new FormData(this); 
        // fetch('echo('SendDataMedicalFormRoute')', { 
        //     method: 'POST',  
        //     body: formData
        // })
        // .then(response => response.json()) 
        // .then(data => {
        //     if (data.success) {
        //         console.log(data);
                    openPrintMedicalForm();
        //     } else {
        //         alert("Lỗi khi gửi dữ liệu!");
        //     }
        // })
        // .catch(error => {
        //     console.error('Error:', error);
        //     alert("Có lỗi xảy ra khi gửi dữ liệu.");
        // });
    });
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


    // Begin handle html to medical form print
    function layoutPrintMedicalForm() {
        return `
            <div id="medicalTicketContainer" class="container border p-4 shadow-sm">
            <div class="d-flex flex-column align-items-center">
                <img src="<?php echo public_dir('img/logo/logo.png') ?>" width="60px" height="60px" alt="Logo">
                <h6 id="slogan">Bác sĩ riêng của bạn</h6>
            </div>                
            <h5 class="text-center"><b>PHIẾU KHÁM BỆNH  </b></h5>
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

// End handle html to medical form print

</script>




<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../EmployeeLayouts/EmployeeFooter.php"; ?>
