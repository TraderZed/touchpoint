!function($,e,i){$(function(){"use strict";n(),t(),$(".video_overlay").fitVids(),$("body").on("click",".js-show-video",function(e){e.preventDefault(),videoOverlay.open($(this))}),$("body").on("click",".js-close-video",function(e){e.preventDefault(),videoOverlay.close()}),$("body").on("click",".js-video-category",function(e){e.preventDefault();var i=$(this).data("category");a($(this),i)}),$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if(e=e.length?e:$("[name="+this.hash.slice(1)+"]"),e.length)return $("html,body").animate({scrollTop:e.offset().top},1e3),!1}})});var a=function(e,i){$context=e,$(".js-video-category.active").removeClass("active"),$context.addClass("active"),$("#work").find(".video").removeClass("active"),$("#work").find(".video."+i).addClass("active"),"all"==i&&$("#work").find(".video").addClass("active")},o=function(){},t=function(){},n=function(){$(".jcarousel").on("jcarousel:create jcarousel:reload",function(){var e=$(this),i=e.innerWidth();e.jcarousel("items").css("width",i+"px")}).jcarousel({wrap:"both",itemVisibleInCallback:{onAfterAnimation:function(e,i,a,o){--a,jQuery(".jcarousel-pagination a").removeClass("active").addClass("inactive"),jQuery(".jcarousel-pagination a:eq("+a+")").removeClass("inactive").addClass("active")}}}),$(".jcarousel-pagination").jcarouselPagination({item:function(e){return'<a href="javascript: void(0);">'+e+"</a>"}}),$(".jcarousel-pagination").on("jcarouselpagination:active","a",function(){$(this).addClass("active")}).on("jcarouselpagination:inactive","a",function(){$(this).removeClass("active")}),o()};videoOverlay={open:function(e){$context=e,$videoOverlay=$(".video_overlay"),vimeoID=$context.data("vimeo-id"),videoTitle=$context.data("video-title"),videoDesc=$context.data("video-description"),$videoOverlay.find("h4").text(videoTitle),$videoOverlay.find("p").text(videoDesc),$videoOverlay.find("iframe").attr("src","//player.vimeo.com/video/"+vimeoID+"?autoplay=1&color=3e3f40&title=0&byline=0&portrait=0"),$videoOverlay.fadeIn(200)},close:function(){$videoOverlay=$(".video_overlay"),$videoOverlay.fadeOut(200,function(){videoOverlay.reset()})},reset:function(){$videoOverlay=$(".video_overlay"),$videoOverlay.find("h4").text(""),$videoOverlay.find("p").text(""),$videoOverlay.find("iframe").attr("src","")}}}(jQuery,this);