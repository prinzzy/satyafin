document.addEventListener("DOMContentLoaded", function () {
    var navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            navLinks.forEach(function (nav) {
                nav.classList.remove("active");
            });
            this.classList.add("active");
        });
    });
});

// script.js
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 30) {
            // Ganti 50 dengan nilai pixel yang diinginkan
            $("#header").addClass("scrolled");
        } else {
            $("#header").removeClass("scrolled");
        }
    });
});
