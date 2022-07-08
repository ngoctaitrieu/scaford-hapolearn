$(document).ready(function(){
  $('.feedback-list').slick({
    dots: true,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow:"<button type='button' class='slick-prev'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:"<button type='button' class='slick-next'><i class='fa-solid fa-angle-right'></i></button>",
    autoplay: false,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});
