import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function () {
        let nav = document.querySelector("nav");
        if (window.scrollY > 50) {
            nav.classList.add("bg-opacity-80", "backdrop-blur-lg");
        } else {
            nav.classList.remove("bg-opacity-80", "backdrop-blur-lg");
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let nav = document.querySelector("nav");
    let main = document.querySelector("main");

    function adjustPadding() {
        main.style.paddingTop = nav.offsetHeight + "px";
    }

    adjustPadding();

    window.addEventListener("resize", adjustPadding);
});
