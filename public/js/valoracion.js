$(".articulacionhombro").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulacionrodilla").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulacioncodo").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulaciontobillo").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulacionmuneca").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulacionpie").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulaciondedos").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulacioncuello").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulacioncadera").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".articulacioncolumna").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});

$(".dispositivomedico").click(function(){
  if ($(this).is(':checked')) {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var clase = $(this).attr('class').split(' ')[0];
    $('.'+clase).prop('checked', false);
  }
});


$(".calendario").datetimepicker({
  locale: 'es',
  format: 'YYYY/MM/DD',
});
