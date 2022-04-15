/*

Template: Car Dealer - The Best Car Dealer Automotive Responsive HTML5 Template
Author: potenzaglobalsolutions.com
Design and Developed by: potenzaglobalsolutions.com

*/



/*================================================
[  Table of contents  ]
================================================

:: Predefined Variables
:: Preloader
:: Mega menu
:: Search Bar
:: Owl carousel
:: Counter
:: Slider range
:: Countdown
:: Tabs
:: Accordion
:: List group item
:: Slick slider
:: Mgnific Popup
:: PHP contact form
:: Placeholder
:: Isotope
:: Scroll to Top
:: POTENZA Window load and functions

======================================
[ End table content ]
======================================*/

//POTENZA var
var POTENZA = {};

 (function($){
  "use strict";

/*************************
      Predefined Variables
*************************/
   var $window = $(window),
        $document = $(document),
        $body = $('body'),
        $countdownTimer = $('.countdown'),
        $counter = $('.counter');

    //Check if function exists
     $.fn.exists = function () {
        return this.length > 0;
    };

/*************************
        Preloader
*************************/
  POTENZA.preloader = function () {
       $("#load").fadeOut();
       $('#loading').delay(0).fadeOut('slow');
   };

/*************************
       Mega menu
*************************/
 POTENZA.megaMenu = function () {
    $('#menu').megaMenu({
           // DESKTOP MODE SETTINGS
          logo_align          : 'left',         // align the logo left or right. options (left) or (right)
          links_align         : 'left',        // align the links left or right. options (left) or (right)
          socialBar_align     : 'left',    // align the socialBar left or right. options (left) or (right)
          searchBar_align     : 'right',   // align the search bar left or right. options (left) or (right)
          trigger             : 'hover',           // show drop down using click or hover. options (hover) or (click)
          effect              : 'fade',             // drop down effects. options (fade), (scale), (expand-top), (expand-bottom), (expand-left), (expand-right)
          effect_speed        : 400,          // drop down show speed in milliseconds
          sibling             : true,              // hide the others showing drop downs if this option true. this option works on if the trigger option is "click". options (true) or (false)
          outside_click_close : true,  // hide the showing drop downs when user click outside the menu. this option works if the trigger option is "click". options (true) or (false)
          top_fixed           : false,           // fixed the menu top of the screen. options (true) or (false)
          sticky_header       : true,       // menu fixed on top when scroll down down. options (true) or (false)
          sticky_header_height: 250,  // sticky header height top of the screen. activate sticky header when meet the height. option change the height in px value.
          menu_position       : 'horizontal',    // change the menu position. options (horizontal), (vertical-left) or (vertical-right)
          full_width          : false,           // make menu full width. options (true) or (false)
         // MOBILE MODE SETTINGS
          mobile_settings     : {
            collapse            : true,    // collapse the menu on click. options (true) or (false)
            sibling             : true,      // hide the others showing drop downs when click on current drop down. options (true) or (false)
            scrollBar           : true,    // enable the scroll bar. options (true) or (false)
            scrollBar_height    : 400,  // scroll bar height in px value. this option works if the scrollBar option true.
            top_fixed           : false,       // fixed menu top of the screen. options (true) or (false)
            sticky_header       : false,   // menu fixed on top when scroll down down. options (true) or (false)
            sticky_header_height: 200   // sticky header height top of the screen. activate sticky header when meet the height. option change the height in px value.
         }
       });
 }

/*************************
       Search Bar
*************************/
 POTENZA.searchbar = function () {
      if ($(".search-top").exists()) {
         $('.search-btn').on("click", function () {
             $('.search-top').toggleClass("search-top-open");
               return false;
              });
                $("html, body").on('click', function (e) {
                 if (!$(e.target).hasClass("not-click")) {
                }
             });
      }
 }

/*************************
       owl carousel
*************************/
    POTENZA.carousel = function () {


 $(".owl-carousel").each(function () {
        var $this = $(this),
            $items = ($this.data('items')) ? $this.data('items') : 1,
            $loop = ($this.data('loop')) ? $this.data('loop') : true,
            $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
            $navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
            $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
            $space = ($this.attr('data-space')) ? $this.data('space') : 30;
            $(this).owlCarousel({
                loop: $loop,
                items: $items,
                responsive: {
                  0:{items: $this.data('xx-items') ? $this.data('xx-items') : 1},
                  480:{items: $this.data('xs-items') ? $this.data('xs-items') : 2},
                  768:{items: $this.data('sm-items') ? $this.data('sm-items') : 3},
                  980:{items: $this.data('md-items') ? $this.data('md-items') : 4},
                  1200:{items: $items}
                },
                dots: $navdots,
                margin:$space,
                nav: $navarrow,
                navText:["<i class='fa fa-angle-left fa-2x'></i>","<i class='fa fa-angle-right fa-2x'></i>"],
                autoplay: $autoplay,
                autoplayHoverPause: true
            });

    });
    }

/*************************
       Counter
*************************/
  POTENZA.counters = function () {
          if ($counter.exists()) {
              $counter.each(function () {
                  var $elem = $(this);
                      $elem.appear(function () {
                          $elem.find('.timer').countTo();
                      });
              });
          }
  };

/*************************
      Slider range
*************************/
  POTENZA.priceslider = function () {
   if($(".price-slide,.price-slide-2").exists()) {
        $("#slider-range,#slider-range-2").slider({
            range: true,
            min: 0,
            max: 500,
            values: [50, 300],
            slide: function(event, ui) {
                var min = ui.values[0],
                    max = ui.values[1];
                  $('#' + this.id).prev().val("$" + min + " - $" + max);
            }
        });
    }
  }

/*************************
         Countdown
*************************/
  POTENZA.countdownTimer = function () {
      if ($countdownTimer.exists()) {
            $countdownTimer.downCount({
                date: '10/05/2022 12:00:00',
                offset: 400
            });
      }
  };

/*************************
          Tabs
*************************/
 POTENZA.tabs = function () {
       var $tabsdata = $("#tabs li[data-tabs]"),
           $tabscontent = $(".tabcontent"),
           $tabsnav = $(".tabs li");

      $tabsdata.on('click', function () {
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).parent().parent().find('.tabcontent').hide();
        var tab = $(this).data('tabs');
        $(this).addClass('active');
        $('#' + tab).fadeIn().show();
      });

      $tabsnav.on('click', function () {
          var  cur = $tabsnav.index(this);
          var elm =  $(this).parent().parent().find('.tabcontent:eq('+cur+')');
          elm.addClass("pulse");
          setTimeout(function() {
                elm.removeClass("pulse");
          }, 220);
      });
      $("li[data-tabs]").each(function() {
         $(this).parent().parent().find('.tabcontent').hide().filter(':first').show();
       });
   }

/*************************
      Accordion
*************************/
  POTENZA.accordion = function () {
     var   $acpanel = $(".accordion > .accordion-content"),
           $acsnav = $(".accordion > .accordion-title > a");

          $acpanel.hide().first().slideDown("easeOutExpo");
          $acsnav.first().addClass("active");
          $acsnav.on('click', function () {
              var $this = $(this).parent().next(".accordion-content");
              $acsnav.removeClass("active");
              $(this).addClass("active");
              $acpanel.not($this).slideUp("easeInExpo");
              $(this).parent().next().slideDown("easeOutExpo");
              return false;
        });
  }

 /*************************
      List group item
 *************************/
  POTENZA.featurelist = function () {
      var $featurenav = $(".list-group-item a");
          $featurenav.on('click', function () {
           if(!($(this).hasClass("current"))){
               $featurenav.removeClass("current").next("ul").slideUp();
             }
             $(this).toggleClass("current");
             $(this).next("ul").slideToggle("slow");
             return false;
        });
    }

 /*************************
      Slick slider
*************************/
  POTENZA.slickslider = function () {
      if ($(".slider-slick").exists()) {
          $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: '.slider-nav'
          });
        $('.slider-nav').slick({
          slidesToShow: 5,
          slidesToScroll: 1,
          asNavFor: '.slider-for',
          dots: false,
          centerMode: true,
          focusOnSelect: true
        });
      }
  }

    /*************************
        NiceScroll
*************************/
    POTENZA.pniceScroll = function () {
    if ($(".scrollbar").exists()) {
        $(".scrollbar").niceScroll({
          scrollspeed: 150,
          mousescrollstep: 38,
          cursorwidth: 5,
          cursorborder: 0,
          cursorcolor: '#2f3742',
          autohidemode: true,
          zindex: 99999,
          horizrailenabled: false,
          cursorborderradius: 0,
        });
        }
    }

