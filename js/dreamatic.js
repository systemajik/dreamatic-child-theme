//image rollover hover
jQuery(document).ready(function(){

  $('#dr-roll-bottom').hover(function() {
     $('#dr-roll-top').fadeIn("fast");
     $('#dr-roll-bottom').fadeOut("fast");
  });

$('#dr-roll-top').mouseout(function() {
     $('#top').fadeOut("slow");
     $('#dr-roll-bottom').fadeIn("slow");
  });
});