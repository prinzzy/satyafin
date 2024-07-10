document.addEventListener("DOMContentLoaded", function () {
    var navLinks = document.querySelectorAll(".nav-link, .dropdown-item");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            // Remove active class from all nav links
            navLinks.forEach(function (link) {
                link.classList.remove("active");
            });

            // Add active class to the clicked link or its parent nav-link if it's a dropdown item
            if (this.classList.contains("dropdown-item")) {
                this.closest(".nav-item.dropdown")
                    .querySelector(".nav-link")
                    .classList.add("active");
            } else {
                this.classList.add("active");
            }
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
