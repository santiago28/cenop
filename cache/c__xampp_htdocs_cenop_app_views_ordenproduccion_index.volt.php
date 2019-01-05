<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Información Orden Producción</h4></center>
      </div>
      <div class="panel-body">
        <?php if ($tipoUsuario == 0) { ?>
        <div class="col-md-3" style="padding-right:0px;">
          <button class="btn btn-primary" style="width:100%; height:42px;" id="AbrirModalReporte">Reporte Órtesis y Prótesis</button>
          <br>
        </div>
        <?php } ?>

        <?= $this->getContent() ?>
        <div class="table-responsive col-md-10" style="border-radius: 5px;width: 100%;margin: 0px auto; float: none;">
          <table class="table table-bordered" id="mytable">
            <thead>
              <tr>
                <th>OP</th>
                <th>Documento Paciente</th>
                <th>Nombre Paciente</th>
                <th>Cliente</th>
                <th>Fecha Autorización</th>
                <th>Estado Paciente</th>
                <?php if ($tipoUsuario != 2) { ?>
                <th></th>
                <th></th>
                <?php } ?>
                <?php if ($tipoUsuario != 1) { ?>
                <th></th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($ordenproduccion)) { ?>
              <?php foreach ($ordenproduccion as $orden) { ?>
              <tr>
                <td class="filaorden"><span class="numeroorden"><?= $orden->op ?></span></td>
                <td><?= $orden->numeroDocumento ?></td>
                <td><?= $orden->nombrePaciente ?></td>
                <td>
                  <?php if ($tipoUsuario == 2) { ?>
                  <?= $this->tag->select(['cambiarCliente', $listaempresas, 'value' => $orden->idEmpresa, 'class' => 'form-control cambiarCliente estadoCliente']) ?>
                  <?php } else { ?>
                  <?php if ($tipoTecnico == 2) { ?>
                  <?= $this->tag->select(['cambiarCliente', $listaempresas, 'value' => $orden->idEmpresa, 'class' => 'form-control cambiarCliente estadoCliente']) ?>
                  <?php } else { ?>
                  <?= $this->tag->select(['cambiarCliente', $listaempresas, 'value' => $orden->idEmpresa, 'class' => 'form-control cambiarCliente']) ?>
                  <?php } ?>
                  <?php } ?>
                </td>
                <td><?= $orden->fechaAutorizacion ?></td>
                <td>
                  <?php if ($tipoUsuario == 2) { ?>
                  <?= $this->tag->select(['estadoPaciente', $estadoPaciente, 'value' => $orden->estadoPaciente, 'class' => 'form-control estadoPaciente estadoCliente']) ?>
                  <?php } else { ?>
                  <?php if ($tipoTecnico == 2) { ?>
                  <?= $this->tag->select(['estadoPaciente', $estadoPaciente, 'value' => $orden->estadoPaciente, 'class' => 'form-control estadoPaciente estadoCliente']) ?>
                  <?php } else { ?>
                  <?= $this->tag->select(['estadoPaciente', $estadoPaciente, 'value' => $orden->estadoPaciente, 'class' => 'form-control estadoPaciente']) ?>
                  <?php } ?>
                  <?php } ?>
                </td>
                <?php if ($tipoUsuario != 2) { ?>
                <td><?= $this->tag->linkTo(['ordenproduccion/edit/' . $orden->idOrden, '&#xE8B6;', 'class' => 'material-icons', 'style' => 'color:#757575; text-decoration: none;']) ?></td>
                
                <td><a href="#eliminar_elemento" rel="tooltip" title="Eliminar" class="material-icons eliminar_fila" style="color:#757575; text-decoration: none;" data-toggle = "modal" id="<?= $this->url->get('ordenproduccion/delete/' . $orden->idOrden) ?>">&#xE872;</a></td>
                <?php } ?>
                <?php if ($tipoUsuario != 1) { ?>
                <td><a href="#consultarfechaestados" rel="tooltip" title="Cpnsultar" class="material-icons consultar_fila" style="color:#757575; text-decoration: none;cursor:pointer;" data-toggle = "modal" id="<?= $orden->op ?>">remove_red_eye</a></td>
                <?php } ?>
              </tr>
              <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
      <div class="panel-footer">
        <div class="form-group" style="overflow:hidden;text-align:right;">
          <div class="col-sm-offset-2 col-sm-10">
            
            <?php if ($tipoUsuario != 2) { ?>
            <button type="button" name="button" class="btn btn-primary" id="AbrirModalCrearOrden">Registrar Orden</button>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="ModalOrden" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= $this->tag->form(['Ordenproduccion/create', 'method' => 'post', 'autocomplete' => 'off']) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crear Orden de Producción</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Orden Producción</label>
          <input type="text" name="op" class="form-control">
        </div>
        <div class="form-group">
          <label>Paciente</label>
          <select id="idPaciente" name="idPaciente"  class="form-control" style="width:100%;">
            <?php foreach ($pacientes as $paciente) { ?>
            <option value="<?= $paciente->idPaciente ?>"><?= $paciente->nombre ?> &nbsp;<?= $paciente->apellido ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Remitente</label>
          <select id="idEmpresa" name="idEmpresa"  class="form-control">
            <option value="0">No Remitente</option>
            <?php foreach ($empresas as $empresa) { ?>
            <option value="<?= $empresa->idEmpresa ?>"><?= $empresa->nombre ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="ModalReporte" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="width:40%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title" id="myModalLabel">Reporte Órtesis y Prótesis</h4></center>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Fecha Inicial</label>
          <input type="text" class="form-control" id="FechaInicial">
        </div>
        <div class="form-group">
          <label>Fecha Final</label>
          <input type="text" class="form-control" id="FechaFinal">
        </div>
        <div class="form-group">
          <label>Estado</label>
          <select class="form-control" id="Estado">
            <option value="1">Valoración</option>
            <option value="5">Entregado</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="GenerarReporte">Generar Reporte</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="ModalFecha" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="width:40%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title" id="myModalLabel">Fechas Estado Paciente</h4></center>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Ingrese la fecha de: <span id="DatoEstadoPaciente"></span></label>
          <input type="text" class="form-control" id="FechaEstado">
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="GuardarFechaEstado">Guardar</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="ModalMostrarEstados" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="width:30%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title" id="myModalLabel">Estados Paciente</h4></center>
      </div>
      <div class="modal-body">
        <div id="ImprimirDatos">
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="eliminar_elemento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
      </div>
      <div class="modal-body">
        <p>¿Está seguro de que desea eliminar la orden de producción?</p>
        <p><div class="alert alert-danger"><i class="glyphicon glyphicon-warning-sign"></i> <strong>Atención: </strong>Después de eliminado no podrá ser recuperado y la información asociada se perderá.</div></p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="boton_eliminar">Eliminar</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
$(document).ready( function () {
  $('#mytable').DataTable({
    "language":{
      "url" :"//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },
    paging: false
  });
});

$("#AbrirModalReporte").click(function(){
  $("#ModalReporte").modal("show");
});

$("#FechaInicial").datetimepicker({
  locale: 'es',
  format: 'YYYY/MM/DD',
  autoClose: true
});

$("#FechaFinal").datetimepicker({
  locale: 'es',
  format: 'YYYY/MM/DD',
  autoClose: true
});

$("#FechaEstado").datetimepicker({
  locale: 'es',
  format: 'YYYY/MM/DD',
  autoClose: true
});

$("#GenerarReporte").click(function(){
  var fechaInicial = $("#FechaInicial").val();
  var fechaFinal = $("#FechaFinal").val();
  var estado = $("#Estado").val();
  $.post("/ordenproduccion/GenerarReporteOrtesis", {"fechaInicial": fechaInicial, "fechaFinal": fechaFinal, "estado": estado},
  function(data){
    var InformeExport = [];
    var opts = {
      headers: true,
      column: { style: { Font: { Bold: "1" } } },
    };
    $.each(data, function(index, value){
      InformeExport.push({
        Ortesis: value.nombre,
        Cantidad: value.cantidad
      });
    });
    alasql('SELECT * INTO XLSXML("Reporte ' + fechaInicial + ' - ' + fechaFinal +  '.xls",?) FROM ?', [opts, InformeExport]);
  });
});

$("#AbrirModalCrearOrden").click(function(){
  $("#ModalOrden").modal("show");
});

$(".estadoCliente").prop('disabled', true);
var ordenfecha = 0;
var estadofecha = 0;
$(".estadoPaciente").change(function(){
  var orden = $(this).parent().parent().children(".filaorden").children(".numeroorden").text();
  ordenfecha = orden;
  var estado = $(this).val();
  estadofecha = estado;
  $.post("/ordenproduccion/ActualizarEstadoOrden", {"orden": orden, "estado": estado},
  function(result){

    if (result!="") {
      $("#FechaEstado").val(result.fecha);
    }else {
      $("#FechaEstado").val("");
    }
    var nombreEstado = "";
    if (estado == 1) {
      nombreEstado = "Valoración";
    }else if (estado == 2) {
      nombreEstado = "Toma de medidas";
    }else if (estado == 3) {
      nombreEstado = "Entrenamiento";
    }else if (estado == 4) {
      nombreEstado = "Terminado";
    }else if (estado == 5) {
      nombreEstado = "Entregado";
    }else {
      nombreEstado = "Anulado";
    }
    $("#DatoEstadoPaciente").text(nombreEstado);
    $("#ModalFecha").modal("show");
  });
});

$("#GuardarFechaEstado").click(function(){
  var fechaEstadoPaciente = $("#FechaEstado").val();
  $.post("/ordenproduccion/GuardarFechaEstado", {"idOrden": ordenfecha, "estado": estadofecha, "fecha": fechaEstadoPaciente},
  function(result){
    console.log(result);
    $("#ModalFecha").modal("hide");
    bootbox.dialog({
      title: "Información",
      message: "Fecha actualizada exitosamente",
      buttons: {
        success: {
          label: "Cerrar",
          className: "btn-primary",
        }
      }
    });
  });
});

$("#idPaciente").select2();

$(".cambiarCliente").change(function(){
  var orden = $(this).parent().parent().children(".filaorden").children(".numeroorden").text();

  var idEmpresa = $(this).val();
  $.post("/ordenproduccion/CambiarClienteOrden", {"orden": orden, "idEmpresa": idEmpresa},
  function(){

  });
});

$(".eliminar_fila").click (
  function(){
    var enlace = $(this).attr("id");
    var id_eliminar = $(this).attr("data-id");    
    $(".fila_eliminar").html(id_eliminar);
    $(".id_elemento").val(id_eliminar);
    $("#boton_eliminar").attr("href", enlace);
  }
);

$(".consultar_fila").click(function(){
  var id = $(this).attr("id");
  $("#ImprimirDatos").empty();
  $.post("/ordenproduccion/ConsultarEstadosPaciente", {"idOrden": id},
  function(result){
    console.log(result);
    var html = "";
    $.each(result, function(index, value){
      if (value.estado == 1) {
        html += "<span><strong>Valoración:</strong> &nbsp;"+ value.fecha +"</span><br>";
      }else if (value.estado == 2) {
        html += "<span><strong>Toma de medidas:</strong> &nbsp;"+ value.fecha +"</span><br>";
      }else if (value.estado == 3) {
        html += "<span><strong>Entrenamiento:</strong> &nbsp;"+ value.fecha +"</span><br>";
      }else if (value.estado == 4) {
        html += "<span><strong>Terminado:</strong> &nbsp;"+ value.fecha +"</span><br>";
      }else if (value.estado == 5) {
        html += "<span><strong>Entregado:</strong> &nbsp;"+ value.fecha +"</span><br>";
      }else {
        html += "<span><strong>Anulado:</strong> &nbsp;"+ value.fecha +"</span><br>";
      }
    });
    $("#ImprimirDatos").append(html);
    $("#ModalMostrarEstados").modal("show");
  });
});

</script>
