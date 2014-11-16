$(function() { 
	
	var isMobile = false;
	var isTablet = false;
	
	if($('body').width() < 768) {
		isMobile = true;
	}
	
	if($('body').width() < 1030) {
		isTablet = true;
	}

	$('.toggle-reel-js').on('click', function(e) {
		e.preventDefault();
		
		$('.overlay').toggleClass('active');
	});

	var BV = new $.BigVideo();
    BV.init();
    BV.show('/public/videos/miniloop.mp4',{ambient:true});
    
    $(window).on('resize', function() {
	    if($(window).height() > 781 && isTablet == false && isMobile == false) {
		    $('#contact').css('position', 'absolute');
		    $('#contact').css('bottom', 0);
	    } else {
		    $('#contact').css('position', 'static');
	    }
    });
    
    $(window).on('load', function() {
	    if($(window).height() > 781 && isTablet == false && isMobile == false) {
		    $('#contact').css('position', 'absolute');
		    $('#contact').css('bottom', 0);
	    } else {
		    $('#contact').css('position', 'static');
	    }
    });

});