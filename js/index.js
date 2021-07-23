


$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});

	$(document).ready(function() {
	$('#newsmedia').owlCarousel({
	ltr:true,
			items: 1,
			loop: true,
			loop:($("#newsmedia .item").length > 1) ? true: false,
			margin: 20,
			autoplay: true,
			autoplayTimeout: 1500,
			autoplaySpeed: 6000,
			smartSpeed : 5000,
			nav: true,
			dots : false,
	//fluidSpeed : 600
	    responsive:{
	        0:{
	            items:1,
	            dots : false,                        
	        },
	        320:{
	            items:1,
	            dots : false,                        
	        },
	        767:{
	            items:1,
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	})
	})

	$(document).ready(function() {
	$('#videoslider').owlCarousel({
	ltr:true,
			items: 1,
			loop: true,
			loop:($("#newsmedia .item").length > 1) ? true: false,
			margin: 20,
			autoplay: true,
			autoplayTimeout: 1500,
			autoplaySpeed: 6000,
			smartSpeed : 5000,
			nav: true,
			dots : false,
	//fluidSpeed : 600
	    responsive:{
	        0:{
	            items:1,
	            dots : false,                        
	        },
	        320:{
	            items:1,
	            dots : false,                        
	        },
	        767:{
	            items:1,
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	})
	})
$('.moreless-button').click(function() {
  //$('.moretext').slideToggle();
    $(this).parent('.solution-text').find('.moretext').slideToggle();
  if ($('.moreless-button').text() == "Read more") {
    $(this).text("Read less")
  } else {
    $(this).text("Read more")
  }
}); 
 


jQuery.fn.liScroll = function(settings) {
	settings = jQuery.extend({
		travelocity: 0.03
		}, settings);		
		return this.each(function(){
				var $strip = jQuery(this);
				$strip.addClass("newsticker")
				var stripHeight = 1;
				$strip.find("li").each(function(i){
					stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
				});
				var $mask = $strip.wrap("<div class='mask'></div>");
				var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");								
				var containerHeight = $strip.parent().parent().height();	//a.k.a. 'mask' width 	
				$strip.height(stripHeight);			
				var totalTravel = stripHeight;
				var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye		
				function scrollnews(spazio, tempo){
				$strip.animate({top: '-='+ spazio}, tempo, "linear", function(){$strip.css("top", containerHeight); scrollnews(totalTravel, defTiming);});
				}
				scrollnews(totalTravel, defTiming);				
				$strip.hover(function(){
				jQuery(this).stop();
				},
				function(){
				var offset = jQuery(this).offset();
				var residualSpace = offset.top + stripHeight;
				var residualTime = residualSpace/settings.travelocity;
				scrollnews(residualSpace, residualTime);
				});			
		});	
};

$(function(){
    $("ul#ticker01").liScroll();
});


$(".Click-here").on('click', function() {
  $(".custom-model-main").addClass('model-open');
}); 
$(".close-btn, .bg-overlay").click(function(){
  $(".custom-model-main").removeClass('model-open');
});

















$("#leadership").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});

$("#leadership1").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});


$("#leadership2").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});



$("#leadership3").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});

$("#leadership4").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});

$("#leadership5").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});

$("#leadership6").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});
$("#leadership7").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});
$("#leadership8").mCustomScrollbar({
	scrollButtons:{enable:true,scrollType:"stepped"},
	keyboard:{scrollType:"stepped"},
	mouseWheel:{scrollAmount:188},
	theme:"dark-thin",
	
	snapAmount:188,
	snapOffset:65
});

