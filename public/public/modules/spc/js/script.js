function myFunction(x) {
    x.classList.toggle("change");
    var a = document.getElementById("forms-list");
    if (a.style.display === "flex") {
        a.style.display = "none";
    } else {
        a.style.display = "flex";
    }
}
function menu1() {
    var x = document.getElementById("menu1");
    if (x.classList.contains("clicked")) {
        x.classList.remove('clicked');
    } else {
        x.classList.add('clicked');
    }
}
function menu2() {
    var x = document.getElementById("menu2");
    if (x.classList.contains("clicked")) {
        x.classList.remove('clicked');
    } else {
        x.classList.add('clicked');
    }
}
function menu3() {
    var x = document.getElementById("menu3");
    if (x.classList.contains("clicked")) {
        x.classList.remove('clicked');
    } else {
        x.classList.add('clicked');
    }
}
function menu4() {
    var x = document.getElementById("menu4");
    if (x.classList.contains("clicked")) {
        x.classList.remove('clicked');
    } else {
        x.classList.add('clicked');
    }
}


$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    centerMode: true,
    arrows: false,
    focusOnSelect: true
});

$('.slider').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: false
            }
        },
        {
            breakpoint: 800,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

// $(document).ready(function(){
//     // Initialize the Slick slider
//     $('.img-div').slick({
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         arrows: false,
//     });
//     // Change the active slide on page load to a random slide
//     setTimeout(function(){
//       $('.img-div').slick('slickGoTo', Math.floor(Math.random() * $('.img-div').slick('getSlick').slideCount));
//     }, 100);
//   });



document.addEventListener('DOMContentLoaded', function () {
    var slider = document.getElementById('img-div');
    var lastSlideIndex = localStorage.getItem('lastSlideIndex');
    var nextSlideIndex = (lastSlideIndex === null) ? Math.floor(Math.random() * slider.children.length) : (parseInt(lastSlideIndex) + 1) % slider.children.length;
    for (var i = 0; i < slider.children.length; i++) {
      if (i === nextSlideIndex) {
        slider.children[i].style.display = 'block';
      } else {
        slider.children[i].style.display = 'none';
      }
    }
    localStorage.setItem('lastSlideIndex', nextSlideIndex.toString());
  });
  
$(document).ready(function(){
    $("#close").click(function(){
        $(this).parent().closest('.nav-menu').removeClass('clicked');
    });
});
$(document).ready(function(){
    $("#hb-close").click(function(){
        $(this).parent().closest('.navbar-collapse').removeClass('show');
    });
});

