/*
 *
 *		CUSTOM.JS
 *
 */

(function($){
	
	// DETECT TOUCH DEVICE //
	function is_touch_device() {
		return !!('ontouchstart' in window) || ( !! ('onmsgesturechange' in window) && !! window.navigator.maxTouchPoints);
	}
	
	
	// SHOW/HIDE MOBILE MENU //
	function show_hide_mobile_menu() {
		
		$("#mobile-menu-button").on("click", function(e) {
            
			e.preventDefault();
			
			$("#mobile-menu").slideToggle(300);
			
        });	
		
	}
	
	
	// MOBILE MENU //
	function mobile_menu() {
		
		if ($(window).width() < 992) {
			
			if ($("#menu").length > 0) {
			
				if ($("#mobile-menu").length < 1) {
					
					$("#menu").clone().attr({
						id: "mobile-menu",
						class: ""
					}).insertAfter("#header");
					
					$("#mobile-menu .megamenu > a").on("click", function(e) {
                        
						e.preventDefault();
						
						$(this).toggleClass("open").next("div").slideToggle(300);
						
                    });
					
					$("#mobile-menu .dropdown > a").on("click", function(e) {
                        
						e.preventDefault();
						
						$(this).toggleClass("open").next("ul").slideToggle(300);
						
                    });
				
				}
				
			}
				
		} else {
			
			$("#mobile-menu").hide();
			
		}
		
	}
	
	
	// STICKY //
	function sticky() {
		
		var sticky_point = $("#header-top").innerHeight() + $("#header").innerHeight() + 20;
		
		$("#header").clone().attr({
			id: "header-sticky",
			class: ""
		}).insertAfter("header");
		
		$(window).scroll(function(){
			
			if ($(window).scrollTop() > sticky_point) {  
				$("#header-sticky").slideDown(700).addClass("header-sticky");
				$("#header .menu ul, #header .menu .megamenu-container").css({"visibility": "hidden"});
			} else {
				$("#header-sticky").slideUp(100).removeClass("header-sticky");
				$("#header .menu ul, #header .menu .megamenu-container").css({"visibility": "visible"});
			}
			
		});
		
	}
	
 
	// PROGRESS BARS // 
	function progress_bars() {
		
		$(".progress .progress-bar:in-viewport").each(function() {
			
			if (!$(this).hasClass("animated")) {
				$(this).addClass("animated");
				$(this).animate({
					width: $(this).attr("data-width") + "%"
				}, 2000);
			}
			
		});
		
	}


	// CHARTS //
	function pie_chart() {
		
		if (typeof $.fn.easyPieChart !== 'undefined') {
		
			$(".pie-chart:in-viewport").each(function() {
				
				$(this).easyPieChart({
					animate: 1500,
					lineCap: "square",
					lineWidth: $(this).attr("data-line-width"),
					size: $(this).attr("data-size"),
					barColor: $(this).attr("data-bar-color"),
					trackColor: $(this).attr("data-track-color"),
					scaleColor: "transparent",
					onStep: function(from, to, percent) {
						$(this.el).find(".pie-chart-percent .value").text(Math.round(percent));
					}
				});
				
			});
			
		}
		
	}
	
	// COUNTER //
	function counter() {
		
		if (typeof $.fn.jQuerySimpleCounter !== 'undefined') {
		
			$(".counter .counter-value:in-viewport").each(function() {
				
				if (!$(this).hasClass("animated")) {
					$(this).addClass("animated");
					$(this).jQuerySimpleCounter({
						start: 0,
						end: $(this).attr("data-value"),
						duration: 2000
					});	
				}
			
			});
			
		}
	}
	
	
	// STATISTICS //
	function statistics() {
		
		$(".statistics-container .animate-chart:in-viewport").each(function() {
			
			if(!$(this).hasClass("animated")) {
				
				$(this).addClass("animated");
				
				// DOUGHNUT CHART //
				var data = [		
					{
						value: 25,
						color: "#e4f0f2",
						highlight: "#e4f0f2",
						label: "#e4f0f2"
					},
					{
						value: 30,
						color: "#c8bba2",
						highlight: "#c8bba2",
						label: "#c8bba2"
					},										
					{
						value: 35,
						color:"#04142a",
						highlight: "#04142a",
						label: "#04142a"
					}
				]
				
				if ($("#doughnut-chart").length > 0) {
				
					var doughnut_chart = new Chart(document.getElementById("doughnut-chart").getContext("2d")).Pie(data, { 
						responsive: true,
						showTooltips: false,
						animationSteps: 100,
						percentageInnerCutout: 80
					});
					
				}
				
				
				// AREA CHART //
				var data = {
					labels : ["Jan" ,"Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets : [
						{
							fillColor: "transparent",
							strokeColor: "transparent",
							pointColor: "transparent",
							pointStrokeColor: "transparent",
							data : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
						},
						{
							fillColor: "transparent",
							strokeColor: "transparent",
							pointColor: "transparent",
							pointStrokeColor: "transparent",
							data : [350, 350, 350, 350, 350, 350, 350, 350, 350, 350, 350, 350]
						},
						{
							fillColor: "rgba(56, 126, 186, 0.3)",
							strokeColor: "#387eba",
							pointColor: "#387eba",
							pointStrokeColor: "#387eba",
							data : [100, 50, 50, 100, 150, 150, 200, 250, 300, 250, 250, 250]
						},
						{
							fillColor: "rgba(200, 187, 162, 0.3)",
							strokeColor: "#c8bba2",
							pointColor: "#c8bba2",
							pointStrokeColor: "#c8bba2",
							data : [50, 100, 100, 150, 200, 200, 150, 200, 250, 300, 300, 350]
						}
					]
				}
			
				if ($("#area-chart").length > 0) {
			
					var area_chart = new Chart(document.getElementById("area-chart").getContext("2d")).Line(data, { 
						responsive: true,
						showTooltips: false,
						bezierCurve: false,
						pointDotStrokeWidth: 1
					});
				
				}
				
				
				// LINE CHART //
				var data = {
					labels : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
					datasets : [
						{
							fillColor: "transparent",
							strokeColor: "transparent",
							pointColor: "transparent",
							pointStrokeColor: "transparent",
							data : [0, 0, 0, 0, 0, 0, 0, 0]
						},
						{
							fillColor: "transparent",
							strokeColor: "transparent",
							pointColor: "transparent",
							pointStrokeColor: "transparent",
							data : [400, 400, 400, 400, 400, 400, 400, 400]
						},
						{
							fillColor: "transparent",
							strokeColor: "#364b6a",
							pointColor: "#364b6a",
							pointStrokeColor: "364b6a",
							data : [150, 200, 300, 275, 350, 325, 350, 375]
						},
						{
							fillColor: "transparent",
							strokeColor: "#c8bba2",
							pointColor: "#c8bba2",
							pointStrokeColor: "c8bba2",
							data : [100, 50, 250, 225, 200, 300, 275, 350]
						},
					]
				}
				
				if ($("#line-chart").length > 0) {
			
					var line_chart = new Chart(document.getElementById("line-chart").getContext("2d")).Line(data, { 
						responsive: true,
						showTooltips: false,
						bezierCurve: false,
						pointDotStrokeWidth: 1
					});
					
				}
				
				
				// BAR CHART //
				var data = {
					labels : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [
						{
							label: "",
							fillColor: "#364b6a",
							strokeColor: "#364b6a",
							highlightFill: "#364b6a",
							highlightStroke: "#364b6a",
							data: [310, 260, 210, 260, 310, 340, 210, 260, 190, 125, 100, 125]
						},
						{
							label: "",
							fillColor: "#c8bba2",
							strokeColor: "#c8bba2",
							highlightFill: "#c8bba2",
							highlightStroke: "#c8bba2",
							data: [210, 140, 90, 140, 210, 325, 90, 140, 125, 115, 50, 75]
						}
					]
				};
				
				var bar_chart_options = { 
					responsive: true,
					showTooltips: false,
					barShowStroke: true,
					barStrokeWidth: 1,
					barValueSpacing: 25,
					barDatasetSpacing: 10
				}
				
				if ($(window).width() < 767) {
					
					var bar_chart_options = { 
						responsive: true,
						showTooltips: false,
						barShowStroke: true,
						barStrokeWidth: 1,
						barValueSpacing: 8,
						barDatasetSpacing: 3
					}
					
				}
				
				if ($("#bar-chart").length > 0) {
			
					var bar_chart = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(data, bar_chart_options);
					
				}
				
			}
			
		});
		
	}
	
	function statistics_tab() {
		
		// BAR CHARTS //
		var data1 = {
			labels : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [
				{
					label: "",
					fillColor: "#364b6a",
					strokeColor: "#364b6a",
					highlightFill: "#364b6a",
					highlightStroke: "#364b6a",
					data: [310, 260, 210, 260, 310, 340, 210, 260, 190, 125, 100, 125]
				},
				{
					label: "",
					fillColor: "#c8bba2",
					strokeColor: "#c8bba2",
					highlightFill: "#c8bba2",
					highlightStroke: "#c8bba2",
					data: [210, 140, 90, 140, 210, 325, 90, 140, 125, 115, 50, 75]
				}
			]
		};
		
		var data2 = {
			labels : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [
				{
					label: "",
					fillColor: "#364b6a",
					strokeColor: "#364b6a",
					highlightFill: "#364b6a",
					highlightStroke: "#364b6a",
					data: [260, 310, 210, 260, 210, 310, 260, 210, 260, 175, 200, 260]
				},
				{
					label: "",
					fillColor: "#c8bba2",
					strokeColor: "#c8bba2",
					highlightFill: "#c8bba2",
					highlightStroke: "#c8bba2",
					data: [230, 240, 140, 190, 175, 260, 210, 140, 210, 150, 175, 210]
				}
			]
		};
		
		var bar_chart_options = { 
			responsive: true,
			showTooltips: false,
			barShowStroke: true,
			barStrokeWidth: 1,
			barValueSpacing: 25,
			barDatasetSpacing: 10
		}
		
		if ($(window).width() < 767) {
			
			var bar_chart_options = { 
				responsive: true,
				showTooltips: false,
				barShowStroke: true,
				barStrokeWidth: 1,
				barValueSpacing: 8,
				barDatasetSpacing: 3
			}
			
		}

		if ($("#bar-chart-1").length > 0) {
		
			var bar_chart_1  = new Chart(document.getElementById("bar-chart-1").getContext("2d")).Bar(data1, bar_chart_options);
		
		}
		
		var bar_chart_2;
		
		if ($("#bar-chart-1").length > 0) {
		
			$("#tab-1").on('shown.bs.tab', function (e) {
				bar_chart_2.destroy();
				bar_chart_1 = new Chart(document.getElementById("bar-chart-1").getContext("2d")).Bar(data1, bar_chart_options);
			});
		
		}
		
		if ($("#bar-chart-2").length > 0) {

			$("#tab-2").on('shown.bs.tab', function (e) {
				bar_chart_1.destroy();
				bar_chart_2 = new Chart(document.getElementById("bar-chart-2").getContext("2d")).Bar(data2, bar_chart_options);
			});
		
		}
		
	}
	
	
	// LOAD MORE PROJECTS //
	function load_more_projects() {
	
		var number_clicks = 0;
		
		$(".load-more").on("click", function(e) {
			
			e.preventDefault();
			
			if (number_clicks == 0) {
				$.ajax({
					type: "POST",
					url: $(".load-more").attr("href"),
					dataType: "html",
					cache: false,
					msg : '',
					success: function(msg) {
						$(".isotope").append(msg);	
						$(".isotope").imagesLoaded(function() {
							$(".isotope").isotope("reloadItems").isotope();
							$(".fancybox").fancybox({
								prevEffect: 'none',
								nextEffect: 'none'
							});
						});
						number_clicks++;
						$(".load-more").html("Nothing to load");
					}
				});
			}
			
		});
		
	}
	
	
	// SHOW/HIDE SCROLL UP //
	function show_hide_scroll_top() {
		
		if ($(window).scrollTop() > $(window).height()/2) {
			$("#scroll-up").fadeIn(300);
		} else {
			$("#scroll-up").fadeOut(300);
		}
		
	}
	
	
	// SCROLL UP //
	function scroll_up() {				
		
		$("#scroll-up").on("click", function() {
			$("html, body").animate({
				scrollTop: 0
			}, 800);
			return false;
		});
		
	}
	
	
	// INSTAGRAM FEED //
	function instagram_feed() {

		if ($('#instafeed').length > 0 ) {
		
			var nr = $('#instafeed').data('number');
			var userid = $('#instafeed').data('user');
			var accesstoken = $('#instafeed').data('accesstoken');
			
			var feed = new Instafeed({
				target: 'instafeed',
				get: 'user',
				userId: userid,
				accessToken: accesstoken,
				limit: nr,
				resolution: 'thumbnail',
				sortBy: "most-recent"
			});
			
			feed.run();		
		
		}
			
	}
	
	
	// FULL SCREEN //
	function full_screen() {

		if ($(window).width() > 767) {
			$(".full-screen").css("height", $(window).height() + "px");
		} else {
			$(".full-screen").css("height", "auto");
		}

	}
	
	
	// ANIMATIONS //
	function animations() {
		
		animations = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 100,
			mobile: false,
			live: true
		});
		
		animations.init();
		
	}
	
	
	// IMAGES BOXES //
	function images_boxes() {
		
		$(".image-box-content").append('<a class="close-image-box-content" href="#">x</a>');
		
		$(".image-box > h6").on("click", function() {
			$(this).fadeOut(300).next(".image-box-content").addClass("slideup");
		});
			
		$(".close-image-box-content").on("click", function(e) {
			e.preventDefault();
			$(this).parents("div").removeClass("slideup");
			$(this).parents("div").prev("h6").fadeIn(300);
		});
		
	}
	
	// DOCUMENT READY //
	$(document).ready(function(){
		
		// STICKY //
		sticky();
		
		
		// MENU //
		if (typeof $.fn.superfish !== 'undefined') {
			
			$(".menu").superfish({
				delay: 500,
				animation: {
					opacity: 'show',
					height: 'show'
				},
				speed: 'fast',
				autoArrows: true
			});
			
		}
		
		
		// SHOW/HIDE MOBILE MENU //
		show_hide_mobile_menu();
		
		
		// MOBILE MENU //
		mobile_menu();
		
		
		// FANCYBOX //
		if (typeof $.fn.fancybox !== 'undefined') {
		
			$(".fancybox").fancybox({
				prevEffect: 'none',
				nextEffect: 'none'
			});
		
		}
		
		// REVOLUTION SLIDER //
		if (typeof $.fn.revolution !== 'undefined') {
			
			$(".rev_slider").revolution({
				sliderType: "standard",
				sliderLayout: "auto",
				delay: 9000,
				navigation: {
					arrows:{
						style: "custom",
						enable: true,
						hide_onmobile: true,
						hide_onleave: false,
						hide_delay: 200,
						hide_delay_mobile: 1200,
						hide_under: 0,
						hide_over: 9999,
						tmp: '',
						left: {
							h_align: "left",
							v_align: "center",
							h_offset: 20,
							v_offset: 0
						 },
						 right: {
							h_align: "right",
							v_align: "center",
							h_offset: 20,
							v_offset: 0
						 }
					},
					bullets:{
						style: "custom",
						enable: true,
						hide_onmobile: false,
						hide_onleave: false,
						hide_delay: 200,
						hide_delay_mobile: 1200,
						hide_under: 0,
						hide_over: 9999,
						tmp: '', 
						direction: "horizontal",
						space: 10,       
						h_align: "center",
						v_align: "bottom",
						h_offset: 0,
						v_offset: 80
					},
					touch:{
						touchenabled: "on",
						swipe_treshold: 75,
						swipe_min_touches: 1,
						drag_block_vertical: false,
						swipe_direction: "horizontal"
					}
				},			
				gridwidth: 1170,
				gridheight: 680		
			});
			
		}
	
	
		// OWL Carousel //
		if (typeof $.fn.owlCarousel !== 'undefined') {
			
			// IMAGES SLIDER //
			$(".owl-carousel.images-slider").owlCarousel({
				items: 1,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				smartSpeed: 1200,
				loop: true,
				nav: true,
				navText: false,
				dots: true,
				mouseDrag: true,
				touchDrag: true,
				animateIn: 'fadeIn',
				animateOut: 'fadeOut'
			});
			
			
			$(".owl-carousel.images-slider-2").owlCarousel({
				items: 1,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				smartSpeed: 1200,
				loop: true,
				nav: false,
				navText: false,
				dots: true,
				mouseDrag: true,
				touchDrag: true,
				animateIn: 'fadeIn',
				animateOut: 'fadeOut'
			});
			
			
			// TESTIMONIALS SLIDER //
			$(".owl-carousel.testimonials-slider").owlCarousel({
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				smartSpeed: 1200,
				loop: true,
				nav: true,
				navText: false,
				dots: true,
				mouseDrag: true,
				touchDrag: true,
				responsive: {
					0:{
						items: 1
					},
					768:{
						items: 2
					}
				},
				margin: 30
			});

			// TEEM MANEGMENT SLIDER //
			$(".owl-carousel.team-slider").owlCarousel({
				item:3,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: false,
				smartSpeed: 1200,
				loop: true,
				nav: true,
				navText: false,
				dots: false,
				mouseDrag: true,
				touchDrag: true,
				responsive: {
					0:{
						items: 1
					},
					768:{
						items: 3
					}
				},
				margin: 30
			});
			
			
			// TEXT BOXES SLIDER //
			$(".owl-carousel.text-boxes-slider").owlCarousel({
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				smartSpeed: 1200,
				loop: true,
				nav: true,
				navText: false,
				dots: true,
				mouseDrag: true,
				touchDrag: true,
				responsive: {
					0:{
						items: 1
					},
					768:{
						items: 2
					},
					992:{
						items: 3
					}
				},
				margin: 30
			});
			
			
			// LOGOS SLIDER //
			var logos_slider = $(".owl-carousel.logos-slider").owlCarousel({
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				loop: true,
				nav: false,
				smartSpeed: 1200,
				navText: false,
				dots: false,
				mouseDrag: true,
				touchDrag: true,
				responsive: {
					0:{
						items: 1
					},
					480:{
						items: 2
					},
					768:{
						items: 3
					},
					992:{
						items: 4
					},
					1200:{
						items: 5
					}
				}
			});
			
			$('.logos-slider-navigation .prev').click(function() {
				logos_slider.trigger('prev.owl.carousel');
			});
			
			$('.logos-slider-navigation .next').click(function() {
				logos_slider.trigger('next.owl.carousel');
			});
		
		}
		
		
		// GOOGLE MAPS //
		if (typeof $.fn.gmap3 !== 'undefined') {
		
			$(".map").each(function() {
				
				var data_zoom = 15,
					data_height;
				
				if ($(this).attr("data-zoom") !== undefined) {
					data_zoom = parseInt($(this).attr("data-zoom"),10);
				}	
				
				if ($(this).attr("data-height") !== undefined) {
					data_height = parseInt($(this).attr("data-height"),10);
				}	
				
				$(this).gmap3({
					marker: {
						values: [{
							address: $(this).attr("data-address"),
							data: $(this).attr("data-address-details")
						}],
						options:{
							draggable: false
						},
						events:{
							mouseover: function(marker, event, context){
								var map = $(this).gmap3("get"),
								infowindow = $(this).gmap3({get:{name:"infowindow"}});
								if (infowindow){
									infowindow.open(map, marker);
									infowindow.setContent(context.data);
								} else {
									$(this).gmap3({
										infowindow:{
											anchor:marker, 
											options:{content: context.data}
										}
									});
								}
							},
							mouseout: function(){
								var infowindow = $(this).gmap3({get:{name:"infowindow"}});
								if (infowindow){
									infowindow.close();
								}
							}
						}
					},
					map: {
						options: {
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							zoom: data_zoom,
							scrollwheel: false
						}
					}
				});
				
				$(this).css("height", data_height + "px");
				
			});
			
		}
		
		// PROGRESS BARS //
		progress_bars();
		
		
		// PIE CHARTS //
		pie_chart();
		
		
		// COUNTER //
		counter();
		
		
		// STATISTICS //
		statistics();
		statistics_tab();
		
		
		// ISOTOPE //
		if ((typeof $.fn.imagesLoaded !== 'undefined') && (typeof $.fn.isotope !== 'undefined')) {
		
			$(".isotope").imagesLoaded( function() {
				
				var container = $(".isotope");
				
				container.isotope({
					itemSelector: '.isotope-item',
					layoutMode: 'masonry',
					transitionDuration: '0.8s'
				});
				
				$(".filter li a").on("click", function() {
					$(".filter li a").removeClass("active");
					$(this).addClass("active");
		
					var selector = $(this).attr("data-filter");
					container.isotope({
						filter: selector
					});
		
					return false;
				});
		
				$(window).resize(function() {
					container.isotope();
				});
				
			});
			
		}
		
		
		// LOAD MORE PORTFOLIO ITEMS //
		load_more_projects();
		
		
		// PLACEHOLDER //
		if (typeof $.fn.placeholder !== 'undefined') {
			
			$("input, textarea").placeholder();
			
		}
		
		
		// CONTACT FORM VALIDATE & SUBMIT //
		// VALIDATE //
		if (typeof $.fn.validate !== 'undefined') {
		
			$("#contact-form").validate({
				rules: {
					name: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					subject: {
						required: true
					},
					phone: {
						minlength: 10,
						number: true
					},
					message: {
						required: true,
						minlength: 3
					}
				},
				messages: {
					name: {
						required: "Please enter your name!"
					},
					email: {
						required: "Please enter your email!",
						email: "Please enter a valid email address"
					},
					subject: {
						required: "Please enter the subject!"
					},
					message: {
						required: "Please enter your message!"
					}
				},
					
				// SUBMIT //
				submitHandler: function(form) {
					var result;
					$(form).ajaxSubmit({
						type: "POST",
						data: $(form).serialize(),
						url: "assets/php/send.php",
						success: function(msg) {
							
							if (msg == 'OK') {
								result = '<div class="alert alert-success">Your message was successfully sent!</div>';
								$("#contact-form").clearForm();
							} else {
								result = msg;
							}
							
							$("#alert-area").html(result);
		
						},
						error: function() {
		
							result = '<div class="alert alert-danger">There was an error sending the message!</div>';
							$("#alert-area").html(result);
		
						}
					});
				}
			});
			
		}
		
		
		// PARALLAX //
		if (typeof $.fn.stellar !== 'undefined') {
		
			if (!is_touch_device()) {
				
				$(window).stellar({
					horizontalScrolling: false,
					verticalScrolling: true,
					responsive: true
				});
				
			}
		
		}
		
		
		// SHOW/HIDE SCROLL UP
		show_hide_scroll_top();
		
		
		// SCROLL UP //
		scroll_up();
		
		
		// YOUTUBE PLAYER //
		if (typeof $.fn.mb_YTPlayer !== 'undefined') {
			
			$(".youtube-player").mb_YTPlayer();
		
		}
		
		
		// INSTAGRAM FEED //
		instagram_feed();
		
		
		// COUNTDOWN //
		if (typeof $.fn.countdown !== 'undefined') {
			
			$(".countdown").countdown('2017/12/31 00:00', function(event) {
				$(this).html(event.strftime(
					'<div><div class="count">%-D</div> <span>Days</span></div>' +
					'<div><div class="count">%-H</div> <span>Hours</span></div>' +
					'<div><div class="count">%-M</div> <span>Minutes</span></div>' +
					'<div><div class="count">%S</div> <span>Seconds</span></div>'
				));
			});
		
		}
		
		
		// FULL SCREEN //
		full_screen();
		
		
		// ANIMATIONS //
		animations();
		
		
		// IMAGES BOXES //
		images_boxes();
		
	});

	
	// WINDOW SCROLL //
	$(window).scroll(function() {
		
		progress_bars();
		pie_chart();
		counter();
		statistics();
		show_hide_scroll_top();
		
	});
	
	
	// WINDOW RESIZE //
	$(window).resize(function() {

		mobile_menu();
		full_screen();
		
	});
	
})(window.jQuery);