/*************************
       Magnific Popup
*************************/
  POTENZA.mediaPopups = function () {
    if ($(".popup-gallery").exists()) {
          $('.popup-gallery').magnificPopup({
              delegate: 'a.popup-img',
              type: 'image',
              tLoading: 'Loading image #%curr%...',
              mainClass: 'mfp-img-mobile',
              gallery: {
                  enabled: true,
                  navigateByImgClick: true,
                  preload: [0,1] // Will preload 0 - before current, and 1 after the current image
              },
              image: {
                  tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                  titleSrc: function(item) {
                      return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                  }
             }
         });
      }
      if ($(".popup-youtube, .popup-vimeo, .popup-gmaps").exists()) {
           $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
          });
      }
  }

 /*************************
     PHP contact form
*************************/
	function isNotEmpty( element ) {
		return ( ( $(element).val() != $(element).attr("placeholder") ) && ( $(element).val().length > 0 ) );
	}

	POTENZA.contactform = function () {
		var contactform_submit_disabled = false;
		$(document).on('click','#contactform #submit',function(){

			if ( contactform_submit_disabled ) {
				return false;
			}

			var validationStr = false;
			var textArray = [
				"contactform_name",
				"contactform_phone",
				"contactform_email",
				"contactform_message",
			];
			for (var n = 0; n < textArray.length; n++) {
				var str = textArray[n],
					e = document.getElementById(str);
				if (e) {
					$('#'+str).css({"border":"1px solid transparent"});
					if ( ! isNotEmpty(e) ) {
						validationStr = true;
						$('#'+str).css({"border-style":"solid","border-width":"1px 1px 1px 1px","border-color":"red"});
					}
					if (str == "contactform_email") {
						var varTestExp=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						var varEmail = e.value;
						if (varEmail.search(varTestExp) == -1) {
							validationStr = true;
							$('#'+str).css({"border-style":"solid","border-width":"1px 1px 1px 1px","border-color":"red"});
						}
					}

				}
			}

			if (validationStr) {
			   return false;
			}
			$.ajax({
				type : "POST",
				dataType:'json',
				url : "php/contact-form.php",
				data : $('#contactform').serialize(),
				beforeSend : function(arr, $form, options){
					contactform_submit_disabled = true;
					$( '#contactform #submit .btn-loader' ).show();
				},
				success : function (data) {
					if ( data.status == 'success' ) {
						$( '#contactform' )[0].reset();
					}
					$( '#contactform #submit .btn-loader' ).hide();
					$( '#formmessage' ).fadeIn();
					$( '#formmessage' ).html(data.msg).delay(4000).fadeOut('slow');
					contactform_submit_disabled = false;
				},
				error: function(msg){
					$( '#contactform #submit .btn-loader' ).hide();
					alert('Something went wrong!');
					contactform_submit_disabled = false;
				}
			});
			return false;
		});
    }

