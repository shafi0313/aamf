window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop >= 30 || document.documentElement.scrollTop >= 30) {
    document.getElementById("nav").style.padding = "0px 0px";
    document.getElementById("nav_img").style.width = "50px";
    document.getElementById("logo1").style.display = "none";
    document.getElementById("logo2").style.display = "none";
    document.getElementById("logo3").style.display = "none";
    document.getElementById("logo4").style.display = "none";
    document.getElementById("logo5").style.display = "none";
    document.getElementById("logo6").style.display = "none";
    document.getElementById("logo7").style.display = "none";
    document.getElementById("logo8").style.display = "none";
  } else {
    document.getElementById("nav").style.padding = "0px 0px";
    document.getElementById("nav_img").style.width = "100px";
    document.getElementById("logo1").style.display = "block";
    document.getElementById("logo2").style.display = "block";
    document.getElementById("logo3").style.display = "block";
    document.getElementById("logo4").style.display = "block";
    document.getElementById("logo5").style.display = "block";
    document.getElementById("logo6").style.display = "block";
    document.getElementById("logo7").style.display = "block";
    document.getElementById("logo8").style.display = "block";
  }
};



function stickyHeader () {
	if ($('header').length) {
		var strickyScrollPos = $('header').next().offset().top;
		if($(window).scrollTop() > strickyScrollPos) {
			$('header').addClass('sticky');
			$('body').addClass('sticky');
		}
		else if($(window).scrollTop() <= strickyScrollPos) {
		  	$('header').removeClass('sticky');
		  	$('body').removeClass('sticky');
		}
	};
};

    // Scroll to Top
	//Check to see if the window is top if not then display button
    $(window).scroll(function(){
    	stickyHeader();
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollup').on("click",function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });





