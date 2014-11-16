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

});