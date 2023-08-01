/** code by webdevtrick ( https://webdevtrick.com ) **/
(function($) {
    $(function() {
        $('nav ul li a:not(:only-child)').click(function(e) {
            $(this).siblings('.nav-dropdown').toggleClass("active");
            $('.dropdown').not($(this).siblings()).hide();
            e.stopPropagation();
            $(".mobile-item .profile-pop-up").removeClass("active");
            $(".profile-pop-up").removeClass("active");
        });
        $('html').click(function() {
            $('.nav-dropdown').removeClass("active");
        });

    });
})(jQuery);
// ----------------------------------



const menu = document.querySelector('#nav-toggle');
const menuLinks = document.querySelector('.sidebar');
const overlay = document.querySelector('.overlay');


menu.addEventListener('click', function() {
    menuLinks.classList.toggle('active')
    menu.classList.toggle('active')
    $('.overlay').fadeToggle()
    $('body').css("position" , "fixed")


})
overlay.addEventListener('click', function() {
    menuLinks.classList.remove('active')
    menu.classList.remove('active')
    $('.overlay').fadeOut(100)
    $('body').css("position" , "relative")
})

// -------------------------------notif-popup

$(".notif").click(function (e) {
    $(this).toggleClass("active");
    e.stopPropagation();

});

$(".notif-popup").click(function (e) {
    e.stopPropagation();
});
$(".close-popup").click(function () {
    $(".notif").removeClass("active");
});
$(document).click(function () {
    $(".notif").removeClass("active");
});


$('.notification .content-box div').hide();
$('.notification ').click(function() {
    $(this).children(".content-box").children("div").slideToggle();
});

$(".Language-button").click(function (e) {
    $(this).find(".Language-popup").toggleClass("active");
    e.stopPropagation();

});

$(".Language-popup").click(function (e) {
    e.stopPropagation();
});

$(document).click(function () {
    $(".Language-popup").removeClass("active");
});
// ----------------card-hove
let $card;
let bounds;

function rotateToMouse(e) {
    const mouseX = e.clientX;
    const mouseY = e.clientY;
    const leftX = mouseX - bounds.x;
    const topY = mouseY - bounds.y;
    const center = {
        x: leftX - bounds.width / 2,
        y: topY - bounds.height / 2
    }

    $card.querySelector('.glow').style.backgroundImage = `
    radial-gradient(
      circle at
      ${center.x * 2 + bounds.width/2}px
      ${center.y * 2 + bounds.height/2}px,
      #D478FE33,
      #2E104C33,
      #0B012833
    )
  `;
}

var div_list = document.querySelectorAll('.blur-hover'); // returns NodeList
var div_array = [...div_list]; // converts NodeList to Array
div_array.forEach(item => {

    item.addEventListener('mouseenter', () => {
        $card = item
        // console.log(item)
        bounds = $card.getBoundingClientRect();
        document.addEventListener('mousemove', rotateToMouse);
    });

    item.addEventListener('mouseleave', () => {
        document.removeEventListener('mousemove', rotateToMouse);
        $card.style.transform = '';
        $card.style.background = '';
        $card.querySelector('.glow').style.backgroundImage = "none"
    });
});


const cards = document.querySelectorAll(".blur-hover");
cards.forEach((card) => {
    const height = card.clientHeight;
    const width = card.clientWidth;

    const mouseMoveHandler = (evt) => {
        evt.preventDefault();

        requestAnimationFrame(() => {
            const xRotation = -30 * ((evt.layerY - height / 2) / height);
            const yRotation = 20 * ((evt.layerX - width / 2) / width);

            card.style.transform = `perspective(1000px) scale(1.05) rotateX(${xRotation}deg) rotateY(${yRotation}deg)`;
        });
    };

    card.addEventListener("mousemove", mouseMoveHandler);

    card.addEventListener("mouseenter", (evt) => {
        evt.preventDefault();
        card.addEventListener("mousemove", mouseMoveHandler);
    });

    card.addEventListener("mouseout", (evt) => {
        evt.preventDefault();
        card.style.transform = "perspective(1000px) scale(1) rotateX(0) rotateY(0)";
        card.removeEventListener("mousemove", mouseMoveHandler);
    });

});
// --------------------
$(".mobile-category").click(function (e) {
    $(this).toggleClass("active");
    e.stopPropagation();

});

$(".pop-up").click(function (e) {
    e.stopPropagation();
});

$(document).click(function () {
    $(".mobile-category").removeClass("active");
});

// ----
$( ".search-form input" ).focus(function() {
    $(".search-form").addClass("active");
});$( ".search-form input" ).focusout(function() {
    $(".search-form").removeClass("active");
});
// -----

$(".user-details .image-box,.mobileNotifIcon").click(function (e) {
    $(".profile-pop-up").toggleClass("active");
    e.stopPropagation();
    $(".nav-dropdown").removeClass("active");

    load_notification();
});
$(".notif-items").click(function (e) {
    $(".mobile-item .profile-pop-up").toggleClass("active");
    e.stopPropagation();
    $(".nav-dropdown").removeClass("active");
});

$(".mobile-item .profile-pop-up").click(function (e) {
    e.stopPropagation();
});

$(document).click(function () {
    $(".mobile-item .profile-pop-up").removeClass("active");
    $(".profile-pop-up").removeClass("active");
});
// ----------
$(".close-error").click(function () {
    $(this).parent().hide()
});

$(".table-title-item .flex-box").click(function () {
    $(".table-title-item .flex-box").removeClass("active");
    $(this).addClass("active");


});
$(".faverite-c").click(function () {
    $(this).toggleClass("active");


});

$('.profile-pop-up a.justify-content-between:first-child img').attr('src','assets/icon/p-circle-item.svg');

String.prototype.replaceAll = function (find, replace) {
    return this.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
};

function toEnDigit(s) {
    return s.replace(/[\u0660-\u0669\u06f0-\u06f9]/g,    // Detect all Persian/Arabic Digit in range of their Unicode with a global RegEx character set
        function(a) { return a.charCodeAt(0) & 0xf }     // Remove the Unicode base(2) range that not match
    )
}