// Nav bar scroll
// NAV BAR SCROLL
$(window).scroll((e) => {
    let navBar = $("#navbar");
    if (window.scrollY >= 20) {
        console.log(navBar)
        navBar.removeClass("border-white");
    } else {
        navBar.addClass("border-white");
    }
});

//ScrollReveal
var fadeIn = {
    duration: 1500,
    delay: 100,
    easing: "ease",
};
var fadeInFast = {
    duration: 800,
    delay: 100,
    easing: "ease",
};
var fadeTop = {
    distance: "20%",
    origin: "top",
};
var fadeLeft = {
    distance: "20%",
    origin: "left",
};
var fadeRight = {
    distance: "20%",
    origin: "right",
};
var fadeBottom = {
    distance: "20%",
    origin: "bottom",
};

ScrollReveal().reveal(".home-product-text", fadeInFast);

ScrollReveal().reveal(".fade-in", fadeIn);
ScrollReveal().reveal(".fade-left", fadeLeft);
ScrollReveal().reveal(".fade-right", fadeRight);
ScrollReveal().reveal(".fade-top", fadeTop);
ScrollReveal().reveal(".fade-bottom", fadeBottom);





