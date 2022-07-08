$(document).ready(function(){
  $('.feedback-list').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow:"<button type='button' class='slick-prev'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:"<button type='button' class='slick-next'><i class='fa-solid fa-angle-right'></i></button>",
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        }
      },
      {
        breakpoint: 739,
        settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        }
      },
    ]
  });
});
