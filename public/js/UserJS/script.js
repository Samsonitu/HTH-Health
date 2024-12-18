// console.log(123);
// HEADER-THUMBNAILS

var arrayImg = [];
        for (let i = 0; i < 3; i++) {
					arrayImg[i] = new Image();
					arrayImg[i].src = "/public/img/banner/" + i + ".png";
        }
        var j = 0;

        function slideImage() {
            j = (j + 1) % arrayImg.length;
            document.getElementById("slideImg").src = arrayImg[j].src;
        }

        setInterval(slideImage, 2500);

// HEADER-THUMBNAILS

// HEADER
// HEADER

// CONTAINER

// INFO-SERVICE

const ultH5Left = document.querySelectorAll('.H5-ult-left');
const ultImgLeft = document.querySelectorAll('.img-ult-left');
const ultH5Right = document.querySelectorAll('.p-right .content-img h5');
const ultImgRight = document.querySelectorAll('.p-right .content-img img');
const ultLeft = document.querySelectorAll('.ult-left');
const ultRight = document.querySelector('.p-right .content-img');
const ultBtn = document.querySelectorAll('.ult-btn');

ultLeft[0].addEventListener('click', function(e){
	ultH5Right[0].innerHTML = "Đặt lịch khám, lấy mẫu tại nhà";
	ultImgRight[0].setAttribute('src', '/public/img/service/Homepage_Bang+gia+dvu.png')
	e.target.classList.add("ultFocus");
});

ultLeft[0].addEventListener('mouseenter', function(e){
	ultH5Right[0].innerHTML = "Đặt lịch khám, lấy mẫu tại nhà";
	ultImgRight[0].setAttribute('src', '/public/img/service/Homepage_Bang+gia+dvu.png')

});

ultLeft[1].addEventListener('mouseenter', function(e){
	ultH5Right[0].innerHTML = "Tra cứu kết quả";
	ultImgRight[0].setAttribute('src', '/public/img/service/Homepage_tra+ket+qua-01.png')
});

ultLeft[2].addEventListener('mouseenter', function(e){
	ultH5Right[0].innerHTML = "Bảng giá dịch vụ";
	ultImgRight[0].setAttribute('src', '/public/img/service/utilities3-3.png')
});

ultLeft[3].addEventListener('mouseenter', function(e){
	ultH5Right[0].innerHTML = "Hỏi đáp chuyên gia";
	ultImgRight[0].setAttribute('src', '/public/img/service/utilities4-3.png')

});


ultLeft.forEach(function(ultL){
	ultL.addEventListener('mouseenter', function(){
		document.querySelector('.ultFocus')?.classList.remove('ultFocus');
		ultL.classList.add("ultFocus");
	})
})


document.getElementById('defaultOpen').click();

// INFO-SERVICE

//TAB-FORM-APPOINTMENT

// function openTab(clickTab, formOpen) {
//   var i, openForm, btnTab;
//   openForm = document.getElementsByClassName("open-form");
//   for (i = 0; i < openForm.length; i++) {
//     openForm[i].style.display = "none";
//   }
//   btnTab = document.getElementsByClassName("btn-tab");
//   for (i = 0; i < btnTab.length; i++) {
//     btnTab[i].className = btnTab[i].className.replace(" active", "");
//   }
//   document.getElementById(formOpen).style.display = "block";
//   clickTab.currentTarget.className += " active";
// }

// document.getElementById("defaultOpen").click();

//TAB-FORM-APPOINTMENT

// CONTAINER
