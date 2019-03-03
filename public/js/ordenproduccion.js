
$("#AgregarCampos").click(function(e){
  e.preventDefault();
  $("#medidas").append('<div class="fila col2">\n' +
  '<div>' +
  '<div class="checkbox" style="margin-left: 17px; width:280px;">'+
  '<input type="text" name="nombreMedida[]" class="form-control" placeholder="NOMBRE MEDIDA">'+
  '</div>' +
  '</div>' +
  '<div>' +
  '<div class="checkbox" style="margin-left: 17px; width:280px;">'+
  '<input type="text" name="medida[]" class="form-control" placeholder="MEDIDA">'+
  '</div>' +
  '</div>' +
  '</div>' +
  '');

});


  var iter = 0;
$("#AgregarCamposMateria").click(function(e){
  e.preventDefault();
  $("#materiaprima").append('<div class="fila col3e">'+
  '<div class="col2da"><input type="text" name="nombreMateria[]" class="form-control"><span style="font-weight: normal;"></span></div>' +
  '<div class="col2da"><input type="text" name="lote[]" class="form-control"><span style="font-weight: normal;"></span></div>' +
  '<div class="col2da"><input type="text" name="cantidad[]" class="form-control"><span style="font-weight: normal;"></span></div>' +
  '<div class="col2da"><select type="text" name="responsable[]" class="form-control actual'+iter+'"></select></div>' +
  '<div class="col2da"><input type="text" name="fechaMateria[]" class="form-control calendario"><span style="font-weight: normal;"></span></div>' +
  '<div class="col2da"><input type="text" name="serial[]" class="form-control"><span style="font-weight: normal;"></span></div>' +
  '<div class="col2da" style="width:11%;"><a href="#eliminar_elemento" rel="tooltip" title="Eliminar" class="material-icons eliminar_fila" style="color:#757575; text-decoration: none;" data-toggle = "modal">&#xE872;</a></div>' +
  '</div>'
);
$.get("/cenop/ordenproduccion/GetListaOrtopedistas", function(data){
  var html = '';
  $.each(data, function(index, value){
    html += '<option value='+value.idOrtopedista+'>' + value.nombre + "</option>"
  })
  $('.actual'+iter).append(html);
  iter++;
});
});


$("#BuscarPaciente").click(function(){
  var DocumentoPaciente = $("#txtDocumentoPaciente").val();
  $.get("/Ordenproduccion/BuscarPaciente", {"numeroDocumento": DocumentoPaciente},
  function(paciente){
    $("#txtNombre").text(paciente.nombre + " "+ paciente.apellido);
    $("#txtNumeroDocumento").text(paciente.numeroDocumento);
    $("#txtCelular").text(paciente.celular);
    $("#txtTelefono").text(paciente.telefono);
    $("#txtDireccion").text(paciente.direccion);
    $("#txtMunicipio").text(paciente.nombreMunicipio);
    $("#txtDepartamento").text(paciente.nombreDepartamento);
    $("#txtEdad").text(paciente.edad);
    $("#txtEstatura").text(paciente.estatura);
    $("#txtPeso").text(paciente.peso);
    $("#idPaciente").val(paciente.idPaciente);
  });
});

$("#BuscarTecnicos").click(function(){
  var fechaCita = $("#txtFechaCita").val();
  var horaInicio = $("#txtHoraInicio").val();
  var horaFin = $("#txtHoraFin").val();

  $.get("/cenop/agenda/ConsultarDisponibilidadTecnico", {"fechaCita": fechaCita, "horaInicio": horaInicio, "horaFin": horaFin},
  function(ortopedista){
    $("#idOrtopedista").empty();
    var Datos = "";
    $.each(ortopedista, function(index, value){
      Datos += "<option value='" + value.idOrtopedista + "'>" + value.nombre + " " + value.apellido + "</option>";
    });

    $("#idOrtopedistaOrden").append(Datos);
  });
});

var update = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;

function repetir() {

  $(".calendario").datetimepicker({
    locale: 'es',
    format: 'YYYY/MM/DD',
  });

  update(repetir); //entra en la funcion repetir sin salir de la misma, asi crea un ciclo infinito
}
update(repetir);

$(".calendario").datetimepicker({
  locale: 'es',
  format: 'YYYY/MM/DD',
});

$("#txtHoraInicio").datetimepicker({
  locale: 'es',
  format: 'HH:mm',
}).on('dp.change', function(e){
  var formatedValue = e.date.format(e.date._f);
  var hora = "";
  var nuevahora = "";
  if (formatedValue.length == 25) {
    hora = formatedValue.split('T')[1].substring(0,5);
  }else {
    hora = formatedValue;
  }
  nuevahora = moment().add(1,'hours').format("HH:mm");
  console.log(nuevahora);
});

$("#txtHoraFin").datetimepicker({
  locale: 'es',
  format: 'HH:mm',
});

$(".seguimiento").click(function(){
  // var parent = $(this).parent().parent().parent().parent().attr('id');
  // $('.'+parent).prop('checked', false);
  // $(this).prop('checked', true);

  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }

});

$(".medidas").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".positivo").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".plastificado").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".montaje").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".prueba1").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".prueba2").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".laminado").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".solicitudComponente").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".ingresoComponentes").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".ordenCompra").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".ordenServicios").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".autorizacionServicioL").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".cotizacionEnviada").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});

$(".entregado").click(function(){
  if ($(this).is(':checked') ) {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
    $(this).prop('checked', true);
  }else {
    var parent = $(this).parent().parent().parent().parent().attr('id');
    $('.'+parent).prop('checked', false);
  }
});
