/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Home Slider
5. Init SVG
 6. Init Qty
 7. Init Isotope
 8. Init Product Slider


******************************/

$(document).ready(function()
{
	"use strict";

	/*

	1. Vars and Inits

	*/

	var header = $('.header');

	initMenu();
	initHomeSlider();
	initSvg();
    initQty();
    initIsotope();
    initProductSlider();

    setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	/*

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 91)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/*

	3. Init Menu

	*/

	function initMenu()
	{
		if($('.menu').length)
		{
			var hamburger = $('.hamburger');
			var header = $('.header');
			var superContainerInner = $('.super_container_inner');
			var superOverlay = $('.super_overlay');
			var headerOverlay = $('.header_overlay');
			var menu = $('.menu');
			var isActive = false;

			hamburger.on('click', function()
			{
				superContainerInner.toggleClass('active');
				menu.toggleClass('active');
				header.toggleClass('active');
				isActive = true;
			});

			superOverlay.on('click', function()
			{
				if(isActive)
				{
					superContainerInner.toggleClass('active');
					menu.toggleClass('active');
					header.toggleClass('active');
					isActive = false;
				}
			});

			headerOverlay.on('click', function()
			{
				if(isActive)
				{
					superContainerInner.toggleClass('active');
					menu.toggleClass('active');
					header.toggleClass('active');
					isActive = false;
				}
			});
		}
	}

	/*

	4. Init Home Slider

	*/

	function initHomeSlider()
	{
		if($('.home_slider').length)
		{
			var homeSlider = $('.home_slider');
			homeSlider.owlCarousel(
			{
				items:1,
				autoplay:false,
				loop:true,
				mouseDrag:true,
				smartSpeed:1200,
				nav:false,
				dots:false,
				responsive:
				{
					0:
					{
						mouseDrag:true
					},
					558:
					{
						mouseDrag:false
					}
				}
			});

			if($('.home_slider_nav_prev').length)
			{
				var prev = $('.home_slider_nav_prev');
				prev.on('click', function()
				{
					homeSlider.trigger('prev.owl.carousel');
				});
			}

			if($('.home_slider_nav_next').length)
			{
				var next = $('.home_slider_nav_next');
				next.on('click', function()
				{
					homeSlider.trigger('next.owl.carousel');
				});
			}

			/* Custom dots events */
			if($('.home_slider_custom_dot').length)
			{
				$('.home_slider_custom_dot').on('click', function()
				{
					$('.home_slider_custom_dot').removeClass('active');
					$(this).addClass('active');
					homeSlider.trigger('to.owl.carousel', [$(this).index(), 1200]);
				});
			}

			/* Change active class for dots when slide changes by nav or touch */
			homeSlider.on('changed.owl.carousel', function(event)
			{
				$('.home_slider_custom_dot').removeClass('active');
				$('.home_slider_custom_dots li').eq(event.page.index).addClass('active');
			});
		}
	}

	/*

	5. Init SVG

	*/

	function initSvg()
	{
		if($('img.svg').length)
		{
			jQuery('img.svg').each(function()
			{
				var $img = jQuery(this);
				var imgID = $img.attr('id');
				var imgClass = $img.attr('class');
				var imgURL = $img.attr('src');

				jQuery.get(imgURL, function(data)
				{
					// Get the SVG tag, ignore the rest
					var $svg = jQuery(data).find('svg');

					// Add replaced image's ID to the new SVG
					if(typeof imgID !== 'undefined') {
					$svg = $svg.attr('id', imgID);
					}
					// Add replaced image's classes to the new SVG
					if(typeof imgClass !== 'undefined') {
					$svg = $svg.attr('class', imgClass+' replaced-svg');
					}

					// Remove any invalid XML tags as per http://validator.w3.org
					$svg = $svg.removeAttr('xmlns:a');

					// Replace image with new SVG
					$img.replaceWith($svg);
				}, 'xml');
			});
		}
	}

    /*

    6. Init Qty

    */

    function initQty()
    {
        if($('.product_quantity').length)
        {
            var qtys = $('.product_quantity');

            qtys.each(function()
            {
                var qty = $(this);
                var sub = qty.find('.qty_sub');
                var add = qty.find('.qty_add');
                var num = qty.find('.product_num');
                var original;
                var newValue;

                sub.on('click', function()
                {
                    original = parseFloat(qty.find('.product_num').text());
                    if(original > 0)
                    {
                        newValue = original - 1;
                    }
                    num.text(newValue);
                });

                add.on('click', function()
                {
                    original = parseFloat(qty.find('.product_num').text());
                    newValue = original + 1;
                    num.text(newValue);
                });
            });
        }
    }

    /*

	7. Init Isotope

	*/

    function initIsotope()
    {
        var sortingButtons = $('.item_sorting_btn');

        if($('.grid').length)
        {
            var grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry:
                    {
                        horizontalOrder: true
                    },
                getSortData:
                    {
                        price: function(itemElement)
                        {
                            var priceEle = $(itemElement).find('.product_price').text().replace( '$', '' );
                            return parseFloat(priceEle);
                        },
                        name: '.product_name'
                    }
            });

            sortingButtons.each(function()
            {
                $(this).on('click', function()
                {
                    var parent = $(this).parent().parent().find('.isotope_sorting_text span');
                    parent.text($(this).text());
                    var option = $(this).attr('data-isotope-option');
                    option = JSON.parse( option );
                    grid.isotope( option );
                });
            });

            // Filtering
            $('.item_filter_btn').on('click', function()
            {
                var parent = $(this).parent().parent().find('.isotope_filter_text span');
                parent.text($(this).text());
                var filterValue = $(this).attr('data-filter');
                grid.isotope({ filter: filterValue });
            });
        }
    }


    /*

	8. Init Product Slider

	*/

    function initProductSlider()
    {
        var carousel = $('#carousel');
        var prev = $('.fs_prev');
        var next = $('.fs_next');
        var slideCount = $('#carousel .slides > li').length;
        carousel.flexslider(
            {
                animation: "slide",
                direction:'vertical',
                reverse: false,
                controlNav: false,
                directionNav: false,
                animationLoop: false,
                slideshow: false,
                animationSpeed: 300,
                after: function(slider)
                {
                    var i = slider.currentSlide;
                    console.log(i);
                    if(i === 0)
                    {
                        prev.addClass('disabled');
                    }
                    else
                    {
                        prev.removeClass('disabled');
                    }

                    if(i < (slideCount - 3))
                    {
                        next.removeClass('disabled');
                    }
                    else
                    {
                        next.addClass('disabled');
                    }
                }
            });

        $('#slider').flexslider(
            {
                animation: "slide",
                direction:'vertical',
                controlNav: false,
                directionNav: false,
                animationLoop: false,
                slideshow: false
            });

        var thumbs = $('#carousel .slides > li');
        thumbs.each(function()
        {
            var thumb = $(this);
            thumb.on('click', function()
            {
                var selectedIndex = thumbs.index(thumb);
                $('#slider').flexslider(selectedIndex);
            });
        });

        // Custom Navigation
        if(prev.length)
        {
            prev.on('click', function()
            {
                if(!prev.hasClass('disabled'))
                {
                    $('#carousel').flexslider('prev');
                }
            });
        }

        if(next.length)
        {
            var next = $('.fs_next');
            next.on('click', function()
            {
                if(!next.hasClass('disabled'))
                {
                    $('#carousel').flexslider('next');
                }
            });
        }
    }
});
