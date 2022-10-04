
var iconsPlay = document.querySelectorAll(".js-icon-play");

iconsPlay.forEach(icon => icon.addEventListener("click", function () {
    icon.parentNode.style.display = "none";
    icon.parentNode.previousElementSibling.src += "?autoplay=1";
}));

// document.addEventListener('DOMContentLoaded', function () {
//     $('.datepicker-custom').datepicker({
//         minDate: new Date(),
//     });

// })
