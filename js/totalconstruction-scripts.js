jQuery(document).ready(function($){
  $('.gallery-main').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.gallery'
  });
  $('.gallery').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.gallery-main',
    dots: false,
    centerMode:true,
    focusOnSelect:true
  });

  var filterOn = false;
  $('#gallery-nav').on('change', function(){
    var filter = '.' + $(this).find(':selected').val();

    if(filterOn === true){
      $('.gallery-main, .gallery').slick('slickUnfilter');
    }

    $('.gallery-main, .gallery').slick('slickFilter', filter);
    filterOn = true;
  });
});