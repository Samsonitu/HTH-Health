<?php
$Title = "Trang chủ"; 
$navActive = "Trang chủ";

$extraCSS = [
	public_dir('css/UserCSS/style.css'),
	public_dir('css/UserCSS/home.css')
];

$extraJS = [
	public_dir('js/UserJS/script.js'),
	public_dir('js/UserJS/home.js'),
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
		<div class="container">
			<div class="section__content row">
				<div class="section__left col-md-12 col-xl-6">
					<h2 class="section__title">Dịch vụ của chúng tôi</h2>
					<div class="container">
						<div class="row justify-content-between"> 
							<div class="utilities__item active col-sm-12">
								<i class="fa-solid fa-calendar-days icon-ult-left"></i>
								<h5 class="utilities__item-info">Đặt lịch khám lấy mẫu tại nhà</h5>
								<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
								<div class="utilities__item-action text-end">
									<a href="" class="btn">Đặt lịch
										<i class="fa-solid fa-arrow-right-long"></i>
										</a>
								</div>
							</div>
							<div class="utilities__item col-sm-12">
								<i class="fa-solid fa-magnifying-glass"></i>
								<h5 class="utilities__item-info">Tra cứu kết quả</h5>
								<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
								<div class="utilities__item-action text-end">
									<a href="" class="btn">Tra cứu
										<i class="fa-solid fa-arrow-right-long"></i>
									</a>
								</div>
							</div>
							<div class="utilities__item col-sm-12">
								<i class="fa-solid fa-dollar-sign"></i>
								<h5 class="utilities__item-info">Bảng giá dịch vụ</h5>
								<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
								<div class="utilities__item-action text-end">
									<a href="" class="btn">Bảng giá
										<i class="fa-solid fa-arrow-right-long"></i>
									</a>
								</div>
							</div>
							<div class="utilities__item col-sm-12">
								<i class="fa-regular fa-circle-question"></i>
								<h5 class="utilities__item-info">Hỏi đáp chuyên gia</h5>
								<p class="utilities__item-desc">Quý khách hàng sử dụng tiện ích này để đặt lịch lấy mẫu tại nhà hoặc đặt lịch khám chữa bệnh tại các cơ sở của HTH</p>
								<div class="utilities__item-action text-end">
									<a href="" class="btn">Hỏi đáp
										<i class="fa-solid fa-arrow-right-long"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
	
				<div class="section__right col-md-12 col-xl-6">
					<div class="utilities__image active">
						<h2>Đặt lịch khám lấy mẫu tại nhà</h2>
						<img class="w-100" src="<?=public_dir('img/service/Homepage_Bang+gia+dvu.png')?>" alt="">
					</div>
					<div class="utilities__image">
						<h2>Tra cứu kết quả</h2>
						<img class="w-100" src="<?=public_dir('img/service/Homepage_tra+ket+qua-01.png')?>" alt="">
					</div>
					<div class="utilities__image">
						<h2>Bảng giá dịch vụ</h2>
						<img class="w-100" src="<?=public_dir('img/service/utilities3-3.png')?>" alt="">
					</div>
					<div class="utilities__image">
						<h2>Hỏi đáp chuyên gia</h2>
						<img class="w-100" src="<?=public_dir('img/service/utilities4-3.png')?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="info-doctors">
		<div class="container">
			<div class="d-flex justify-content-between">
				<h2>Đội ngũ chuyên gia bác sĩ</h2>
				<a href="#" class="all-news">Xem tất cả bác sĩ<i class="fa-solid fa-plus"></i></a>
			</div>
			<div class="article__non-details-info d-flex flex-wrap">
				<?php for($i = 0; $i < 5; $i++) :?> 
					<div class="article__box-info">
						<div class="article__show-info">
							<div class="article__info-img <?= $i === 0 ? 'active' : ''; ?>">
								<img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt="">
							</div>
							<div class="article__info-doc">
								<p class="article__docT">Bác sĩ</p>
								<h5 class="article__docName">Nguyễn Quốc Dũng</h5>
								<p class="article__docMajor">Chuyên khoa chẩn đoán hình ảnh</p>
							</div>
						</div>
					</div>
				<?php endfor; ?>
			</div>

			<div class="article__full-details-info row">
				<div class="article__image-container col-3">
					<img src="/public/img/doctor/20210311_avt-BS+Nghị.png" alt="" class="article__image">
				</div>
				<div class="article__details col-9">
					<h3 class="article__doctor-name">Bs.Nguyễn Quốc Dũng</h3>
					<h4 class="article__doctor-specialty">Chuyên khoa chẩn đoán hình ảnh</h4>
					<h5 class="article__section-title">Giới thiệu: </h5>
					<p class="article__text">
						Lĩnh vực chuyên môn: Nội tổng quát – BSCKI Nhiễm
						Số năm kinh nghiệm: 42 năm
						Điểm mạnh chuyên môn:

						– Khám Nội Tổng quát: tầm soát, phát hiện, điều trị các bệnh lý bao gồm:

						+ Tim mạch, huyết áp…

						+ Nội tiết: Đái tháo đường , Bướu cổ…

						+ Các bệnh lý viêm gan do Virus B, C…
					</p>
					<h5 class="article__section-title">Học vấn</h5>
					<p class="article__text">
						1975-1981: Đào tạo BS Y khoa tại Đại học Y Khoa Huế
						1993-1995: Đào tạo sau đại học tại Đại hoc Y Dược Tp HCM
						2005: Chứng nhận Trung tâm Y tế Quận 3 “Xử lý cấp cứu và tai nạn trẻ em” BV Nhi đồng 2 – Bệnh viện Đại học Y dược TPHCM tổ chức.
						2012: Chứng chỉ hành nghề khám bệnh, chữa bệnh
						2019: Giấy xác nhận quá trình hành nghề của Bệnh viện Quận 3
					</p>
					<h5 class="article__section-title">QUÁ TRÌNH CÔNG TÁC</h5>
					<p class="article__text">
						1991-2018: BS điều trị tại Bệnh Viên Q3
						2018-2021: Phó Giám Đốc chuyên môn – Phòng khám Đa khoa Hoàn Mỹ Sài Gòn
						2022: Giám Đốc chuyên môn tại Phòng khám DHA
						2023 – nay: Giám Đốc chuyên môn tại Phòng khám Loukas
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="user-comment container mt-3">
		<h2>Phản hồi khách hàng</h2>
		<div class="service-comment row">
			<div class="service-name col-lg-6 col-12">
				<h4>Khám sức khỏe tổng quát cho trẻ em</h4>
				<div class="comment-line">
					<div class="circle-face">
						<img src="<?= public_dir('/img/userComment/chi-to-diep.jpg'); ?>" alt="Khách hàng">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Nguyễn Thị Mai</h5>
						<p>Tôi đã đưa con đến Phòng khám “ABC” để kiểm tra sức khỏe định kỳ. Bác sĩ rất tận tâm, kiểm tra kỹ lưỡng, hướng dẫn chi tiết về dinh dưỡng và phát triển của bé. Tôi rất yên tâm khi cho con khám tại đây.</p>
					</div>
				</div>
				<div class="comment-line">
					<div class="circle-face">
						<img src="<?= public_dir('/img/userComment/chi-to-diep.jpg'); ?>" alt="Khách hàng">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Phạm Thanh Hương</h5>
						<p>Dịch vụ tại phòng khám “ABC” rất tốt, bác sĩ thân thiện với trẻ, giúp con tôi không còn sợ khi đi khám bệnh. Các trang thiết bị hiện đại, thời gian chờ cũng không quá lâu. Tôi chắc chắn sẽ quay lại!</p>
					</div>
				</div>
			</div>
			<div class="service-name col-lg-6 col-12">
				<h4>Tiêm chủng và tư vấn dinh dưỡng cho bé</h4>
				<div class="comment-line">
					<div class="circle-face">
						<img src="<?= public_dir('/img/userComment/chi-to-diep.jpg'); ?>" alt="Khách hàng">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Trần Thu Trang</h5>
						<p>Tôi rất hài lòng với dịch vụ tiêm chủng tại phòng khám “ABC”. Bác sĩ tư vấn rất kỹ về các loại vắc-xin, cách chăm sóc sau tiêm và phản ứng có thể gặp. Nhờ vậy, tôi hoàn toàn yên tâm khi đưa con đi tiêm.</p>
					</div>
				</div>
				<div class="comment-line">
					<div class="circle-face">
						<img src="<?= public_dir('/img/userComment/chi-to-diep.jpg'); ?>" alt="Khách hàng">
						<i class="fa-solid fa-quote-left"></i>
					</div>
					<div class="doc-comment">
						<h5>Đỗ Thị Lan</h5>
						<p>Phòng khám có dịch vụ tư vấn dinh dưỡng rất chi tiết, giúp tôi hiểu rõ chế độ ăn phù hợp cho bé. Nhờ những lời khuyên bổ ích từ bác sĩ, con tôi đã ăn uống tốt hơn và phát triển khỏe mạnh.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="info-news container">
		<div class="view-all">
			<h2>Tin tức</h2>
			<a href="#" class="all-news">Xem tất cả tin tức <i class="fa-solid fa-plus"></i></a>
		</div>

		<div class="box-item-news">
			<div class="news-grid">
				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h4>Bộ Y tế cảnh báo về dịch sởi</h4>
						<p>Số ca mắc bệnh sởi tăng so với cùng kỳ năm 2023 và có xu hướng gia tăng tại một số địa phương.</p>
					</div>
				</div>

				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h4>Biện pháp phòng tránh sốt xuất huyết</h4>
						<p>Các chuyên gia khuyến nghị người dân sử dụng biện pháp bảo vệ như màn chống muỗi và thuốc diệt côn trùng.</p>
					</div>
				</div>

				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h4>Tiêm vaccine cho trẻ em</h4>
						<p>Chuyên gia khuyến nghị trẻ em nên được tiêm chủng đầy đủ để phòng ngừa các bệnh truyền nhiễm nguy hiểm.</p>
					</div>
				</div>

				<div class="item-news">
					<img src="/public/img/news/3-pgs-ts-nguyen-thai-son.jpg.png" alt="">
					<div class="description-news">
						<h4>Thực phẩm tăng cường miễn dịch</h4>
						<p>Một số thực phẩm giàu vitamin giúp tăng cường hệ miễn dịch, đặc biệt trong mùa lạnh.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="btn-news">
			<button class="active"></button>
			<button></button>
			<button></button>
		</div>
	</div>
</article>

<?php require_once __DIR__ . "/../UserLayouts/UserFooter.php"; ?>
