jQuery(document).ready(function($){
  if(typeof $.fn.slick == 'function'){
    $('.gallery-main').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.gallery',
      centerMode:true
    });
    $('.gallery').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      asNavFor: '.gallery-main',
      dots: false,
      centerMode:true,
      focusOnSelect:true,
      arrows:true,
      prevArrow:'<button type="button" class="gallery-arrow slick-prev">Previous</button>',
      nextArrow:'<button type="button" class="gallery-arrow slick-next">Next</button>',
      responsive:[
        {
          breakpoint:991,
          settings:{
            slidesToShow:4,
            slidesToScroll:1,
            centerMode:true,
            focusOnSelect:true,
            arrows:true
          }
        },
        {
          breakpoint:767,
          settings:{
            slidesToShow:3,
            slidesToScroll:1,
            centerMode:true,
            focusOnSelect:true,
            arrows:true
          }
        },
        {
          breakpoint:570,
          settings:{
            slidesToShow:2,
            slidesToScroll:1,
            centerMode:true,
            focusOnSelect:true,
            arrows:true
          }
        },
        {
          breakpoint:400,
          settings:{
            slidesToShow:1,
            slidesToScroll:1,
            centerMode:true,
            focusOnSelect:true
          }
        }
      ]
    });

    var filterOn = false;
    $('#gallery-nav').on('change', function(){
      var filter = '.' + $(this).find(':selected').val();

      if(filterOn === true){
        $('.gallery').slick('slickUnfilter');
      }

      $('.gallery').slick('slickFilter', filter);
      filterOn = true;
      //$(window).trigger('resize');
    });
  }
});