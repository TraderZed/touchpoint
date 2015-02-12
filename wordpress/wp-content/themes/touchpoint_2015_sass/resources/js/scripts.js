(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$('.jcarousel')
    .on('jcarousel:create jcarousel:reload', function() {
        var element = $(this),
            width = element.innerWidth();
        element.jcarousel('items').css('width', width + 'px');
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
		$('.video_overlay').fitVids();
  	
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
	});
	
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
	
  videoOverlay = {
  	open: function(context) {
    	$context = context;
    	$videoOverlay = $('.video_overlay');
    	vimeoID = $context.data('vimeo-id');
    	videoTitle = $context.data('video-title');
    	videoDesc = $context.data('video-description');
      
      $videoOverlay.find('h4').text(videoTitle);
      $videoOverlay.find('p').text(videoDesc);
      $videoOverlay.find('iframe').attr('src', '//player.vimeo.com/video/' + vimeoID + '?autoplay=1&color=3e3f40&title=0&byline=0&portrait=0');
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
