/*var images = ["banner01.jpg", "banner02.jpg", "banner03.png"];
    $(function () {
        var i = 0;
        $(".blue-bg-3").css("background-image", "url(../img/bg/" + images[i] + ")");
        setInterval(function () {
            i++;
            if (i == images.length) {
                i = 0;
            }
            $("#dvImage").fadeOut("slow", function () {
                $(this).css("background-image", "url(../img/bg/" + images[i] + ")");
                $(this).fadeIn("slow");
            });
        }, 1000);
    });*/

/*var currentBackground = 0;

var backgrounds = [];

backgrounds[0] = '../img/bg/banner01.jpg';

backgrounds[1] = '../img/bg/banner02.jpg';

backgrounds[2] = '../img/bg/banner03.png';

function changeBackground() {

    currentBackground++;

    if(currentBackground > 2) currentBackground = 0;

    $('.blue-bg-3').fadeOut(1500,function() {
        $('.blue-bg-3').css({
            'background-image' : "url('" + backgrounds[currentBackground] + "')"
        });
        $('.blue-bg-3').fadeIn(1500);
    });


    setTimeout(changeBackground, 5000);
}*/

var images = ["banner01.jpg", "banner02.jpg", "banner03.png"];
const imageEl = document.getElementById("blue-bg-3a");
window.setInterval(changePicture, 5000);
let i = 0;
function changePicture() {
  i++;
  if (i > images.length - 1) i = 0;
  imageEl.style.backgroundImage = `url(../assets/img/bg/${images[i]})`;
}