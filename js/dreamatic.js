window.addEventListener("DOMContentLoaded", function() {
  var el = document.getElementById("dr-contact-us-typeform");
  
  // When instantiating a widget embed, you must provide the DOM element
  // that will contain your typeform, the URL of your typeform, and your
  // desired embed settings
  window.typeformEmbed.makeWidget(el, "https://admin.typeform.com/to/lSVbRL", {
    hideFooter: true,
    hideHeaders: true,
    opacity: 0
  });
});