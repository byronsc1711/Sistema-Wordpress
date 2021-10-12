//GO UP
jQuery(document).ready(function(){ 
      
  jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 200) {
      jQuery('.goup').fadeIn();
      } else {
      jQuery('.goup').fadeOut();
      }
    }); 
      
    jQuery('.goup').click(function(){
      jQuery("html, body").animate({ scrollTop: 0 }, 600);
      return false;
    });
//SLIDER SLIDESJS
jQuery(function() {
      jQuery("#slides").slidesjs({

        height: 630,

        play: { auto: true,interval: 6000, },

        effect: {

          slide: {speed: 1500},

          fade: { speed: 300, },

                }

      });

    });
//LOCK THE SEARCH IF THE FIELD IS EMPTY
     jQuery('.searchsubmit').attr('disabled','disabled');
     jQuery('.s').keypress(function(){
            if(jQuery(this).val() != ''){
               jQuery('.searchsubmit').removeAttr('disabled');
            }
     });
});