/*************************
        Placeholder
 *************************/
  POTENZA.placeholder = function () {
       var $placeholder = $('[placeholder]');
           $placeholder.focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
              input.val('');
              input.removeClass('placeholder');
            }
          }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
              input.addClass('placeholder');
              input.val(input.attr('placeholder'));
            }
          }).blur().parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
              var input = $(this);
              if (input.val() == input.attr('placeholder')) {
                input.val('');
              }
          })
      });
  }

/*************************
         Isotope
*************************/
 POTENZA.Isotope = function () {
      var $isotope = $(".isotope"),
          $itemElement = '.grid-item',
          $filters = $('.isotope-filters');
        if ($isotope.exists()) {
            $isotope.isotope({
            resizable: true,
            itemSelector: $itemElement,
              masonry: {
                gutterWidth: 10
              }
            });
       $filters.on( 'click', 'button', function() {
         var $val = $(this).attr('data-filter');
             $isotope.isotope({ filter: $val });
             $filters.find('.active').removeClass('active');
             $(this).addClass('active');
      });
    }
 }

 // masonry
  POTENZA.masonry = function () {
        var $masonry = $('.masonry-main .masonry'),
            $itemElement = '.masonry-main .masonry-item';
            if ($masonry.exists()) {
              $masonry.isotope({
                resizable: true,
                itemSelector: $itemElement,
                masonry: {
                  gutterWidth: 10
                }
              });
         }
  }

