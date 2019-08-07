//image rollover hover
jQuery(document).ready(function(){

  jQuery('#dr-roll-bottom').hover(function() {
    jQuery('#dr-roll-top').fadeIn("fast");
    jQuery('#dr-roll-bottom').fadeOut("fast");
  });

  jQuery('#dr-roll-top').mouseout(function() {
    jQuery('#top').fadeOut("slow");
    jQuery('#dr-roll-bottom').fadeIn("slow");
  });
});