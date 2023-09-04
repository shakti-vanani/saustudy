//LOADER
$(window).on("load", function() {
    "use strict";
    $(".loader").fadeOut(800);

});

jQuery(function($) {
    "use strict";

    // ************ Back to Top
    var amountScrolled = 700;
    var backBtn = $("a.scrollToTop");
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > amountScrolled) {
            backBtn.fadeIn("slow");
        } else {
            backBtn.fadeOut("slow");
        }
    });
    backBtn.on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    // Push Menus 
    var $menuLeft = $(".pushmenu-left");
    var $menuRight = $(".pushmenu-right");
    var $toggleleft = $("#menu_bars.left");
    var $toggleright = $("#menu_bars.right");
    $toggleleft.on("click", function() {
        $(this).toggleClass("active");
        $(".pushmenu-push").toggleClass("pushmenu-push-toright");
        $menuLeft.toggleClass("pushmenu-open");
        return false;
    });
    $toggleright.on("click", function() {
        $(this).toggleClass("active");
        $(".pushmenu-push").toggleClass("pushmenu-push-toleft");
        $menuRight.toggleClass("pushmenu-open");
        return false;
    });

    //push DropDowns 
    var side_drop = $('.push_nav .dropdown');
    side_drop.on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });
    side_drop.on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });

    // ************ Accordions 
    $(".items > li:first-child .sub-items").fadeIn();
    $(".items > li:first-child >").addClass("expanded");
    $(".items > li > a").on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        if ($this.hasClass("expanded")) {
            $this.removeClass("expanded");
        } else {
            $(".items a.expanded").removeClass("expanded");
            $this.addClass("expanded");
            $(".sub-items").filter(":visible").slideUp("normal");
        }
        $this.parent().children("ul").stop(true, true).slideToggle("normal");
    });

    // ************ Search On Click
    
        $(".search_btn").on("click", function(event) {
            event.preventDefault();
            $("#search").addClass("open");
            $("#search > form > input[type='search']").focus();
        });

        $("#search, #search button.close").on("click keyup", function(event) {
            if (event.target == this || event.target.className == "close" || event.keyCode == 27) {
                $(this).removeClass("open");
            }
        });
    

    // ************ tabbed content 
    $(".tab_content").hide();
    $(".tab_content:first").show();
    /* tab mode */
    $("ul.tabs li").on('click', function() {
        $(".tab_content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");
        $(".tab_drawer_heading").removeClass("d_active");
        $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

    });
    /*drawer mode on Mobile Version*/
    $(".tab_drawer_heading").on("click", function() {
        $(".tab_content").hide();
        var d_activeTab = $(this).attr("rel");
        $("#" + d_activeTab).fadeIn(1200);
        $(".tab_drawer_heading").removeClass("d_active");
        $(this).addClass("d_active");
        $("ul.tabs li").removeClass("active");
        $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
    });

    //contact form
    $("#btn_submit").on("click", function(){
        //get input field values
        var user_name = $('input[name=name]').val();
        var user_email = $('input[name=email]').val();
        var user_website = $('input[name=website]').val();
        var user_message = $('textarea[name=message]').val();
        var post_data, output;
        //simple validation at client's end
        var proceed = true;
        if (user_name == "") {
            proceed = false;
        }
        if (user_email == "") {
            proceed = false;
        }
        if (user_message == "") {
            proceed = false;
        }

        //everything looks good! proceed...
        if (proceed) {
            //alert(proceed);
            //data to be sent to server
            post_data = {
                'userName': user_name,
                'userEmail': user_email,
                'userWebsite': user_website,
                'userMessage': user_message
            };

            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response) {

                //load json data from server and output message     
                if (response.type == 'error') {
                    output = '<div class="alert-danger" style="padding:10px; margin-bottom:10px;">' + response.text + '</div>';
                } else {
                    output = '<div class="alert-success" style="padding:10px; margin-bottom:10px;">' + response.text + '</div>';

                    //reset values in all input fields
                    $('.form-inline input').val('');
                    $('.form-inline textarea').val('');
                    $('#btn_submit').val('Submit');
                }

                $("#result").hide().html(output).slideDown();
            }, 'json');

        }
    });


    //reset previously set border colors and hide all message on .keyup()
    $(".form-inline input, .form-inline textarea").keyup(function() {
        $("#result").slideUp();
    });

    // ************ Fun Facts
    $(".number-counters").appear(function() {
        $(".number-counters [data-to]").each(function() {
            var e = $(this).attr("data-to");
            $(this).delay(6e3).countTo({
                from: 50,
                to: e,
                speed: 1e3,
                refreshInterval: 50
            })
        })
    });

    // ************Owl Carousel
    $("#news_slider, #director_slider, #course_slider").owlCarousel({
        autoPlay: false,
        items: 3,
        pagination: false,
        stopOnHover: true,
        navigationText: ["<i class='icon-chevron-thin-left'></i>", "<i class=' icon-chevron-thin-right'></i>"],
        navigation: true,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2],
		  //itemsTablet: [768,2],
		  itemsMobile : [479,1],

    });

    //Fading testimonial content
    $("#review_slider, #text_rotator").owlCarousel({
        autoPlay: 3000,
        navigation: false,
        slideSpeed: 300,
        singleItem: true,
        transitionStyle: "fade"
    });

    // ============= Revolution Slider =============
    var revapi;
    revapi = jQuery("#rev_slider").revolution({
        sliderType: "standard",
        sliderLayout: "fullwidth",
        scrollbarDrag: "true",
        delay: 9000,
        spinner: "off",
        navigation: {
            arrows: {
                enable: true
            },
            mouseScrollNavigation: "off",
            keyboardNavigation: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }

        },
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1170, 960, 750, 480],
        gridheight: [670, 600, 500, 390],
    });
	 
	 //Full Screen
	 revapi = jQuery("#rev_slider_full").revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        scrollbarDrag: "true",
        delay: 9000,
        spinner: "off",
        navigation: {
            arrows: {
                enable: true
            },
            mouseScrollNavigation: "off",
            keyboardNavigation: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }

        },
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1170, 960, 750, 480],
        gridheight: [670, 600, 500, 390],
    });
	 
	 
	 revapi = jQuery("#rev_slider_video").revolution({
        sliderType: "standard",
        sliderLayout: "fullwidth",
        scrollbarDrag: "true",
        delay: 9000,
        spinner: "off",
        navigation: {
            arrows: {
                enable: false
            },
            mouseScrollNavigation: "off",
            keyboardNavigation: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }

        },
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1170, 960, 767, 480],
        gridheight: [600, 550, 450, 320],
    });
	 
	 
	 
	 

    // ============= Parallax=============
    $(".page_header").parallax("50%", 0.3);
    $("#parallax").parallax("50%", 0.2);
    $("#counter").parallax("50%", 0.2);

    // ======= Cubeportfolio ======

    //Project Filter
    $("#projects").cubeportfolio({
        filters: "#project-filter",
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideDelay',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        displayTypeSpeed: 100,
    });

    //testimonial
    $('#js-grid-masonry').cubeportfolio({
        layoutMode: 'grid',
        gapHorizontal: 50,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 4
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],

    });

    // +++++ WOW Transitions
    if ($(window).width() > 767) {
        new WOW().init();
    }

    //Contact Map
    if ($("#map").length) {
        var map;
        map = new GMaps({
            el: '#map',
            lat: 51.507309,
            lng: -0.127448
        });
        map.drawOverlay({
            lat: map.getCenter().lat(),
            lng: map.getCenter().lng(),
            layer: 'overlayLayer',
            content: '<div class="overlay_map"><i class="icon-mapmarker"></i></div>',
            verticalAlign: 'top',
            horizontalAlign: 'center'
        });

    }

});