$(document).ready(function(){	
	"use strict";

	/***** Smooth Scroll *****/
	smoothScroll.init({
		speed: 600
	});
	
	/***** Sicky.js *****/
    $(".menu-content").sticky({ topSpacing: 0});

  	/***** WOW Js *****/
	new WOW().init();

	/***** Mean Menu *****/
	jQuery('nav#dropdown').meanmenu({
		meanScreenWidth: "767"
	});

	/***** Web Ticker *****/
	$('#webTicker').webTicker({
		height: '35px',
		speed: '40',
		duplicate: true,
		startEmpty:false
	});

	/***** Clock *****/
    function displayTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();    
        var meridiem = "AM";
        
        if (hours > 12) {
            hours = hours - 12;
            meridiem = "PM";
        }
        if (hours === 0) {
            hours = 12;    
        }
        if(hours < 10) {
            hours = "0" + hours;
        }
        if(minutes < 10) {
            minutes = "0" + minutes;
        }        
        if(seconds < 10) {
            seconds = "0" + seconds;
        }

        var clockDiv = document.getElementById('dg-clock');
        clockDiv.innerText = hours + ":" + minutes + ":" + seconds + " " + meridiem;
    }

    displayTime();
    setInterval(displayTime, 1000);

	/***** Owl Carousel *****/
	$(".owl-slider").owlCarousel({
		autoplay:true,
		animateOut: 'fadeOut',
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	smartSpeed:500,
		loop: true,
		items : 1,
		nav : false,
		margin: 0,
		responsiveClass: true,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			}
		}
    });

    $(".latest-slider").owlCarousel({
		autoplay:false,
		animateOut: 'fadeOut',
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	smartSpeed:500,
		loop: true,
		items : 1,
		nav : false,
		margin: 0,
		responsiveClass: true,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			}
		}
    });

    $(".popular-slider").owlCarousel({
		autoplay:false,
		animateOut: 'fadeOut',
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	smartSpeed:500,
		loop: true,
		items : 1,
		nav : false,
		margin: 0,
		responsiveClass: true,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			}
		}
    });

    $(".about-slider").owlCarousel({
		autoplay:false,
		animateOut: 'fadeOut',
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	smartSpeed:500,
		loop: true,
		items : 1,
		nav : true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 0,
		responsiveClass: true,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			}
		}
    });

    $(".testimonial-slider").owlCarousel({
		autoplay:true,
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	smartSpeed:500,
		loop: true,
		items : 1,
		nav : false,
		margin: 0,
		responsiveClass: true,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			}
		}
    });

    $(".relate-slider").owlCarousel({
		autoplay:false,
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	smartSpeed:500,
		loop: true,
		items : 2,
		nav : false,
		margin: 30,
		responsiveClass: true,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			768: {
				items: 2
			},
			992: {
				items: 2
			}
		}
    });

    /***** Magnific Popup *****/
    $('#video-btn').magnificPopup({
		type: 'iframe',
		iframe: {
			markup: '<div class="mfp-iframe-scaler">' +
					'<div class="mfp-close"></div>' +
					'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
				  '</div>',
			patterns: {
				youtube: {
					index: 'youtube.com/',
					id: 'v=',
					src: 'http://www.youtube.com/embed/%id%?autoplay=1'
				}
			},
			srcAction: 'iframe_src'
		}
	});

    /***** Syotimer *****/
	$('#timer-wrapper').syotimer({
		year: 2018,
		month: 2,
		day: 1,
		hour: 7,
		minute: 30
	});

	/***** Back To Top *****/
	$(window).scroll(function(){
	if($(this).scrollTop()>500){
	    $(".back-to-top i").fadeIn();
	}else{
	    $(".back-to-top i").hide();
	}
	});
	$(".back-to-top i").on('click',function(){
	    $("html, body").animate({scrollTop:0}, 900);
	});

	/***** Preloader *****/
	var $preloader = $('#page-preloader'),
    $spinner   = $preloader.find('.spinner-loader');
    $spinner.fadeOut();
    $preloader.delay(50).fadeOut('slow');

});