/*************************
      Scroll to Top
*************************/
  POTENZA.scrolltotop = function () {
      var $scrolltop = $('.car-top');

      $scrolltop.on('click', function () {
          $('html,body').animate({
                    scrollTop: 0
             }, 800);
          $(this).addClass("car-run");
          setTimeout(function(){ $scrolltop.removeClass('car-run');},1000);
          return false;
      });
      $window.on('scroll', function () {
          if($window.scrollTop() >= 200) {
              $scrolltop.addClass("show");
              $scrolltop.addClass("car-down");
             } else {
               $scrolltop.removeClass("show");
               setTimeout(function(){ $scrolltop.removeClass('car-down');},300);
            }
       });
  }

/*************************
      Scroll to Top
*************************/
  POTENZA.sidebarfixed = function () {
 if ($(".listing-sidebar").exists()) {
	(function() {
	  var reset_scroll;

	  // $(function() {
	  //   return $("[data-sticky_column]").stick_in_parent({
	  //     parent: "[data-sticky_parent]"
	  //   });
	  // });

	  reset_scroll = function() {
	    var scroller;
	    scroller = $("body,html");
	    scroller.stop(true);
	    if ($(window).scrollTop() !== 0) {
	      scroller.animate({
	        scrollTop: 0
	      }, "fast");
	    }
	    return scroller;
	  };

	  window.scroll_it = function() {
	    var max;
	    max = $(document).height() - $(window).height();
	    return reset_scroll().animate({
	      scrollTop: max
	    }, max * 3).delay(100).animate({
	      scrollTop: 0
	    }, max * 3);
	  };
	  window.scroll_it_wobble = function() {
	    var max, third;
	    max = $(document).height() - $(window).height();
	    third = Math.floor(max / 3);
	    return reset_scroll().animate({
	      scrollTop: third * 2
	    }, max * 3).delay(100).animate({
	      scrollTop: third
	    }, max * 3).delay(100).animate({
	      scrollTop: max
	    }, max * 3).delay(100).animate({
	      scrollTop: 0
	    }, max * 3);
	  };

	  $(window).on("resize", (function(_this) {
	    return function(e) {
	      return $(document.body).trigger("sticky_kit:recalc");
	    };
	  })(this));

	}).call(this);

	(function() {
	  var sticky;
	  if(window.matchMedia('(min-width: 768px)').matches) {
	      $(".listing-sidebar").sticky({topSpacing:0});
	  }
	 });
   }
  }
  

