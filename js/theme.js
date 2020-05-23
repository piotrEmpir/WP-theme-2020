jQuery(document).ready(function($) {


/*
   if($('.owl_single_product').length > 0) {
      $('.owl_single_product').owlCarousel({
         loop: true,
         nav: true,
         dots: false,
         items: 1,
         autoplay: true,
         autoplayTimeout: 5000,
         autoplayHoverPause: true,
         navText : ["<i class='arr-left'></i>","<i class='arr-right'></i>"]
      });
   }

   if($('.owl_gallery_slider').length > 0) {
      $('.owl_gallery_slider').owlCarousel({
         loop: true,
         nav: true,
         autoplay: true,
         autoplayTimeout: 5000,
         autoplayHoverPause: true,
         autoHeight:true,
         navText : ["<i class='arr-left'></i>","<i class='arr-right'></i>"],
         dots: false,
         responsive:{
              0:{
                  items:1,
              },
              700:{
                  items:2
              },
              1000:{
                  items:3,
                  nav:true
              },
              1400:{
                  items:4,
                  nav:true
              },
              1750:{
                  items:5,
                  nav:true
              },
              2200:{
                  items:6,
                  nav:true
              }
          }
      });
   }
*/
/*
  $('.js-prod-filter a').on('click', function(e){
    e.preventDefault();

    var filter = $(this).data('filter');


    $('.products_list article').each(function(){
        $(this).hide();
        if( $(this).hasClass(filter) ){
          //$(this).css({ 'opacity' : 0.5});
          $(this).show();
        }
    });

  })*/





   $('.menu-toggle, .offscreen-menu .close').on('click', function(e) {
      e.preventDefault();

      $(this).toggleClass('active');
      $('.offscreen-menu').toggleClass('active');

   });


    $('.offscreen-menu .menu-item-has-children > a').each(function() {
      $(this).after('<div class="sub_toggle"><i class=""></i></div>');
    });

    $('.sub_toggle').on("click", function(event) {
      event.preventDefault();
      $(this).parent().toggleClass('act');
      $(this).next().slideToggle();
    });



/*
   $('.faq_item .faq_title').on('click', function(e) {
      e.preventDefault();
      $(this).parent().toggleClass('active');
      $(this).parent().find('.faq_content').slideToggle();

   })
*/


});