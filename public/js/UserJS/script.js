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

// CONTAINER
