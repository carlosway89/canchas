$('html').addClass('no-fouc');
		
$(document).ready(function(){		
    $('html').show();		
    var window_w = $(window).width();
    var window_h = $(window).height();
    var window_s = $(window).scrollTop();
			
    $("body").queryLoader2({
        backgroundColor: '#f2f4f9',
        barColor: '#63b2f5',
        barHeight: 4,
        percentage:false,
        deepSearch:true,
        minimumTime:1000,
        onComplete: function(){			
            $('.animate-onscroll').filter(function(index){		
                return this.offsetTop < (window_s + window_h);				
            }).each(function(index, value){
						
                var el = $(this);
                var el_y = $(this).offset().top;
						
                if((window_s) > el_y){
                    $(el).addClass('animated fadeInDown').removeClass('animate-onscroll');
                    setTimeout(function(){
                        $(el).css('opacity','1').removeClass('animated fadeInDown');
                    },2000);
                }			
            });		
        }
    });		
});