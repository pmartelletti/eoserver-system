(jQuery)(function($) {

    /* ================ MAIN NAVIGATION ================ */

    (function() {
        $(" #nav ul ").css({
            display: "none"
        }); // Opera Fix
        $(" #nav li").hover(function() {
            $(this).find('ul:first').css({
                visibility: "visible",
                display: "none"
            }).fadeIn(300);
        }, function() {
            $(this).find('ul:first').css({
                display: "none"
            });
        });
    })();
	
	//$('#nav li').has('ul').addClass('no-sub');
	//$("ul > li > ul").addClass("hide-submenu");
	$("#nav ul > li").addClass("no-sub");
	$("#nav ul > li.current-menu-item").removeClass("no-sub");
   // $("#nav ul > li ul").removeClass("no-sub");
	$('#nav li').has('ul').removeClass("no-sub").addClass("sub");
 

  


    /* ================ CONTENT TABS ================ */
    (function() {
        $('.tabs').each(function() {
            var $tabLis = $(this).find('li');
            var $tabContent = $(this).next('.tab-content-wrap').find('.tab-content');

            $tabContent.hide();
            $tabLis.first().addClass('active').show();
            $tabContent.first().show();
        });

        $('.tabs').on('click', 'li', function(e) {
            var $this = $(this);
            var parentUL = $this.parent();
            var tabContent = parentUL.next('.tab-content-wrap');

            parentUL.children().removeClass('active');
            $this.addClass('active');

            tabContent.find('.tab-content').hide();
            var showById = $($this.find('a').attr('href'));
            tabContent.find(showById).fadeIn();

            e.preventDefault();
        });
    })();

    /* ================ ACCORDION ================ */

    (function() {
        'use strict';
        $('.accordion').on('click', '.title', function(event) {
            event.preventDefault();
            $(this).siblings('.accordion .active').next().slideUp('normal');
            $(this).siblings('.accordion .title').removeClass("active");

            if ($(this).next().is(':hidden') === true) {
                $(this).next().slideDown('normal');
                $(this).addClass("active");
            }
        });
        $('.accordion .content').hide();
        $('.accordion .active').next().slideDown('normal');
    })();

    (function() {

        /* ================ INFORMATION BOXES ================ */
        $('.information-boxes .close').on('click', function() {
            $(this).parent().slideUp(300);
        });

        /* ================ PLACEHOLDER PLUGIN ================ */
        $('input[placeholder], textarea[placeholder]').placeholder();
    })();

    /* ================ SCROLL TO TOP ================ */

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });

        $('.scroll-up').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });



    // function to check is user is on touch device
    if (!is_touch_device()) {
        // ANIMATION FOR CONTENT
        $.stellar();

        /* ================ ANIMATED CONTENT ================ */
        if ($(".animated")[0]) {
            jQuery('.animated').css('opacity', '0');
        }

        $('.triggerAnimation').waypoint(function() {
            var animation = $(this).attr('data-animate');
            $(this).css('opacity', '');
            $(this).addClass("animated " + animation);

        },
                {
                    offset: '80%',
                    triggerOnce: true
                }
        );

    }

    // function to check is user is on touch device
    function is_touch_device() {
        return 'ontouchstart' in window // works on most browsers 
                || 'onmsgesturechange' in window; // works on ie10
    }

});

 jQuery(document).ready(function($) {
                'use strict';

                $('.numbers-counter').waypoint(function() {
                    // NUMBERS COUNTER START
                    $('.numbers').data('countToOptions', {
                        formatter: function(value, options) {
                            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                        }
                    });
                    // start timer
                    $('.timer').each(count);

                    function count(options) {
                        var $this = $(this);
                        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                        $this.countTo(options);
                    } // NUMBERS COUNTER END
                },
                        {offset: '70%'}
                );

              //PORTFOLIO CAROUSEL
                //	Responsive layout, resizing the items
                $('#portfolio-carousel').carouFredSel({
                    responsive: true,
                    width: '100%',
                    height: '100%',
                    auto: false,
                    scroll: 1,
                    prev: '.c_prev_2',
                    next: '.c_next_2',
                    items: {
                        width: 400,
                        height: '100%',
                        visible: {
                            min: 1,
                            max: 4
                        }
                    }

                });
        

                
                //  Testimonial carousel Responsive layout, resizing the items
                $('#services-carousel').carouFredSel({
                    responsive: true,
                    width: '100%',
                    auto: false,
                    scroll: 1,
                    prev: '.c_prev',
                    next: '.c_next',
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    items: {
                        width: 370,
                        height: 'auto',
                        visible: {
                            min: 1,
                            max: 3
                        }
                    }
                });

               


            });
			
			jQuery(document).ready(function($) {
                'use strict';

                /* ================ PINTEREST FEED ================ */
                $('.pinterest-feed').socialstream({
                    socialnetwork: 'pinterest',
                    limit: 15,
                    username: 'vmrkela'
                });

                /* ================ DEVIANT ART FEED ================ */
                $('.deviant-feed').socialstream({
                    socialnetwork: 'deviantart',
                    limit: 15,
                    username: 'mrky-cro'
                });

                /* ================ FLICKR FEED ================ */
                $('.flickr-feed').socialstream({
                    socialnetwork: 'flickr',
                    limit: 15,
                    username: 'Mrky1'
                });

                /* ================ DRIBBBLE FEED ================ */
                $('.dribbble-feed').socialstream({
                    socialnetwork: 'dribbble',
                    limit: 15,
                    username: 'envato'
                });

                /* ================ YOUTUBE FEED ================ */
                $('.youtube-feed').socialstream({
                    socialnetwork: 'youtube',
                    limit: 15,
                    username: 'Envato'
                });

                /* ================ NEWSFEED ================ */
                $('.newsfeed').socialstream({
                    socialnetwork: 'newsfeed',
                    limit: 15,
                    username: ' http://feeds.feedburner.com/webdesignerdepot?format=xml'
                });

                /* ================ INSTAGRAM FEED ================ */
                $('.instagram-feed').socialstream({
                    socialnetwork: 'flickr',
                    limit: 15,
                    username: 'Mrky1',
                    overlay: true
                });

                /* ================ PICASA FEED ================ */
                $('.picasa-feed').socialstream({
                    socialnetwork: 'picasa',
                    limit: 15,
                    username: 'vmrkela1@gmail.com'
                });

            });

 jQuery(document).ready(function($) {
                'use strict';        
				
				// GOOGLE MAPS START
                $(function() {
                    //google maps

                    var yourStartLatLng = new google.maps.LatLng(40.74843, -73.985655);
                    $('.map_canvas').gmap({'center': yourStartLatLng, 'zoom': 13, 'disableDefaultUI': true, 'callback': function() {
                            var self = this;
                            self.addMarker({'position': this.get('map').getCenter()});
                        }});
                }); // GOOGLE MAPS END
				//NIVO SLIDER
                $('#post-slider').nivoSlider();
				//NIVO SLIDER
                $('#slider').nivoSlider();
				
				$('.skills-bar').waypoint(function() {
                    $('.skills li span').addClass('expand');
                },
                        {offset: '70%'}
                );

                // Easy Pie Chart plugin - skills
                var chartSize = '110';

                $('.load-skills').waypoint(function() {
                    $('.easy-pie-chart').easyPieChart({
                        animate: 1000,
                        scaleColor: false,
                        lineWidth: 3,
                        lineCap: 'square',
                        size: chartSize,
                        trackColor: '#e5e5e5',
                        barColor: '#727c89'
                    });
                },
                        {offset: '60%'}
                );

                // PRETTYPHOTO LIGHTBOX START
                if (jQuery().prettyPhoto) {
                    piPrettyphoto();
                }

                function piPrettyphoto() {
                    $("a[data-gal^='prettyPhoto']").prettyPhoto({social_tools: false});
                }// PRETTYPHOTO LIGHTBOX END

                
                // FLICKR FEED SIDEBAR
                $('.flickr-feeds').socialstream({
                    socialnetwork: 'flickr',
                    limit: 8,
                    username: 'pixel-industry'
                }); // FLICKR FEED END
               
                
                //  Responsive layout, resizing the items
                $('#testimonial-carousel').carouFredSel({
                    responsive: true,
                    width: '100%',
                    auto: true,
                    scroll: 1,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    items: {
                        width: '770',
                        height: 'variable',
                        visible: {
                            min: 1,
                            max: 1
                        }
                    }
                });

                //  Responsive layout, resizing the items
                $('#testimonial-carousel-2').carouFredSel({
                    responsive: true,
                    width: '100%',
                    auto: true,
                    scroll: 1,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    items: {
                        width: '370',
                        height: 'variable',
                        visible: {
                            min: 1,
                            max: 1
                        }
                    }
                });

                //  Responsive layout, resizing the items
                $('#testimonial-carousel-3').carouFredSel({
                    responsive: true,
                    width: '100%',
                    auto: true,
                    scroll: 1,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    prev: '.c_prev',
                    next: '.c_next',
                    items: {
                        width: '1170',
                        height: 'variable',
                        visible: {
                            min: 1,
                            max: 1
                        }
                    }
                });
                
                 //  Responsive layout, resizing the items
                $('#testimonial-carousel-4').carouFredSel({
                    responsive: true,
                    width: '100%',
                    auto: true,
                    scroll: 1,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    prev: '.c_prev_2',
                    next: '.c_next_2',
                    items: {
                        width: '1170',
                        height: 'variable',
                        visible: {
                            min: 1,
                            max: 1
                        }
                    }
                });
				
				$('#client-carousel').carouFredSel({
                    responsive: true,
                    width: '100%',
                    height: '100%',
                    auto: false,
                    scroll: 1,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    prev: '.c_prev',
                    next: '.c_next',
                    items: {
                        width: 170,
                        height: '100%',
                        visible: {
                            min: 1,
                            max: 6
                        }
                    }
                });

            });
			
			
			
