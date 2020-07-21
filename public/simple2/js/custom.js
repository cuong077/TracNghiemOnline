/*global jQuery:false */

function updateAnswerMargins() {
    var list = $('.pricing-box-item').find('input[type="checkbox"]');
    list.each(function() {
        var cover_height = $(this).closest('td').find('p').height();
        var checkbox_height = $(this).height();
        var margin_unit = (cover_height - checkbox_height) / 2;
        try{
        var option_value = $(this).closest('td').find('label').attr('for').substr(-1);
}catch(e){}
        $(this).closest('td').find('label').before().css('margin-top', margin_unit);
        $(this).closest('td').find('label').before().attr('data-content','\xa0 ' + option_value);
        $(this).closest('td').find('label').find('p').css('margin-top', -1.2 * margin_unit / 2);
        var answer_option = $(this).closest('td').find('label').find('p').html();
        if (answer_option !== undefined) {
            if (answer_option.charAt(1) == ":" || answer_option.charAt(1) == ".") {
                var answer_non_index = answer_option.substring(2);
                $(this).closest('td').find('label').find('p').html('&nbsp;' + answer_non_index);
            }
        }
    });

}

function updateAnswerRows() {
    var list = $('.pricing-box-item').find('table.table');
    list.each(function() {
        //Merge rows
        var above_row = $(this).find('.qItem-Answer-Above');
        var below_row = $(this).find('.qItem-Answer-Below');

        var left_above_row = above_row.find('.td-left').width();
        var content_left_above_row = above_row.find('.td-left').find('.checkbox').width();
        var right_above_row = above_row.find('.td-right').width();
        var content_right_above_row = above_row.find('.td-right').find('.checkbox').width();
        var left_below_row = below_row.find('.td-left').width();
        var content_left_below_row = below_row.find('.td-left').find('.checkbox').width();
        var right_below_row = below_row.find('.td-right').width();
        var content_right_below_row = below_row.find('.td-right').find('.checkbox').width();

        if (left_above_row > (content_left_above_row + 20) * 2 &&
            right_above_row > (content_right_above_row + 20) * 2 &&
            left_below_row > (content_left_below_row + 20) * 2 &&
            right_below_row > (content_right_below_row + 20) * 2
        ) {
            above_row.append(below_row.children()).removeClass('.qItem-Answer-Above').addClass('.qItem-Answer');
            below_row.remove();
        }
    });
}

$(window).bind("resize",function() {
    updateAnswerMargins();
    $(window).resize(updateAnswerMargins);
});

