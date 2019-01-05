<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Órden de Producción E Historia</h4></center>
      </div>
      <div class="panel-body">
        <div class="col-md-12 quitar-vista">
          <div class="input-group col-md-4" style="float:right;">
            <input type="text" class="form-control" id="txtDocumentoPaciente" placeholder="Ingrese Documento Paciente">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="BuscarPaciente">Buscar</button>
            </span>
          </div>
        </div>
        {{ content() }}
        {{ assets.outputCss() }}
        <div style="list-style:none; width:100%" class="col-md-12">
          {{ form("ordenproduccion/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
          <br />
          {{ hidden_field("idPaciente") }}
          <div id="imprimir">
            <div class='seccion encabezado'>
              <div class='fila center'><div style='margin-left:45%'>DATOS DEL PACIENTE</div></div>
              <div class='fila col2'>
                <div style='width:40%;'>Nombre y apellidos</div>
                <div><span id="txtNombre"></span></div>
              </div>
              <div class='fila col3'>
                <div>Documento de identidad: <span id="txtNumeroDocumento"></span></div>
                <div>CEL: <span id="txtCelular"></span></div>
                <div>TEL: <span id="txtTelefono"></span></div>
              </div>
              <div class='fila col3'>
                <div>Dirección: <span id="txtDireccion"></span></div>
                <div>Departamento: <span id="txtDepartamento"></span></div>
                <div>Ciudad: <span id="txtMunicipio"></span></div>
              </div>
              <div class='fila col3'>
                <div>Edad: <span id="txtEdad"></span></div>
                <div>Estatura: <span id="txtEstatura"></span> mts.</div>
                <div>Peso: <span id="txtPeso"></span> kg.</div>
              </div>
              <div class='fila col3'>
                <div style='width:15%;'>Doctor(a)</div>
                <div style='width:60%;'></div>
                <div style='width:25%;'>Código o licencia: </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:43%'>DOCUMENTOS REQUERIDOS</div></div>
              <div class='fila col2'>
                <div>
                  <div class="checkbox">
                    <label>
                      AUTORIZACIÓN DE SERVICIO
                      {{ check_field('autorizacionServicio', 'value':'1') }}
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox">
                    <label>
                      FORMULA
                      {{ check_field('formula', 'value':'1') }}
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class='fila col2'>
                <div>
                  <div class="checkbox">
                    <label>
                      HISTORIA CL
                      {{ check_field('historiaClinica', 'value':'1') }}
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox">
                    <label>
                      CÉDULA
                      {{ check_field('cedula', 'value':'1') }}
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class='fila col2'>
                <div>
                  <div class="checkbox">
                    <label>
                      ACTA DE ENTREGA
                      {{ check_field('actaEntrega', 'value':'1') }}
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox">
                    <label>
                      CÉDULA ACUDIENTE
                      {{ check_field('cedulaAcudiente', 'value':'1') }}
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class='fila col2'>
                <div>
                  <div class="checkbox">
                    <label>
                      COPA
                      {{ check_field('copa', 'value':'1') }}
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox" style="margin-left: 17px; width:280px;">
                    {{ text_field("fechaAutorizacion", "type" : "text", "class" : "form-control calendario", "placeholder" : "FECHA AUTORIZACIÓN") }}
                  </div>
                </div>
              </div>
              <div class='fila col2'>
                <div>
                  <div class="checkbox" style="margin-left: 17px; width:280px;">
                    {{ text_field("vencimientoAutorizacion", "type" : "text", "class" : "form-control calendario", "placeholder" : "VENCIMIENTO AUTORIZACIÓN") }}
                  </div>
                </div>
                <div>
                  <div class="checkbox" style="margin-left: 17px; width:280px;">
                    {{ text_field("nroFactura", "type" : "text", "class" : "form-control", "placeholder" : "FACTURA No") }}
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:43%'>TOMA DE MEDIDAS</div></div>
              <div id="medidas">
                <div class="fila col2">
                  <div>
                    <div class="checkbox" style="margin-left: 17px; width:280px;">
                      <input type="text" name="nombreMedida[]" class="form-control" placeholder="NOMBRE MEDIDA">
                    </div>
                  </div>
                  <div>
                    <div class="checkbox" style="margin-left: 17px; width:280px;">
                      <input type="text" name="medida[]" class="form-control" placeholder="MEDIDA">
                    </div>
                  </div>
                </div>
              </div>
              <div class="quitar-vista" style="justify-content: center; align-content: center;">
                <button class="btn btn-default col-md-12" id="AgregarCampos">Agregar campos</button>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>OBSERVACIONES</div></div>
              {{ text_area('observaciones', "class" : "form-control", "rows": "10", "style": "margin-top:50px; margin-left:20px; width:97%; margin-bottom:20px;") }}
            </div>
            <div class="seccion">
              <div class='fila col3e'>
                <div class='col2da'>Elaboró<span style='font-weight: normal;'></span></div>
                <div class='col2da'>responsable de aprobación<span style='font-weight: normal;'></span></div>
                <div class='col2da'>Recibe<span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e'>
                <div class='col2da'><span style='font-weight: normal;'></span></div>
                <div class='col2da'><span style='font-weight: normal;'></span></div>
                <div class='col2da'>{{ text_field("fechaRecibido", "type" : "date", "class" : "form-control", "id" : "fieldFecharecibido", "placeholder": "Fecha Recibido") }}<span style='font-weight: normal;'></span></div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>CONTROL DE MATERIA PRIMA</div></div>
              <div class='fila col3e'>
                <div class='col2da'>NOMBRE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>LOTE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>CANTIDAD / MEDIDA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>responsable<span style='font-weight: normal;'></span></div>
                <div class='col2da'>FECHA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>SERIAL<span style='font-weight: normal;'></span></div>
              </div>
              <div id="materiaprima">
                <div class="fila col3e">
                  <div class="col2da"><input type="text" name="nombreMateria[]" class="form-control"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="lote[]" class="form-control"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="cantidad[]" class="form-control"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="responsable[]" class="form-control"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="fechaMateria[]" class="form-control calendario"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="serial[]" class="form-control"><span style="font-weight: normal;"></span></div>
                </div>
              </div>
              <div class="quitar-vista" style="justify-content: center; align-content: center;">
                <button class="btn btn-default col-md-12" id="AgregarCamposMateria">Agregar campos</button>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>SEGUIMIENTO AL USUARIO</div></div>
              <div class='fila col3e'>
                <div class='col2da' style="width:38%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
                <div class='col2da'>CUMPLE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>NO CUMPLE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>N/A<span style='font-weight: normal;'></span></div>
                <div class='col2da'>FECHA DE PROCESO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>RESPONSABLE<span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e'id="seguimiento">
                <div class='col2da' style="width:38%;">SEGUIMIENTO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="seguimiento" name="calificacion[0]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="seguimiento" name="calificacion[0]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="seguimiento" name="calificacion[0]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="medidas">
                <div class='col2da' style="width:38%;">MEDIDAS<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="medidas" name="calificacion[1]" value="cumple"/>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="medidas" name="calificacion[1]" value="nocumple"/>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="medidas" name="calificacion[1]" value="na"/>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="positivo">
                <div class='col2da' style="width:38%;">POSITIVO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="positivo" name="calificacion[2]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="positivo" name="calificacion[2]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="positivo" name="calificacion[2]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="plastificado">
                <div class='col2da' style="width:38%;">PLASTIFICADO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="plastificado" name="calificacion[3]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="plastificado" name="calificacion[3]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="plastificado" name="calificacion[3]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="montaje">
                <div class='col2da' style="width:38%;">MONTAJE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="montaje" name="calificacion[4]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="montaje" name="calificacion[4]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="montaje" name="calificacion[4]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="prueba1">
                <div class='col2da' style="width:38%;">PRUEBA - 1<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba1" name="calificacion[5]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba1" name="calificacion[5]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba1" name="calificacion[5]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="prueba2">
                <div class='col2da' style="width:38%;">PRUEBA - 2<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba2" name="calificacion[6]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba2" name="calificacion[6]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba2" name="calificacion[6]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="laminado">
                <div class='col2da' style="width:38%;">LAMINADO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="laminado" name="calificacion[7]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="laminado" name="calificacion[7]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="laminado" name="calificacion[7]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="solicitudComponente">
                <div class='col2da' style="width:38%;">SOLICITUD DE COMPONENTES</div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="solicitudComponente" name="calificacion[8]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="solicitudComponente" name="calificacion[8]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="solicitudComponente" name="calificacion[8]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="ingresoComponentes">
                <div class='col2da' style="width:38%;">INGRESO DE COMPONENTES<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ingresoComponentes" name="calificacion[9]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ingresoComponentes" name="calificacion[9]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ingresoComponentes" name="calificacion[9]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="ordenCompra">
                <div class='col2da' style="width:38%;">ÓRDEN DE COMPRA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenCompra" name="calificacion[10]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenCompra" name="calificacion[10]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenCompra" name="calificacion[10]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="ordenServicios">
                <div class='col2da' style="width:38%;">ÓRDEN DE SERVICIO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenServicios" name="calificacion[11]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenServicios" name="calificacion[11]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenServicios" name="calificacion[11]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="autorizacionServicioL">
                <div class='col2da' style="width:38%;">AUTORIZACIÓN DE SERVICIO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="autorizacionServicioL" name="calificacion[12]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="autorizacionServicioL" name="calificacion[12]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="autorizacionServicioL" name="calificacion[12]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="cotizacionEnviada">
                <div class='col2da' style="width:38%;">COTIZACIÓN ENVIADA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="cotizacionEnviada" name="calificacion[13]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="cotizacionEnviada" name="calificacion[13]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="cotizacionEnviada" name="calificacion[13]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="entregado">
                <div class='col2da' style="width:38%;">ENTREGADO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="entregado" name="calificacion[14]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="entregado" name="calificacion[14]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="entregado" name="calificacion[14]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[]" class="form-control calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[]" class="form-control"><span style='font-weight: normal;'></span></div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>ENTRENAMIENTO CON DISPOSITIVO</div></div>
              <div class='fila col2'>
                <div style='width:40%;'>Nombre Ortesis</div>
                <div><span></span></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              {{ submit_button('Save', 'class': 'btn btn-default') }}
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{ assets.outputJs() }}
