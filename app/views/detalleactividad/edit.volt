<div class="container col-xs-12" style="margin-top:40px;">
  {{ content() }}
  {{ assets.outputCss() }}
  <div style="list-style:none; width:100%" class="col-md-12">
    {{ form("detalleactividad/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <br>
    {{ hidden_field("idActividad") }}
    {{ hidden_field("idOrden") }}
    <div id="imprimir">
      <div class="seccion encabezado">
        <div class='fila col3'>
          <div style="width:15%;"><center>{{ image("img/logo.jpg", "style": "width:100px;") }}</certer>
          </div>
          <div style='width:70%;'><h3><center>REGISTRO DE ACTIVIDADES AL USUARIO</certer></h3>
          </div>
          <div style="width:15%;">
            {{ text_field("codigo", "class" : "form-control","style": "height:25px; margin-top:2px;", "placeholder":"Código") }}
            {{ text_field("version", "class" : "form-control","style": "height:25px; margin-top:2px;", "placeholder":"Versión") }}
            {{ text_field("fecha", "class" : "form-control calendario","style": "height:25px; margin-top:2px;", "placeholder":"Fecha") }}
          </div>
        </div>
        <div class='fila col2'>
          <div>NOMBRES: <span id="txtNombre"></span></div>
          <div><span>DOCUMENTO DE IDENTIDAD</span></div>
        </div>
        <div class='fila col2'>
          <div>APELLIDOS:  <span id="txtApellido"></span></div>
          <div><span id="txtNumeroDocumento"></span></div>
        </div>
        <div class='fila col2'>
          <div>DIRECCIÓN: <span id="txtDireccion"></span></div>
          <div>OP: {{op}}</div>
        </div>
        <div class='fila col2'>
          <div>CIUDAD:  <span id="txtMunicipio"></span></div>
          <div>TELÉFONOS: <span id="txtTelefono"></span></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="seccion">
        <div class='fila center'><div style="margin-left:38%;">1. PRUEBA DE PRODUCTO: ORTESIS <input type="checkbox" name="tipo" value="1"> PROTESIS <input type="checkbox" name="tipo" value="2"></div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:50%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
          <div class='col2da'>SI<span style='font-weight: normal;'></span></div>
          <div class='col2da'>NO<span style='font-weight: normal;'></span></div>
          <div class='col2da'>OBSERVACIÓN<span style='font-weight: normal;'></span></div>
        </div>
        <div class='fila col3e' id="montaje">
          <div class='col2da' style="width:50%;">1.1 Se realiza el montaje de los componentes del dispositivo</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="montaje check" name="calificacion[0]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="montaje check" name="calificacion[0]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[0]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="verificacion">
          <div class='col2da' style="width:50%;">1.2 Verificación de altura y dimensiones con el usuario</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="seguimiento check" name="calificacion[0]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="verificacion check" name="calificacion[1]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[1]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3'>
          <div>FECHA</div>
          <div>FIRMA TÉCNICO</div>
          <div>FIRMA USUARIO</div>
        </div>
        <div class='fila col3'>
          <div>.</div>
          <div>.</div>
          <div>.</div>
        </div>
        <div class='fila center'><div style="margin-left:45%;">2. ADAPTACIÓN DEL DISPOSITIVO</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:50%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
          <div class='col2da'>SI<span style='font-weight: normal;'></span></div>
          <div class='col2da'>NO<span style='font-weight: normal;'></span></div>
          <div class='col2da'>OBSERVACIÓN<span style='font-weight: normal;'></span></div>
        </div>
        <div class='fila col3e' id="alineacionestatica">
          <div class='col2da' style="width:50%;">2.1 Se realiza alineación estatica con el usuario</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="alineacionestatica check" name="calificacion[2]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="alineacionestatica check" name="calificacion[2]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[2]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="alineaciondinamica">
          <div class='col2da' style="width:50%;">2.2 Se realiza alineación dinamica con el usuario</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="alineaciondinamica check" name="calificacion[3]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="alineaciondinamica check" name="calificacion[3]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[3]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="puntosapoyo">
          <div class='col2da' style="width:50%;">2.3 Puntos de apoyo</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="puntosapoyo check" name="calificacion[4]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="puntosapoyo check" name="calificacion[4]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[4]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="zona">
          <div class='col2da' style="width:50%;">2.4 Zonas y puntos de presión</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="zona check" name="calificacion[5]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="zona check" name="calificacion[5]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[5]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="marcha">
          <div class='col2da' style="width:50%;">2.5 Realiza marcha satisfactoriamente</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="marcha check" name="calificacion[6]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="marcha check" name="calificacion[6]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[6]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="comodidad">
          <div class='col2da' style="width:50%;">2.6 Expresa comodidad al usarlo</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="comodidad check" name="calificacion[7]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="comodidad check" name="calificacion[7]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[7]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3'>
          <div>FECHA</div>
          <div>FIRMA TÉCNICO</div>
          <div>FIRMA USUARIO</div>
        </div>
        <div class='fila col3'>
          <div>.</div>
          <div>.</div>
          <div>.</div>
        </div>
        <div class='fila center'><div style="margin-left:45%;">3. VERIFICACIÓN</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:50%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
          <div class='col2da'>SI<span style='font-weight: normal;'></span></div>
          <div class='col2da'>NO<span style='font-weight: normal;'></span></div>
          <div class='col2da'>OBSERVACIÓN<span style='font-weight: normal;'></span></div>
        </div>
        <div class='fila col3e' id="altura">
          <div class='col2da' style="width:50%;">3.1 Altura adecuada</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="altura check" name="calificacion[8]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="altura check" name="calificacion[8]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[8]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="condicion">
          <div class='col2da' style="width:50%;">3.2 La condición del dispositivo cumple con el objetivo</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="condicion check" name="calificacion[9]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="condicion check" name="calificacion[9]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[9]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="apariencia">
          <div class='col2da' style="width:50%;">3.3 La apariencia del dispositivo cumple con lo solicitado</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="apariencia check" name="calificacion[10]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="apariencia check" name="calificacion[10]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[10]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="adaptacion">
          <div class='col2da' style="width:50%;">3.4 La adaptación del producto es conforme</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="adaptacion check" name="calificacion[11]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="adaptacion check" name="calificacion[11]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[11]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3'>
          <div>FECHA</div>
          <div>FIRMA TÉCNICO</div>
          <div>FIRMA USUARIO</div>
        </div>
        <div class='fila col3'>
          <div>.</div>
          <div>.</div>
          <div>.</div>
        </div>
        <div class='fila center'><div style="margin-left:45%;">4. ENTRENAMIENTO</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:50%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
          <div class='col2da'>SI<span style='font-weight: normal;'></span></div>
          <div class='col2da'>NO<span style='font-weight: normal;'></span></div>
          <div class='col2da'>OBSERVACIÓN<span style='font-weight: normal;'></span></div>
        </div>
        <div class='fila col3e' id="tiempoentrenamiento">
          <div class='col2da' style="width:50%;">4.1 El tiempo empleado en entrenamiento fue satisfactorio</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="tiempoentrenamiento check" name="calificacion[12]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="tiempoentrenamiento check" name="calificacion[12]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[12]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="instruccionesfunc">
          <div class='col2da' style="width:50%;">4.2 Se dieron instrucciones de funcionamiento al usuario</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="instruccionesfunc check" name="calificacion[13]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="instruccionesfunc check" name="calificacion[13]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[13]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="instruccionesuso">
          <div class='col2da' style="width:50%;">4.3 Se dieron instrucciones de uso y cuidado al usuario</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="instruccionesuso check" name="calificacion[14]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="instruccionesuso check" name="calificacion[14]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[14]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="infomantenimiento">
          <div class='col2da' style="width:50%;">4.4 Se dio información del mantenimiento del dispositivo</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="infomantenimiento check" name="calificacion[15]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="infomantenimiento check" name="calificacion[15]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[15]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3'>
          <div>FECHA</div>
          <div>FIRMA TÉCNICO</div>
          <div>FIRMA USUARIO</div>
        </div>
        <div class='fila col3'>
          <div>.</div>
          <div>.</div>
          <div>.</div>
        </div>
        <div class='fila center'><div style="margin-left:45%;">5. ENTREGA</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:50%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
          <div class='col2da'>SI<span style='font-weight: normal;'></span></div>
          <div class='col2da'>NO<span style='font-weight: normal;'></span></div>
          <div class='col2da'>OBSERVACIÓN<span style='font-weight: normal;'></span></div>
        </div>
        <div class='fila col3e' id="actaentrega">
          <div class='col2da' style="width:50%;">5.1 Se diligencia acta de entrega del dispositivo medico</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="actaentrega check" name="calificacion[16]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="actaentrega check" name="calificacion[16]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[16]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="producto">
          <div class='col2da' style="width:50%;">5.2. Se evalua el producto por parte del equipo interdisciplinario interno</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="producto check" name="calificacion[17]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="producto check" name="calificacion[17]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[17]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="manual">
          <div class='col2da' style="width:50%;">5.3 Se entrega manual de uso y de garantia al usuario</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="manual check" name="calificacion[18]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="manual check" name="calificacion[18]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[18]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3'>
          <div>FECHA</div>
          <div>FIRMA TÉCNICO</div>
          <div>FIRMA USUARIO</div>
        </div>
        <div class='fila col3'>
          <div>.</div>
          <div>.</div>
          <div>.</div>
        </div>
        <div class='fila center'><div style="margin-left:45%;">6. POST ADAPTACIÓN</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:50%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
          <div class='col2da'>SI<span style='font-weight: normal;'></span></div>
          <div class='col2da'>NO<span style='font-weight: normal;'></span></div>
          <div class='col2da'>OBSERVACIÓN<span style='font-weight: normal;'></span></div>
        </div>
        <div class='fila col3e' id="apliacacion">
          <div class='col2da' style="width:50%;">6.1 Aplicación de encuesta de servicio y producto</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="apliacacion check" name="calificacion[19]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="apliacacion check" name="calificacion[19]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[19]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="programacion">
          <div class='col2da' style="width:50%;">6.2 Programación de mantenimiento preventivo</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="programacion check" name="calificacion[20]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="programacion check" name="calificacion[20]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[20]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="solicitudgarantia">
          <div class='col2da' style="width:50%;">6.3 Solicitud de Garantía</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="solicitudgarantia check" name="calificacion[21]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="solicitudgarantia check" name="calificacion[21]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[21]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3e' id="solicituddevolucion">
          <div class='col2da' style="width:50%;">6.4 Solicitud de Devolución</div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="solicituddevolucion check" name="calificacion[22]" value="si" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da'>
            <div class="checkbox">
              <label style="padding-left: 110px;">
                <input type="checkbox" class="solicituddevolucion check" name="calificacion[22]" value="no" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class="col2da">
            {{text_area("observacion[22]", "class" : "form-control")}}
          </div>
        </div>
        <div class='fila col3'>
          <div>FECHA</div>
          <div>FIRMA TÉCNICO</div>
          <div>FIRMA USUARIO</div>
        </div>
        <div class='fila col3'>
          <div>.</div>
          <div>.</div>
          <div>.</div>
        </div>
        <div class="clear"></div>
      </div>
      {{ submit_button('Guardar', 'class': 'btn btn-primary') }}
      <br><br>
    </div>
  </form>
</div>
</div>
{{ assets.outputJs() }}
<script type="text/javascript">
var idActividad = $("#idActividad").val();
$.get("<?php echo $this->url->get('Detalleactividad/BuscarDatosActividad'); ?>/", { "idActividad": idActividad}, function(data){
  var dato = data[0];
  var observacion = data[1];
  var nombreActividad = data[2];
  for (var i = 0; i < nombreActividad.length; i++) {
    $('textarea[name="observacion['+nombreActividad[i]+']"]').val(observacion[i]);
    var checkedString = $('input[name="calificacion['+ nombreActividad[i] + ']"').map(function() { return this }).get();
    for (var j = 0; j < checkedString.length; j++) {
      if ($(checkedString[j]).val() == dato[i]) {
        $(checkedString[j]).prop('checked', true);
      }
    }
  }
});

setTimeout(function(){
  var idOrden = $("#idOrden").val();
  $.get("<?php echo $this->url->get('Ordenproduccion/BuscarDatosOrden'); ?>/", { "idOrden": idOrden}, function(data){
    console.log(data);
    var paciente = data[3];
    $("#txtNombre").text(paciente.nombre);
    $("#txtApellido").text(paciente.apellido);
    $("#txtNombreH").text(paciente.nombre + " "+ paciente.apellido);
    $("#txtNumeroDocumento").text(paciente.numeroDocumento);
    $("#txtCelular").text(paciente.celular);
    $("#txtTelefono").text(paciente.telefono + " - " + paciente.celular);
    $("#txtDireccion").text(paciente.direccion);
    $("#txtMunicipio").text(paciente.nombreMunicipio);
  });
},500);
</script>
