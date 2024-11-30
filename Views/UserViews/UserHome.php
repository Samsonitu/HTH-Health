<?php
$Title = "Trang chủ"; /* Trang tên gì thì để title đó VD: Trang chủ, Đăng nhập */

/* Cần nhúng file css nào thì sửa đường dẫn trong phần tử của extraCSS */
$extraCSS = [
	public_dir('css/UserCSS/style.css')
];

/* Cần nhúng file js nào thì sửa đường dẫn trong phần tử của extraJS */
$extraJS = [
	public_dir('js/UserJS/script.js')
];
?>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../UserLayouts/UserHeader.php"; ?>

<!-- Code phần main ở đây -->
<!-- <h2>Code Phần main</h2> -->

<div class="container">
	<div class="info-utilities">

		<h2>Dịch vụ của chúng tôi</h2>
		<div class="position-info">
			<div class="p-left">
				<div class="p-l p-top">
					<div class="utilities u-r">
						<i class="fa-solid fa-calendar-days"></i>
						<h5 onclick="clickSv('1')">Đặt lịch khám, lấy mẫu tại nhà</h5>
						<p>Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH </p>
						<span>Đặt lịch</span>
						<img src="/public/img/service/Homepage_Bang+gia+dvu.png" alt="">
					</div>
					<div class="utilities">
						<i class="fa-solid fa-magnifying-glass-plus"></i>
						<h5 onclick="clickSv('2')">Tra cứu kết quả</h5>
						<p>Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
						<span>Tra cứu</span>
					</div>
				</div>
				<div class="p-l p-bottom">
					<div class="utilities u-r">
						<i class="fa-solid fa-circle-dollar-to-slot"></i>
						<h5 onclick="clickSv('3')">Bảng giá dịch vụ</h5>
						<p>Quý khách hàng sử dụng tiện ích này để tra cứu giá dịch vụ y tế tại Hệ thống Y tế HTH</p>
						<span>Xem bảng giá</span>
					</div>
					<div class="utilities">
						<i class="fa-solid fa-circle-question"></i>
						<h5 onclick="clickSv('4')">Hỏi đáp chuyên gia</h5>
						<p>Quý khách hàng sử dụng tiện ích này để đặt câu hỏi và nhận hướng dẫn, giải đáp thắc mắc từ chuyên gia y tế của HTH</p>
						<span>Xem bảng giá</span>
					</div>
				</div>


			</div>

			<div class="p-right">
				<div class="content-img">
					<h5 id="getSv"></h5>
					<img src="" alt="">
				</div>

			</div>
		</div>


	</div>



	<div class=" info-doctors">
		<h2>Đội ngũ chuyên gia bác sĩ</h2>
		<div class="non-details-info">

			<div class="box-info">

				<div class="show-info">
					<div class="info-img"><img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p>Bác sĩ</p>
						<h3>Nguyễn Quốc Dũng</h3>
						<p>Chuyên khoa chẩn đoán hình ảnh</p>
					</div>

				</div>
				<div class="hidden-info">
					<div class="doctor-introduce"></div>
					<div class="experience-doctor"></div>
					<div class="work-doctor"></div>
				</div>

			</div>

			<div class="box-info">

				<div class="show-info">
					<div class="info-img"><img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p>Bác sĩ</p>
						<h3>Nguyễn Quốc Dũng</h3>
						<p>Chuyên khoa chẩn đoán hình ảnh</p>
					</div>

				</div>
				<div class="hidden-info">
					<div class="doctor-introduce"></div>
					<div class="experience-doctor"></div>
					<div class="work-doctor"></div>
				</div>

			</div>

			<div class="box-info">

				<div class="show-info">
					<div class="info-img"><img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p>Bác sĩ</p>
						<h3>Nguyễn Quốc Dũng</h3>
						<p>Chuyên khoa chẩn đoán hình ảnh</p>
					</div>

				</div>
				<div class="hidden-info">
					<div class="doctor-introduce"></div>
					<div class="experience-doctor"></div>
					<div class="work-doctor"></div>
				</div>

			</div>

			<div class="box-info">

				<div class="show-info">
					<div class="info-img"><img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p>Bác sĩ</p>
						<h3>Nguyễn Quốc Dũng</h3>
						<p>Chuyên khoa chẩn đoán hình ảnh</p>
					</div>

				</div>
				<div class="hidden-info">
					<div class="doctor-introduce"></div>
					<div class="experience-doctor"></div>
					<div class="work-doctor"></div>
				</div>

			</div>

			<div class="box-info">

				<div class="show-info">
					<div class="info-img"><img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p>Bác sĩ</p>
						<h3>Nguyễn Quốc Dũng</h3>
						<p>Chuyên khoa chẩn đoán hình ảnh</p>
					</div>

				</div>
				<div class="hidden-info">
					<div class="doctor-introduce"></div>
					<div class="experience-doctor"></div>
					<div class="work-doctor"></div>
				</div>

			</div>



		</div>

		<div class="full-details-info">
			<img src="" alt="">

		</div>


	</div>

	<div class="user-comment">
		<h2>Phản hồi khách hàng</h2>
		<div class="service-comment">
			<div class="service-name sv-left">
				<h4>Đốt RFA U tuyến giáp</h4>
				<div class="comment-line">

					<div class="circle-face">
						<img src="/public/img/userComment/user-types-creator-banner-fg.png" alt="">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Trương Thị Bảy</h5>
						<p>Thực hiện đốt u giáp tại Phòng khám “ABC” không hề đau hay khó chịu, bác sĩ và điều dưỡng rất ân cần. Khối u 7 năm nay của tôi đã không còn nhờ Loukas. Nếu biết đốt RFA ở Loukas nhẹ nhàng thế này tôi đã thực hiện sớm hơn.</p>
					</div>

				</div>

				<div class="comment-line">

					<div class="circle-face">
						<img src="/public/img/userComment/co-hoang-thi-nga.jpg" alt="">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Trương Thị Bảy</h5>
						<p>Thực hiện đốt u giáp tại Phòng khám “ABC” không hề đau hay khó chịu, bác sĩ và điều dưỡng rất ân cần. Khối u 7 năm nay của tôi đã không còn nhờ Loukas. Nếu biết đốt RFA ở Loukas nhẹ nhàng thế này tôi đã thực hiện sớm hơn.</p>
					</div>
				</div>
			</div>
			<div class="service-name sv-right">
				<h4>Đốt RFA U tuyến giáp</h4>
				<div class="comment-line">

					<div class="circle-face">
						<img src="/public/img/userComment/chi-to-diep.jpg" alt="">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Trương Thị Bảy</h5>
						<p>Thực hiện đốt u giáp tại Phòng khám “ABC” không hề đau hay khó chịu, bác sĩ và điều dưỡng rất ân cần. Khối u 7 năm nay của tôi đã không còn nhờ Loukas. Nếu biết đốt RFA ở Loukas nhẹ nhàng thế này tôi đã thực hiện sớm hơn.</p>
					</div>
				</div>

				<div class="comment-line">

					<div class="circle-face">
						<img src="/public/img/userComment/chi-to-diep.jpg" alt="">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Trương Thị Bảy</h5>
						<p>Thực hiện đốt u giáp tại Phòng khám “ABC” không hề đau hay khó chịu, bác sĩ và điều dưỡng rất ân cần. Khối u 7 năm nay của tôi đã không còn nhờ Loukas. Nếu biết đốt RFA ở Loukas nhẹ nhàng thế này tôi đã thực hiện sớm hơn.</p>
					</div>
				</div>
			</div>
		</div>


	</div>


	<div class="info-news">

		<div class="view">
			<div class="title-news">
				<h2>Tin tức</h2>
			</div>
			<div class="all-news">
				<a href="#">Xem tất cả tin tức <i class="fa-solid fa-plus"></i></a>
			</div>

		</div>
		<div class="box-item-news">
			<div class="col col-left">
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h3>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h3>
						<p>Từ đầu năm 2024 đến nay, số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>

				</div>
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h3>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h3>
						<p>Từ đầu năm 2024 đến nay, số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>

				</div>
			</div>
			<div class="col col-right">
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h3>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h3>
						<p>Từ đầu năm 2024 đến nay, số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>

				</div>
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h3>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h3>
						<p>Từ đầu năm 2024 đến nay, số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>

				</div>


			</div>

		</div>
		<div class="btn-news">
			<button><i class="fa-solid fa-circle"></i></button>
			<button><i class="fa-solid fa-circle"></i></button>
			<button><i class="fa-solid fa-circle"></i></button>
		</div>
	</div>
</div>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
