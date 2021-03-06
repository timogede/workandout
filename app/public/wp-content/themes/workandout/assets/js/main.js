$(document).ready(function () {
  //toggle mobile menu
  $(".header__navigation-toggle").click(function () {
    $("body").toggleClass("header__navigation-toggle--open");
  });
  //toggle active image-carousel__item
  $(".image-carousel__item").click(function () {
    if ($(this).hasClass("image-carousel__item--active")) {
      $(this).removeClass("image-carousel__item--active");
      return;
    }
    $(".image-carousel__item").removeClass("image-carousel__item--active");
    $(this).addClass("image-carousel__item--active");
  });
  //toggle active trainings
  $(".training").click(function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      return;
    }
    $(".training").removeClass("active");
    $(this).addClass("active");
  });

  //toggle open more info features box
  $(".features__more-wrap").click(function () {
    if ($(this).hasClass("open")) {
      $(this).removeClass("open");
      return;
    }
    $(".features__more-wrap").removeClass("open");
    $(this).addClass("open");
  });

  //toggle accordion open
  $(".accordion__headline-wrap").click(function () {
    if ($(this).parent().hasClass("open")) {
      $(this).parent().removeClass("open");
      return;
    }
    $(".accordion__item").removeClass("open");
    $(this).parent().addClass("open lll");
  });

  //slick
  $(".image-carousel__items").slick({
    dots: false,
    autoplaySpeed: 3500,
    fade: false,
    cssEase: "ease-out",
    autoplay: false,
    pauseOnFocus: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    prevArrow: $(".image-carousel__slick-arrow.prev-arrow"),
    nextArrow: $(".image-carousel__slick-arrow.next-arrow"),
    arrows: true,

    responsive: [
      {
        breakpoint: 1301,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 1201,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
          infinite: true,
        },
      },
      {
        breakpoint: 580,
        settings: {
          slidesToShow: 1,
          infinite: true,
        },
      },
    ],
  });

  //slick
  $(".location-box__items").slick({
    dots: true,
    autoplaySpeed: 3500,
    fade: false,
    cssEase: "ease-out",
    autoplay: false,
    pauseOnFocus: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    prevArrow: $(".location-box__slick-arrow.prev-arrow"),
    nextArrow: $(".location-box__slick-arrow.next-arrow"),
    arrows: true,
  });
});
