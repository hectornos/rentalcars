$(document).ready(function(){
  $( ".destacar" ).hover(
      function() {
          $( this ).css("background-color","#e8eaed") ;
      }
      , function() {
          $( this ).css("background-color","white");
      }
  );
  
  $(function(){ 
      // lo aplica a todos los campos de tipo input que tengan un título
      $('input[title!=""]').hint();
  });


});


function destacar() {
  alert('funciona');
}