$(document).ready(function(){
	if($(window).width() <= 1024){
		$('.nav-item-submenu').addClass('collapse');
	}else{
		$('.nav-item-submenu').removeClass('collapse');
	}
	// Nav submenu Responsive
	$(window).resize(function(){
		if($(window).width() <= 1024){
			$('.nav-item-submenu').addClass('collapse');
		}else{
			$('.nav-item-submenu').removeClass('collapse');
		}
	});

	// Nav submenu collapse
		$('.nav-toggle-btn').click(function(){
	    $(this).closest('.nav-main').toggleClass('menu-visible');
		});
		$('.nav-main').click(function(e){
        e.stopPropagation();
    })
    $('body').click(function(){
    	if($('.menu-visible').length > 0)
    		$('.nav-main').removeClass('menu-visible');
    })
	 	$(window).resize(function(){
		  if($(window).width() <= 1024){
		    $('.item-has-submenu .nav-item-main-link').on('click', function(e){
		        e.preventDefault();
		        $(this).closest('.nav-item-main').find('.collapse').collapse('toggle');
		    });
		  }
		});
	 
	if($(window).width() <= 1024){
	  $('.item-has-submenu .nav-item-main-link').on('click', function(e){
	      e.preventDefault();
	      $(this).closest('.nav-item-main').find('.collapse').collapse('toggle');
	  });	  
	}

	// fixed header
	$(window).scroll(function(){
		var scrollTop =$(window).scrollTop();
		if(scrollTop >=100){
			$('body').addClass('fixed-header');
		}else{
			$('body').removeClass('fixed-header');
		}
	});

	//active

	$(".nav-item-main-link").click(function () {
	    $(".nav-item-main-link").removeClass("active");
	    $(this).addClass("active");   
	});

	// MODAL LOGIN
	 $('.sign-in-modal').click(function() {
      $('.sign-in-modal').removeClass('active');
      $('.inner--sign-in-modal').removeClass('active');
      });

      $('.inner--sign-in-modal').click(function(e){
        e.stopPropagation();
      })

      $('.close-login').click(function(){
        $('.sign-in-modal').removeClass('active');
        $('.inner--sign-in-modal').removeClass('active');
      })

      /* MODAL */
      $('.modal-sign').click(function(){
        $('.sign-in-modal').addClass('active');
        $('.inner--sign-in-modal').addClass('active');
        setTimeout(function(){
          $('.overlay').removeClass('sign-up-side');
          $('.overlay').addClass('sign-in-side');
          $('.tab-sign-up').removeClass('active');
          $('.tab-sign-in').addClass('active');
          $('.content-sign-up').removeClass('active');
          $('.content-sign-in').addClass('active');
        }, 400);
      });

      $('.inner--sign-in-modal .close-modal').click(function(){
        $('.sign-in-modal').removeClass('active');
        $('.inner--sign-in-modal').removeClass('active');
      });

      $('.val-info .tab').click(function(){
        if($(this).hasClass('tab-sign-in') == true){
          $('.overlay').removeClass('sign-up-side');
          $('.overlay').addClass('sign-in-side');
          $('.tab-sign-up').removeClass('active');
          $('.tab-sign-in').addClass('active');
          $('.content-sign-up').removeClass('active');
          $('.content-sign-in').addClass('active');
        } else {
          $('.overlay').removeClass('sign-in-side');
          $('.overlay').addClass('sign-up-side');
          $('.tab-sign-in').removeClass('active');
          $('.tab-sign-up').addClass('active');
          $('.content-sign-in').removeClass('active');
          $('.content-sign-up').addClass('active');
        }
      });

      //Greetings
      $('.input-firstname').keyup(function(){
        var getText = $(this).val();
        console.log(getText);
        $('.greetings-name').html(getText);
      });

      $('.input-lastname').keyup(function(){
        var getText = $(this).val();
        console.log(getText);
        $('.greetings-surname').html(getText);
      });
});