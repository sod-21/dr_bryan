
jQuery(function($) {

    //sticky
    function sticky() {
      if ($(window).scrollTop() > 1) {
        $('.site-header').addClass("sticky-header");            
      } else {
          $('.site-header').removeClass("sticky-header");            
      }
    }

    jQuery(window).on('scroll', function() {
      sticky();
    });

    jQuery(window).on('resize', function() {
      if (jQuery(window).width() > 1020) {
        if (jQuery(".main-navigation.toggled").length) {
          jQuery(".menu-toggle").trigger("click");
        }
      }
    });

    sticky();

    if (jQuery('.banner-slider').length) {
      jQuery('.banner-slider').slick({
        draggable: true,        
        centerMode: true,        
        centerPadding: 0,
        slidesToShow: 1,
        arrows: false,
        dots: false,
        swipeToSlide: true,
        infinite: true,
        fade: true
      });
  
    }
      
    if (jQuery(".image_carousel").length) {
      jQuery('.image_carousel').slick({
        draggable: true,        
        centerMode: true,        
        centerPadding: 0,
        slidesToShow: 1,
        arrows: true,
        dots: true,
        swipeToSlide: true,
        infinite: true,
        asNavFor: ".image_carousel"
      });
    }
  
    if (jQuery(".testimonial-carousel").length) {
      jQuery('.testimonial-carousel').slick({
        draggable: true,        
        centerMode: true,        
        centerPadding: 0,
        slidesToShow: 3,
        arrows: true,
        dots: true,
        swipeToSlide: true,
        infinite: true, 
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    }
    
    jQuery("[data-section]").onScreen({
        container: window,
        direction: 'vertical',
        doIn: function() {
            
            var type = jQuery(this).attr("data-type");
            if (type == "counter") {
              jQuery(this).find(".counter-elment").each(function() {
                var upto = jQuery(this).attr('data-upto');
                console.log(upto);
                if (upto) {
                  var count = new CountUp(jQuery(this)[0], parseInt(upto));
                  count.start();
                }        
              });
            }
        },
        doOut: function(e) {
          // Do something to the matched elements as they get off scren
        },
        tolerance: 0,
        throttle: 50,
        toggleClass: 'onScreen',       
        debug: false
     });

     jQuery("a[data-popup]").magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      mainClass: 'mfp-img-mobile',
      image: {
        verticalFit: true
      },
      gallery:{
        enabled:true
      },
    });
  
    var lazyContent = new LazyLoad({});
    lazyContent.update();


    if (jQuery(".image-gallery").length) {
      jQuery(".image-gallery .image-btn").magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom',
        gallery: {
          enabled: true
        },
        zoom: {
          enabled: true, 
      
          duration: 300, // duration of the effect, in milliseconds
          easing: 'ease-in-out', // CSS transition easing function
      
          opener: function(openerElement) {
      
            return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }
      });
      // jQuery(".image-gallery .image-btn").on("click", function(event) {
      //   var gallery = $(this).attr('href');
    
      //   $(gallery).magnificPopup({
      //     delegate: 'a',
      //     type:'image',
      //     gallery: {
      //       enabled: true
      //     }
      //   }).magnificPopup('open');
      // });

     
       
     
    }
    if ($(".v-button").length) {
      $('.v-button').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,    
        fixedContentPos: false
      });
    }
    
  });
  
  
  window.lazyLoadOptions = {
    
  };
  
  window.addEventListener(
    "LazyLoad::Initialized",
    function (event) {
      window.lazyLoadInstance = event.detail.instance;
    },
    false
  );