{{ content() }}
<div class="container col-xs-12" style="margin-top:40px;">
  {% if tipoUsuario == 0 %}
  <div class="col-md-3" style="padding-right:0px;">
    <button class="btn btn-primary coord" style="width:100%; height:42px;" id="AbrirModalCitas">Asignar Cita</button>
  </div>
  <div class="col-md-3" style="padding-right:0px;">
    <button class="btn btn-primary coord" style="width:100%; height:42px;" id="AbrirModalEliminar">Eliminar Cita</button>
  </div>
  {% endif %}
  <div class="col-md-12" id="panel1">
    <br />
    <div class="panel panel-default">
      <div id='wrap' class="panel-body">
        <div id='calendar'></div>
      </div>
    </div>
    <div style='clear:both'></div>
  </div>
</div>
<div id="ModalEliminarCitas" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Cita</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Citas</label>
          <select id="idCitas" name="idCitas"  class="form-control">

          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" id="EliminarCita" value="Eliminar">
      </div>
    </div>
  </div>
</div>
<div id="ModalCitas" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      {{ form("Agenda/create", "method":"post", "autocomplete" : "off") }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Asignar Cita</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Documento Paciente</label>
          <div class="input-group">
            <input type="text" class="form-control" id="txtDocumentoPaciente">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="BuscarPaciente">Buscar</button>
            </span>
          </div>
        </div>
        <div class="col-md-12" style="padding:0px;" id="DatosPaciente">
          <div class="col-md-6"  style="padding-right:1px; padding-left:0px;">
            <div class="form-group">
              <input type="hidden" name="idPaciente" id="idPaciente">
              <label>Nombre</label>
              <input type="text" value="" id="txtNombre" disabled class="form-control" />
            </div>
          </div>
          <div class="col-md-6"  style="padding-left:1px; padding-right:0px;">
            <div class="form-group">
              <label>Teléfono</label>
              <input type="text" value="" id="txtTelefono" disabled class="form-control" />
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Fecha Cita</label>
          <input class="form-control calendario" id="txtFechaCita" name="fechaCita">
        </div>
        <div class="col-md-12" style="padding:0px;" id="DatosPaciente">
          <div class="col-md-6"  style="padding-right:1px; padding-left:0px;">
            <div class="form-group">
              <label>Hora Inicio</label>
              <input type="text" id="txtHoraInicio" class="form-control hora" name="horaInicio" />
            </div>
          </div>
          <div class="col-md-6"  style="padding-left:1px; padding-right:0px;">
            <div class="form-group">
              <label>Hora Fin</label>
              <input type="text" id="txtHoraFin"  class="form-control hora" name="horaFin" />
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Motivo</label>
          <textarea name="motivo" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Cliente</label>
          <select id="idEmpresa" name="idEmpresa"  class="form-control">
            <option value="0">No Remitente</option>
            {% for empresa in empresas %}
            <option value="{{ empresa.idEmpresa }}">{{ empresa.nombre }}</option>
            {% endfor  %}
          </select>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary col-md-12" id="BuscarTecnicos">Buscar Técnicos Disponibles</button>
        </div>
        <div class="form-group">
          <br/><br/>
          <label>Ortopedista - Técnico</label>
          <select id="idOrtopedista" name="idOrtopedista"  class="form-control">

          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" id="GuardarCita" value="Guardar">
      </div>
    </form>
  </div>
</div>
</div>
{{ assets.outputJs() }}
