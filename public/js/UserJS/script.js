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



// INFO-SERVICE

//TAB-FORM-APPOINTMENT

function openTab(clickTab, formOpen) {
  var i, openForm, btnTab;
  openForm = document.getElementsByClassName("open-form");
  for (i = 0; i < openForm.length; i++) {
    openForm[i].style.display = "none";
  }
  btnTab = document.getElementsByClassName("btn-tab");
  for (i = 0; i < btnTab.length; i++) {
    btnTab[i].className = btnTab[i].className.replace(" active", "");
  }
  document.getElementById(formOpen).style.display = "block";
  clickTab.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

//TAB-FORM-APPOINTMENT

// CONTAINER
