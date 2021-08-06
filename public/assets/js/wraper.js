$(document).ready(function() {
  $("#wrapper").toggleClass("toggled");  
});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Funcionalidad el wraper
$("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});




