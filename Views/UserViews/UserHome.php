<?php
$Title = "Trang chủ"; 

$extraCSS = [
	public_dir('css/UserCSS/style.css')
];

$extraJS = [
	public_dir('js/UserJS/script.js')
];
?>
<?php require_once __DIR__ . "/../UserLayouts/UserHeader.php"; ?>

<div id="demo" class="carousel slide" data-bs-ride="carousel">
  	<div class="carousel-indicators">
		<button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
		<button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
		<button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
	</div>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="<?=public_dir('img/banner/0.png')?>" alt="" class="d-block w-100">
		</div>
		<div class="carousel-item">
			<img src="<?=public_dir('img/banner/1.png')?>" alt="" class="d-block w-100">
		</div>
		<div class="carousel-item">
			<img src="<?=public_dir('img/banner/2.png')?>" alt="" class="d-block w-100">
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
		<span class="bg-white rounded text-dark p-3"><i class="fa-solid fa-angle-left"></i></span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
		<span class="bg-white rounded text-dark p-3"><i class="fa-solid fa-angle-right"></i></span>
	</button>
</div>
<article class="container-fuild">
	<section id="utilities">
		<div class="section__content row">
			<div class="section__left col-md-12 col-xl-6">
				<h2 class="section__title">Dịch vụ của chúng tôi</h2>
				<div class="container">
					<div class="row justify-content-between"> 
						<div class="utilities__item col-sm-12">
							<i class="fa-solid fa-calendar-days icon-ult-left"></i>
							<h5 class="utilities__item-info">Đặt lịch khám lấy mẫu tại nhà</h5>
							<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
							<div class="utilities__item-action text-end">
							<a href="">Đặt lịch</a>
							<i class="fa-solid fa-arrow-right-long"></i>
							</div>
						</div>
						<div class="utilities__item col-sm-12">
							<i class="fa-solid fa-calendar-days icon-ult-left"></i>
							<h5 class="utilities__item-info">Đặt lịch khám lấy mẫu tại nhà</h5>
							<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
							<div class="utilities__item-action text-end">
							<a href="">Đặt lịch</a>
							<i class="fa-solid fa-arrow-right-long"></i>
							</div>
						</div>
						<div class="utilities__item col-sm-12">
							<i class="fa-solid fa-calendar-days icon-ult-left"></i>
							<h5 class="utilities__item-info">Đặt lịch khám lấy mẫu tại nhà</h5>
							<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
							<div class="utilities__item-action text-end">
							<a href="">Đặt lịch</a>
							<i class="fa-solid fa-arrow-right-long"></i>
							</div>
						</div>
						<div class="utilities__item col-sm-12">
							<i class="fa-solid fa-calendar-days icon-ult-left"></i>
							<h5 class="utilities__item-info">Đặt lịch khám lấy mẫu tại nhà</h5>
							<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
							<div class="utilities__item-action text-end">
							<a href="">Đặt lịch</a>
							<i class="fa-solid fa-arrow-right-long"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="section__right col-md-12 col-xl-6">
				<h5 id="getSv"></h5>
				<img class="w-100" src="<?=public_dir('img/service/Homepage_Bang+gia+dvu.png')?>" alt="">
			</div>
		</div>
	</section>

	<div class=" info-doctors">
		<h2>Đội ngũ chuyên gia bác sĩ</h2>
		<div class="non-details-info">

			<div class="box-info">

				<div class="show-info">
					<div class="info-img"><img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p class="docT">Bác sĩ</p>
						<h5 class="docName">Nguyễn Quốc Dũng</h5>
						<p class="docMajor">Chuyên khoa chẩn đoán hình ảnh</p>
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
					<div class="info-img"><img class="info-img" src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p class="docT">Bác sĩ</p>
						<h5 class="docName">Nguyễn Quốc Dũng</h5>
						<p class="docMajor">Chuyên khoa chẩn đoán hình ảnh</p>
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
					<div class="info-img"><img class="info-img" src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p class="docT">Bác sĩ</p>
						<h5 class="docName">Nguyễn Quốc Dũng</h5>
						<p class="docMajor">Chuyên khoa chẩn đoán hình ảnh</p>
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
					<div class="info-img"><img class="info-img" src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p class="docT">Bác sĩ</p>
						<h5 class="docName">Nguyễn Quốc Dũng</h5>
						<p class="docMajor">Chuyên khoa chẩn đoán hình ảnh</p>
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
					<div class="info-img"><img class="info-img" src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt=""></div>
					<div class="info-doc">
						<p class="docT">Bác sĩ</p>
						<h5 class="docName">Nguyễn Quốc Dũng</h5>
						<p class="docMajor">Chuyên khoa chẩn đoán hình ảnh</p>
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

		<div class="view-all">
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
						<h4>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h4>
						<p>Từ đầu năm 2024 đến nay, số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>

				</div>
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h4>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h4>
						<p>Từ đầu năm 2024 đến nay, số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>

				</div>
			</div>
			<div class="col col-right">
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h4>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h4>
						<p>Từ đầu năm 2024 đến nay, số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>

				</div>
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h4>Bộ Y tế khuyến cáo người dân về tình hình dịch bệnh sởi</h4>
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
</ả>

<!-- Sửa lại đường dẫn thành "/../Tên đối tượng + Layouts/Tên đối tượng + tên file.php" -->
<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
