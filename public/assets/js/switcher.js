// using "jQuery" here instead of the dollar sign will protect against conflicts with other libraries like MooTools
jQuery(document).ready(function () {

    //Set default Jacked ease
	jQuery.easing.def = "easeOutExpo";
    jQuery.styleSwitcher();
	

});

// plugin structure used so we can use the "$" sign safely
(function ($) {

    //main vars
    var switcher,
    browser,
    isMobile,
    isIE8,
    themecss;


    // class constructor / "init" function
    $.styleSwitcher = function () {

        browser = Jacked.getBrowser();
        isMobile = (Jacked.getMobile() == null) ? false : true;
        isIE8 = Jacked.getIE();

        //container
        switcher = $('.styleSwitcherWrapper');
        
		if(isMobile){
			switcher.remove();
		}
		else{
			
            themecss = $('#colorTheme');
			initSwitcher();
			initToggle();
		}



    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    //INITIATE STYLE SWITCHER
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    function initSwitcher() {
		
		var headerBlur = $('#blurMask');
		var bgImg = $('#bgImage');


        //colors
        switcher.find('.styleSwitcherColors a').each(function () {

            var t = $(this);

            var c = t.attr('href').split('?theme=')[1];
            var css = "css/colors/" + c + "Theme.css";

            t.click(function (e) {
							  
                e.preventDefault();
				
				var target = $(this);
                var img = target.find('img');

                if (!img.hasClass('selected')) {
					
					//remove selected
					switcher.find('.styleSwitcherColors').find('li img').each(function () {
						 $(this).removeClass('selected');								   
					});
                    
					img.addClass('selected');
                    themecss.attr("href", css);
                    return false;
                }



            });


        });
		
		//solid bg colors
		
        switcher.find('.styleSwitcherSolidBg a').each(function () {

            var t = $(this);

            var c = t.attr('href').split('?theme=')[1];
			c = '#'+c;

            t.click(function (e) {
							  
                e.preventDefault();
				bgImg.css('visibility', 'hidden');
				headerBlur.css('visibility', 'hidden');
				
				var target = $(this);
                var img = target.find('img');

                if (!img.hasClass('selected')) {
					
					//remove selected
					switcher.find('.styleSwitcherPatterns li img').each(function () {
						 $(this).removeClass('selected');								   
					});
					switcher.find('.styleSwitcherSolidBg li img').each(function () {
						 $(this).removeClass('selected');								   
					});
                    
					img.addClass('selected');
					
					$('body').css({
					  background: 'none'
					});
                    $('body').css('background-color', c);
                    return false;
                }

            });
        });
		
		
		//pattern bg
        switcher.find('.styleSwitcherPatterns a').each(function () {

            var t = $(this);

            var c = t.attr('href').split('?theme=')[1];
			c = 'images/backgrounds/'+c+'.png';

            t.click(function (e) {
							  
                e.preventDefault();
				bgImg.css('visibility', 'hidden');
				headerBlur.css('visibility', 'hidden');
				
				var target = $(this);
                var img = target.find('img');

                if (!img.hasClass('selected')) {
					
					//remove selected
					switcher.find('.styleSwitcherSolidBg li img').each(function () {
						 $(this).removeClass('selected');								   
					});
					switcher.find('.styleSwitcherPatterns li img').each(function () {
						 $(this).removeClass('selected');								   
					});
                    
					img.addClass('selected');
					
					
                    $('body').css({
					  background: 'url(' + c + ') repeat 0 0'
					});
                    return false;
                }



            });


        });
		
		//bg image
		switcher.find('.switcherBgImg').click(function (e) {
														
				e.preventDefault();
																  
				switcher.find('.styleSwitcherSolidBg li img').each(function () {
					 $(this).removeClass('selected');								   
				});
				switcher.find('.styleSwitcherPatterns li img').each(function () {
					 $(this).removeClass('selected');								   
				});
				
				bgImg.css('visibility', 'visible');
				headerBlur.css('visibility', 'visible');
				
				$('body').css({
					  background: 'none'
				});
				
				return false;
				
		});

        //layout
        var hb = $('body').find('.headerBg').not('.contactInfoItem .headerBg');
		var hcb = $('body').find('.headerContentBg');
        var cb = $('body').find('.contentBgFull');
        var fb = $('body').find('.footerBgFull');
        var sfb = $('body').find('.subFooterBgFull');
		var ct = $('body').find('.container');

        switcher.find('.styleSwitcherLayout a').each(function () {

            var t = $(this);
			var img = t.find('img');
			
            t.click(function () {
							  
                
				if (!img.hasClass('selected')) {
					
					switcher.find('.styleSwitcherLayout li img').each(function () {
						 $(this).removeClass('selected');								   
					});
					
					
					
					var btn = $(this);
					img.addClass('selected');
					var l = btn.attr('href').split('?theme=')[1];
	
					if (l == 'boxed') {
						hb.removeClass('headerBg');
						cb.css('visibility', 'hidden');
						fb.removeClass('footerBgFull');
						sfb.removeClass('subFooterBgFull');
						hcb.css('visibility', 'hidden');
						ct.css({
						  '-webkit-box-shadow': '0px 0px 10px rgba(0,0,0,0.1)',
						  '-moz-box-shadow': '0px 0px 10px rgba(0,0,0,0.1)',
						  'box-shadow': '0px 0px 10px rgba(0,0,0,0.1)'
						  
						});
					} else {
						hb.addClass('headerBg');
						cb.css('visibility', 'visible');
						fb.addClass('footerBgFull');
						sfb.addClass('subFooterBgFull');
						hcb.css('visibility', 'visible');
						ct.css({
						  '-webkit-box-shadow': 'none',
						  '-moz-box-shadow': 'none',
						  'box-shadow': 'none'
						  
						});
					}
	
					return false;
				}

            });


        });

       


    }

    function initToggle() {

        switcher.delay(1000).animate({
				left: 0
			  }, 500);

        var switcherOpen = true;
        var btn = $('.styleSwitcherToggle');
        var w = switcher.outerWidth();

        btn.click(function (e) {
							
			e.preventDefault();

			switcher.animate({
				left: switcherOpen ? -w : 0
			  }, 500);
			
            switcherOpen = !switcherOpen;

        });

    }





})(jQuery);