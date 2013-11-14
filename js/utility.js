$(document).ready(function(){
  $('#maschio_btn').click(function(event){
    $('#sesso').val('maschio');
    $('#maschio_btn i').addClass('text-info');
    $('#femmina_btn i').removeClass('text-info');
  });

  $('#femmina_btn').click(function(event){
    $('#sesso').val('femmina');
    $('#maschio_btn i').removeClass('text-info');
    $('#femmina_btn i').addClass('text-info');
  });
});