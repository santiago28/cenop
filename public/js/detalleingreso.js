var fila = 200000;
$("#AgregarCampos").click(function(e){
  e.preventDefault();
  $("#datosingreso").append('<div class="fila col3 fil'+fila +'">'+
  '<div><span class="titulo">NOMBRE DE MATERIALES</span><textarea class="form-control" name="nombreMaterial[]"></textarea></div>' +
  '<div><span class="titulo">FECHA DE INGRESO</span><input class="form-control calendario" name="fechaIngreso[]" /></div>' +
  '<div><span class="titulo">LOTE DEL FABRICANTE</span><input class="form-control" name="lote[]" /></div>' +
  '<div><span class="titulo">ESTADO DE CALIDAD DEL PRODUCTO</span><select name="estadoCalidad[]" class="form-control"><option value="1">Aprobado</option><option value="2">Rechazado</option><option value="3">En cuarentena</option><option value="4">Devolución</option><option value="5">Retenido</option></select></div>' +
  '<div><span class="titulo">FECHA  DE CADUCIDAD</span><input class="form-control calendario" name="fechaCaducidad[]" /></div>'+
  '<div><span class="titulo">N/A</span><input class="form-control" name="na[]" /></div>'+
  '<div style="width:5%;"><button class="btn btn-default glyphicon glyphicon-trash" onclick="eliminaringreso('+fila+'); return false;"></div>'+
  '</div>'+
  '<div class="fila col3 fil'+fila +'">' +
  '<div><span class="titulo">CANTIDAD DEL MATERIAL</span><input class="form-control" name="cantidadMateriales[]" /></div>' +
  '<div><span class="titulo">CERTIFICADO Y/O FICHA TÉCNICA DE MP</span><input class="form-control" name="certificado[]" /></div>'+
  '<div><span class="titulo">INFORMACIÓN DEL PROVEEDOR</span><input class="form-control" name="informacionProveedor[]" /></div>'+
  '<div><span class="titulo">REFERENCIA</span><input class="form-control" name="referencia[]" /></div>'+
  '<div><span class="titulo">RECIBE</span><input class="form-control" name="recibe[]" /></div>'+
  '<div><span class="titulo">OBSERVACIONES</span><textarea class="form-control" name="observaciones[]"></textarea></div>'+
  '<div style="width:7.5%;"></div>'+
  '</div>'+
  '<div class="fila center">'+
  '</div>');
  fila+=1;
});

var update  window.requestAnimationFrame || window.mozRequestAnimationFrame ||
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
