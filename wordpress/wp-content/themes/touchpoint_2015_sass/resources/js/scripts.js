(function ($, root, undefined) {

	$(function () {

		'use strict';

		// DOM ready, take it away

		initCarousel();
		setupAboutVideos();

		$('.video_overlay').fitVids();
    $('.single-video #vimeo').fitVids();
  	// Event city!

    $(window).scroll(function() {
      if (screen.width > 980) {
        toggleNav();
      }
    });

  	$('body').on('click', '.js-show-video', function(e) {
    	e.preventDefault();
    	videoOverlay.open($(this));
  	});
  	$('body').on('click', '.js-close-video', function(e) {
    	e.preventDefault();
    	videoOverlay.close();
  	});

  	$('body').on('click', '.js-video-category', function(e) {
    	e.preventDefault();

    	var cat = $(this).data('category');
    	videoFilter($(this), cat);
  	});

  	$('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
	});

  var toggleNav = function() {
    if($(window).scrollTop() > 100) {
      $('.main_header').addClass('sticky');
    } else {
      $('.main_header').removeClass('sticky');
    }
  }

	var videoFilter = function(context, cat) {
  	$context = context;
  	$('.js-video-category.active').removeClass('active');

  	$context.addClass('active');

  	$('#work').find('.video').removeClass('active');
  	$('#work').find('.video.' + cat).addClass('active');

  	if(cat == 'all') {
  	  $('#work').find('.video').addClass('active');
  	}
	}

	var setupCarouselVideos = function() {
/*
    BV = new $.BigVideo({
      useFlashForFirefox:true,
      forceAutoplay:false,
      controls:false,
      doLoop:false,
      container:$('.jcarousel li').first(), //Container
      shrinkable:false
    });
    BV.init();
    BV.show($('.jcarousel .carousel-item').first().data('video'), {ambient: true});

  	$.each($('.jcarousel li'), function(i, elem) {
    	console.log(elem)
  	})
*/
	}

	var setupAboutVideos = function () {

/*
  	var aboutVideo1;
  	var aboutVideo2;
  	var aboutVideo3;

  	aboutVideo1 = new $.BigVideo({
      useFlashForFirefox:true,
      forceAutoplay:false,
      controls:false,
      doLoop:false,
      container:$('#about .background .video_one'), //Container
      shrinkable:false
    });

    aboutVideo2 = new $.BigVideo({
      useFlashForFirefox:true,
      forceAutoplay:false,
      controls:false,
      doLoop:false,
      container:$('#about .background .video_two'), //Container
      shrinkable:false
    });

    aboutVideo3 = new $.BigVideo({
      useFlashForFirefox:true,
      forceAutoplay:false,
      controls:false,
      doLoop:false,
      container:$('#about .background .video_three'), //Container
      shrinkable:false
    });

    aboutVideo1.init();
    aboutVideo2.init();
    aboutVideo3.init();
    aboutVideo1.show(object_name.templateUrl + '/assets/videos/TOUCHPOINT_1.mp4', {ambient: true});
    aboutVideo2.show(object_name.templateUrl + '/assets/videos/TOUCHPOINT_2.mp4', {ambient: true});
    aboutVideo3.show(object_name.templateUrl + '/assets/videos/TOUCHPOINT_3.mp4', {ambient: true});
*/
	}

	var initCarousel = function() {
  	$('.jcarousel')
    .on('jcarousel:create jcarousel:reload', function() {

        var element = $(this),
            width = element.innerWidth();
        element.jcarousel('items').css('width', width + 'px');
        setupCarouselVideos();
        $('#carousel').css('visibility', 'visible')
    })
    .jcarousel({
      wrap: 'both',
      itemVisibleInCallback: {
        onAfterAnimation: function(c, o, i, s) {
        --i;
          jQuery('.jcarousel-pagination a').removeClass('active').addClass('inactive');
          jQuery('.jcarousel-pagination a:eq('+i+')').removeClass('inactive').addClass('active');
        }
      }
    });

    $('.jcarousel-pagination').jcarouselPagination({
        item: function(page) {
            return '<a href="javascript: void(0);">' + page + '</a>';
        }
    });
    $('.jcarousel-pagination')
      .on('jcarouselpagination:active', 'a', function() {
          $(this).addClass('active');
      })
      .on('jcarouselpagination:inactive', 'a', function() {
          $(this).removeClass('active');
      });


	}

  videoOverlay = {
  	open: function(context) {
    	$context = context;
    	$videoOverlay = $('.video_overlay');
    	vimeoID = $context.data('vimeo-id');
    	videoTitle = $context.data('video-title');
    	videoDesc = $context.data('video-description');

      $videoOverlay.find('h4').text(videoTitle);
      $videoOverlay.find('p').text(videoDesc);
      $videoOverlay.find('iframe').replaceWith('<iframe src="//player.vimeo.com/video/' + vimeoID + '?autoplay=1&color=3e3f40&title=0&byline=0&portrait=0"  width="960" height="409" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
      $videoOverlay.fadeIn(200);
  	},
  	close: function() {
    	$videoOverlay = $('.video_overlay');
    	$videoOverlay.fadeOut(200, function() {
      	videoOverlay.reset();
    	});
  	},
  	reset: function() {
    	$videoOverlay = $('.video_overlay');
    	$videoOverlay.find('h4').text('');
      $videoOverlay.find('p').text('');
      $videoOverlay.find('iframe').attr('src', '');
  	}
	}

})(jQuery, this);