/****************************************************
     POTENZA Window load and functions
****************************************************/

  //Window load functions
  $window.on("load",function(){
          POTENZA.preloader(),
          POTENZA.Isotope(),
          POTENZA.masonry();
    });
  //Document ready functions
    $document.ready(function () {
        POTENZA.megaMenu(),
        POTENZA.searchbar(),
        POTENZA.counters(),
        POTENZA.carousel(),
        POTENZA.priceslider(),
        POTENZA.tabs(),
        POTENZA.accordion(),
        POTENZA.featurelist(),
        POTENZA.slickslider(),
        POTENZA.pniceScroll(),
        POTENZA.mediaPopups(),
        POTENZA.contactform(),
        POTENZA.placeholder(),
        POTENZA.scrolltotop(),
        POTENZA.sidebarfixed(),
        POTENZA.countdownTimer();
        var date = new Date();

// add a day
          date.setDate(date.getDate() + 1);
          var maxdate = new Date();
          maxdate.setDate(maxdate.getDate()+40);
          $("#appointment_date").datetimepicker({
          inline:true,
          minDate: date,
          maxDate: maxdate,
          allowTimes:[
            '09:00','10:00','11:00',
            '12:00', '13:00','14:00', '15:00',
            '16:00', '17:00', '18:00', '19:00', '20:00'
           ],
           beforeShowDay:
                   function (date) {
                       return [date.getDay() == 0  ? false : true];
                   }
           

          
        });

        $.validator.addMethod(
  "regex",
  function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Misplaced space please check."
);

        $.validator.addMethod("noSpace", function(value, element) { 
          return value.indexOf(" ") < 0 && value != ""; 
        }, "Cannot use whitespace");
        $.validator.addMethod("validate_email", function(value, element) {
        
        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
        return true;
        } else {
        return false;
        }
        
        }, "Please enter a valid Email.");
        jQuery.validator.addMethod("notEqual", function(value, element, param) {
          return this.optional(element) || value != param;
        }, "Both fields can not be same");
        
        
        $.validator.addMethod("alphabets", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
        },"You only can use letters");
          $("#form").validate({
                  
        rules: {
        Firstname: {
                required:true,
                minlength:2,
                regex:"^[^\s].+[a-zA-Z]+[a-zA-Z]+$",
                alphabets:true,
                maxlength: 20,
        },
        Lastname: {
          required:true,
        noSpace: true,
        alphabets:true,
        maxlength: 20,
        
        minlength: 2,
        },
        Email: {
          required:true,
        validate_email: true,
        noSpace: true,
        maxlength: 50,
        
        
        },
        Username: {
          required:true,
        noSpace: true,
        minlength:4,
        maxlength: 20,
        },
        Password: {
          required:true,
        required: true,
        noSpace: true,
          minlength:8,
          
        },
        confirmPassword:{
          required:true,
          minlength:8,
          noSpace: true,
          
        
          equalTo: "#Password",
        
        },
        
        Address: {
          required:true,
          alphabets:true,
          regex:"^[^\s].+[a-zA-Z]+[a-zA-Z]+$",
        required:true,
        maxlength: 100,
        },
        },
        
        
        messages : {
         Firstname: {
         minlength: "Name should be at least 3 characters long",
         required:"",
         },
        Lastname: {
        minlength: "Lastname should be at least 3 characters long",
        required:"",
        },
        Email: {
        required: "",
        
        
        },
        Username: {
            minlength: "Name should be at least 4 characters",
            required:"",
        },
        Password: {
        
        minlength:"Password must be minimum 8 characters long",
        required:"",
        },
        confirmPassword:{
                equalTo:"Password must match Confirmed Password",
                required:"",
        },
        Address: {
        required:"Please fill out this fild"
        },
        },
        
        submitHandler:function(form){
                form.submit();
        }
        
      }); 
      // jQuery('#contactform').validate({
      //           rules:{
      //                   name:{
      //                           alphabets:true,
      //                           noSpace:true,
      //                           minlength:3,
      //                   },
      //                   email:{
      //                     required: true,
      //                     validate_email: true,
      //                     noSpace: true,
                                
      //                   },
      //                   phone:{
      //                     required: true,
		  // number: true,
		  // minlength: 10,
		  // maxlength: 10
      //                   }
      //           }

      //   });
        jQuery('#loginform').validate({
          rules:{
                 username:{required:true, maxlength: 20,},
                 password:{required:true, maxlength: 15},
          },
          submitHandler:function(form){
            form.submit();
    }

  });
 jQuery('#contactform').validate({
                rules:{
                        name:{  
                                alphabets:true,
                                regex:"^[^\s].+[a-zA-Z]+[a-zA-Z]+$",
                                minlength:2,
                                maxlength:20,
                        },
                        email:{
                          required: true,
                          validate_email: true,
                          noSpace: true,
                          maxlength:50,
                        },
                        phone:{
                          required: true,
		  number: true,
		  minlength: 10,
		  maxlength: 10
                        },
                        message:{
                          
                          maxlength:700,
                          regex:"^[^\s].+[a-zA-Z]+[a-zA-Z]+$",
                        }
                },
                message:{required:"",}

        });
        
  jQuery('#editprofile').validate({
    rules:{
      firstname:{
		  required:true,
      minlength:2,
      noSpace: true,
      alphabets:true,
      maxlength: 20,
    },

           lastname:{required:true,
          minlength:2,
          noSpace: true,
          alphabets:true,
          maxlength: 20,
          },
          address:{
            required:true,
            maxlength: 100,
          
          noSpace: true,
          alphabets:true,
          }
    },
    message:{required:"",},
    submitHandler:function(form){
      form.submit();
}

});

jQuery('#editpassword').validate({
    rules:{
		oldpassword:{
		  required:true,
      noSpace: true,
      maxlength: 15,
     
    },

	newpassword:{required:true,
          minlength:8,
          noSpace: true,
          notEqual:"oldpassword",
          
          },
		  confpassword:{
			  required:8,
        noSpace: true,
			  equalTo:"#newpassword",
        
		  },

    },
    submitHandler:function(form){
      form.submit();
}

});

     



    });
    
   
$("a").click(function(){
  
  setTimeout(
    function() 
    {
      $("a").removeAttr("style");
    }, 10);


  

});
    
    

})(jQuery);