jQuery(document).ready(function($) {
"use strict";

    updateAnswerMargins();
    //add some elements with animate effect

    $(".big-cta").hover(
        function () {
        $('.cta a').addClass("animated shake");
        },
        function () {
        $('.cta a').removeClass("animated shake");
        }
    );
    $(".box").hover(
        function () {
        $(this).find('.icon').addClass("animated fadeInDown");
        $(this).find('p').addClass("animated fadeInUp");
        },
        function () {
        $(this).find('.icon').removeClass("animated fadeInDown");
        $(this).find('p').removeClass("animated fadeInUp");
        }
    );


    $('.accordion').on('show', function (e) {

        $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
        $(e.target).prev('.accordion-heading').find('.accordion-toggle i').removeClass('icon-plus');
        $(e.target).prev('.accordion-heading').find('.accordion-toggle i').addClass('icon-minus');
    });

    $('.accordion').on('hide', function (e) {
        $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
        $(this).find('.accordion-toggle i').not($(e.target)).removeClass('icon-minus');
        $(this).find('.accordion-toggle i').not($(e.target)).addClass('icon-plus');
    });


    // tooltip
    $('.social-network li a, .options_box .color a').tooltip();

    // fancybox
    $(".fancybox").fancybox({
            padding : 0,
            autoResize: true,
            beforeShow: function () {
                this.title = $(this.element).attr('title');
                this.title = '<h4>' + this.title + '</h4>' + '<p>' + $(this.element).parent().find('img').attr('alt') + '</p>';
            },
            helpers : {
                title : { type: 'inside' },
            }
        });


    //scroll to top
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
            } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
            return false;
    });
    $('#post-slider').flexslider({
        // Primary Controls
        controlNav          : false,              //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        directionNav        : true,              //Boolean: Create navigation for previous/next navigation? (true/false)
        prevText            : "Previous",        //String: Set the text for the "previous" directionNav item
        nextText            : "Next",            //String: Set the text for the "next" directionNav item
         
        // Secondary Navigation
        keyboard            : true,              //Boolean: Allow slider navigating via keyboard left/right keys
        multipleKeyboard    : false,             //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
        mousewheel          : false,             //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
        pausePlay           : false,             //Boolean: Create pause/play dynamic element
        pauseText           : 'Pause',           //String: Set the text for the "pause" pausePlay item
        playText            : 'Play',            //String: Set the text for the "play" pausePlay item
         
        // Special properties
        controlsContainer   : "",                //{UPDATED} Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be ".flexslider-container". Property is ignored if given element is not found.
        manualControls      : "",                //Selector: Declare custom control navigation. Examples would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
        sync                : "",                //{NEW} Selector: Mirror the actions performed on this slider with another slider. Use with care.
        asNavFor            : "",                //{NEW} Selector: Internal property exposed for turning the slider into a thumbnail navigation for another slider
    });
	
    $('#main-slider').flexslider({
        namespace           : "flex-",           //{NEW} String: Prefix string attached to the class of every element generated by the plugin
        selector            : ".slides > li",    //{NEW} Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
        animation           : "fade",            //String: Select your animation type, "fade" or "slide"
        easing              : "swing",           //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
        direction           : "horizontal",      //String: Select the sliding direction, "horizontal" or "vertical"
        reverse             : false,             //{NEW} Boolean: Reverse the animation direction
        animationLoop       : true,              //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        smoothHeight        : false,             //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
        startAt             : 0,                 //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        slideshow           : true,              //Boolean: Animate slider automatically
        slideshowSpeed      : 7000,              //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationSpeed      : 600,               //Integer: Set the speed of animations, in milliseconds
        initDelay           : 0,                 //{NEW} Integer: Set an initialization delay, in milliseconds
        randomize           : false,             //Boolean: Randomize slide order
         
        // Usability features
        pauseOnAction       : true,              //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover        : false,             //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
        useCSS              : true,              //{NEW} Boolean: Slider will use CSS3 transitions if available
        touch               : true,              //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
        video               : false,             //{NEW} Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches
         
        // Primary Controls
        controlNav          : true,              //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        directionNav        : true,              //Boolean: Create navigation for previous/next navigation? (true/false)
        prevText            : "Previous",        //String: Set the text for the "previous" directionNav item
        nextText            : "Next",            //String: Set the text for the "next" directionNav item
         
        // Secondary Navigation
        keyboard            : true,              //Boolean: Allow slider navigating via keyboard left/right keys
        multipleKeyboard    : false,             //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
        mousewheel          : false,             //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
        pausePlay           : false,             //Boolean: Create pause/play dynamic element
        pauseText           : 'Pause',           //String: Set the text for the "pause" pausePlay item
        playText            : 'Play',            //String: Set the text for the "play" pausePlay item
         
        // Special properties
        controlsContainer   : "",                //{UPDATED} Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be ".flexslider-container". Property is ignored if given element is not found.
        manualControls      : "",                //Selector: Declare custom control navigation. Examples would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
        sync                : "",                //{NEW} Selector: Mirror the actions performed on this slider with another slider. Use with care.
        asNavFor            : "",                //{NEW} Selector: Internal property exposed for turning the slider into a thumbnail navigation for another slider
    });

    updateAnswerRows();

    $('#media').carousel({
        pause: true,
        interval: false,
    });

    $('[data-toggle="tooltip"]').tooltip();


    window.takeScreenShot = function() {
        html2canvas(document.getElementById("target"), {
            onrendered: function (canvas) {
                document.body.appendChild(canvas);
            }
        });
    }

});

jQuery("document").ready(function($){

    var nav = $('.menu-wrapper');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 136) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });

});
