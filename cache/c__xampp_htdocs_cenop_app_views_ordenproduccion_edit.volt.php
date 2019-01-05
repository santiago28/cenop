<div class="container col-xs-12" style="margin-top:40px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Órden de Producción E Historia</h4></center>
      </div>
      <div class="panel-body">
        <?= $this->getContent() ?>
        <?= $this->assets->outputCss() ?>
        <div style="list-style:none; width:100%" class="col-md-12">
          <div class="row">
            <div class="col-lg-3">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Ingrese OP" id="NumeroOP">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button" id="BuscarOP">Buscar</button>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div style="list-style:none; width:100%" class="col-md-12">
          <?= $this->tag->form(['ordenproduccion/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal', 'name' => 'formOrden']) ?>
          <br />
          <?= $this->tag->hiddenField(['idPaciente']) ?>
          <?= $this->tag->hiddenField(['idOrden']) ?>
          <?= $this->tag->hiddenField(['tipoTecnico']) ?>
          <div id="imprimir">
            <div class='seccion encabezado'>
              <div class="fila col3">
                <div style="width:10%;">
                  <?= $this->tag->image(['img/logo.jpg', 'alt' => '', 'style' => 'width:100%;']) ?>
                </div>
                <div style="width:75%;" class="center">
                  <h3>CENOP ORTESIS & PROTESIS</h3>
                  <h4>Formato Órden</h4>
                </div>
                <div style="width:15%;"></div>
              </div>
              <div class="fila col3">
                <div>
                  <span>Contacto:&nbsp;<?= $contacto ?></span>
                </div>
                <div>
                  <span>OP: &nbsp;<?= $op ?></span>
                </div>
                <div>
                  <span>Fecha Atención: &nbsp;<?= $fechaAtencion ?></span>
                </div>
              </div>
              <div class='fila center'><div style='margin-left:45%'>DATOS DEL PACIENTE</div></div>
              <div class='fila col2'>
                <div style='width:40%;'>Nombres y apellidos</div>
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
                <div style='width:45%;'><?= $this->tag->textField(['doctorRemite', 'type' => 'text', 'class' => 'form-control tipotecnico']) ?></div>
                <div style='width:20%;'>Código o licencia: </div>
                <div style='width:20%;'><?= $this->tag->textField(['codigoLicencia', 'type' => 'text', 'class' => 'form-control tipotecnico']) ?></div>
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
                      <?= $this->tag->checkField(['autorizacionServicio', 'value' => '1', 'class' => 'check']) ?>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox">
                    <label>
                      FORMULA
                      <?= $this->tag->checkField(['formula', 'value' => '1', 'class' => 'check']) ?>
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
                      <?= $this->tag->checkField(['historiaClinica', 'value' => '1', 'class' => 'check']) ?>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox">
                    <label>
                      CÉDULA
                      <?= $this->tag->checkField(['cedula', 'value' => '1', 'class' => 'check']) ?>
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
                      <?= $this->tag->checkField(['actaEntrega', 'value' => '1', 'class' => 'check']) ?>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox">
                    <label>
                      CÉDULA ACUDIENTE
                      <?= $this->tag->checkField(['cedulaAcudiente', 'value' => '1', 'class' => 'check']) ?>
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
                      <?= $this->tag->checkField(['copa', 'value' => '1', 'class' => 'check']) ?>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div>
                  <div class="checkbox" style="margin-left: 17px; width:280px;">
                    <?= $this->tag->textField(['fechaAutorizacion', 'type' => 'text', 'class' => 'form-control tipotecnico calendario', 'placeholder' => 'FECHA AUTORIZACIÓN']) ?>
                  </div>
                </div>
              </div>
              <div class='fila col2'>
                <div>
                  <div class="checkbox" style="margin-left: 17px; width:280px;">
                    <?= $this->tag->textField(['vencimientoAutorizacion', 'type' => 'text', 'class' => 'form-control tipotecnico calendario', 'placeholder' => 'VENCIMIENTO AUTORIZACIÓN']) ?>
                  </div>
                </div>
                <div>
                  <div class="checkbox" style="margin-left: 17px; width:280px;">
                    <?= $this->tag->textField(['nroFactura', 'type' => 'text', 'class' => 'form-control tipotecnico', 'placeholder' => 'FACTURA No']) ?>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:43%'>TOMA DE MEDIDAS</div></div>
              <div class='fila center'>
                <div style='margin: 0 auto;'>
                  <?= $this->tag->select(['tipoOrtesis', $tiposOrtesis, 'class' => 'form-control tipotecnico estadoPaciente']) ?>
                  <br/><br/>
                  
                  <img src="" id="imagenprotesis">
                </div>
              </div>
              <div id="medidas">
                <?php foreach ($querymedida as $medidas) { ?>
                <input type="hidden" name="idMedida[]" value="<?= $medidas->idMedida ?>">
                <div class="fila col2">
                  <div>
                    <div class="checkbox" style="margin-left: 17px; width:280px;">
                      <input type="text" name="nombreMedida[]" class="form-control tipotecnico" placeholder="NOMBRE MEDIDA" value="<?= $medidas->nombreMedida ?>">
                    </div>
                  </div>
                  <div>
                    <div class="checkbox" style="margin-left: 17px; width:280px;">
                      <input type="text" name="medida[]" class="form-control tipotecnico" placeholder="MEDIDA" value="<?= $medidas->medida ?>">
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="quitar-vista" style="justify-content: center; align-content: center;">
                <button class="btn btn-default col-md-12" id="AgregarCampos">Agregar campos</button>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>OBSERVACIONES</div></div>
              <div class='fila center'>
                <?= $this->tag->textArea(['observaciones', 'class' => 'form-control tipotecnico', 'rows' => '10', 'style' => 'margin-top:20px; margin-left:20px; width:97%; margin-bottom:20px;']) ?>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila col3e'>
                <div class='col2da'><span>Elaboró</span><?= $this->tag->textField(['elaboro', 'type' => 'text', 'class' => 'form-control tipotecnico']) ?></div>
                <div class='col2da'><span>Responsable de aprobación</span><?= $this->tag->textField(['responsableAprobacion', 'type' => 'text', 'class' => 'form-control tipotecnico']) ?></div>
                <div class='col2da'><span>Recibe</span><?= $this->tag->textField(['recibe', 'type' => 'text', 'class' => 'form-control tipotecnico']) ?><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e'>
                <div class='col2da'><span style='font-weight: normal;'></span></div>
                <div class='col2da'><span style='font-weight: normal;'></span></div>
                <div class='col2da'>Fecha<?= $this->tag->textField(['fechaRecibido', 'type' => 'text', 'class' => 'form-control tipotecnico calendario', 'id' => 'fieldFecharecibido', 'placeholder' => 'Fecha Recibido']) ?><span style='font-weight: normal;'></span></div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>CONTROL DE MATERIA PRIMA</div></div>
              <div class='fila col3e'>
                <div class='col2da'>NOMBRE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>LOTE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>CANTIDAD / MEDIDA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>RESPONSABLE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>FECHA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>SERIAL<span style='font-weight: normal;'></span></div>
                <div class='col2da' style="width:11%;">ELIMINAR<span style='font-weight: normal;'></span></div>
              </div>
              <div id="materiaprima">
                <?php foreach ($querymateria as $materia) { ?>
                <div class="fila col3e">
                  <input type="hidden" name="idMateria[]" value="<?= $materia->idMateria ?>">
                  <div class="col2da"><input type="text" name="nombreMateria[]" class="form-control tipotecnico" value="<?= $materia->nombre ?>"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="lote[]" class="form-control tipotecnico" value="<?= $materia->lote ?>"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="cantidad[]" class="form-control tipotecnico" value="<?= $materia->cantidad ?>"><span style="font-weight: normal;"></span></div>
                  
                  <div class="col2da"><?= $this->tag->select(['responsable[]', $listatecnicos, 'value' => $materia->responsable, 'class' => 'form-control cambiarCliente']) ?></div>
                  <div class="col2da"><input type="text" name="fechaMateria[]" class="form-control tipotecnico calendario" value="<?= $materia->fecha ?>"><span style="font-weight: normal;"></span></div>
                  <div class="col2da"><input type="text" name="serial[]" class="form-control tipotecnico" value="<?= $materia->serial ?>"><span style="font-weight: normal;"></span></div>
                  <div class="col2da" style="width:11%;"><a href="#eliminar_elemento" rel="tooltip" title="Eliminar" class="material-icons eliminar_fila" style="color:#757575; text-decoration: none;" data-toggle = "modal" id="<?= $this->url->get('ordenproduccion/deletemateria/' . $materia->idMateria) ?>">&#xE872;</a></div>
                </div>
                <?php } ?>
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
                      <input type="checkbox" class="seguimiento check" name="calificacion[0]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="seguimiento check" name="calificacion[0]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="seguimiento check" name="calificacion[0]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[0]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[0]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="medidas">
                <div class='col2da' style="width:38%;">MEDIDAS<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="medidas check" name="calificacion[1]" value="cumple"/>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="medidas check" name="calificacion[1]" value="nocumple"/>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="medidas check" name="calificacion[1]" value="na"/>
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[1]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[1]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="positivo">
                <div class='col2da' style="width:38%;">POSITIVO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="positivo check" name="calificacion[2]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="positivo check" name="calificacion[2]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="positivo check" name="calificacion[2]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[2]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[2]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="plastificado">
                <div class='col2da' style="width:38%;">PLASTIFICADO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="plastificado check" name="calificacion[3]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="plastificado check" name="calificacion[3]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="plastificado check" name="calificacion[3]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[3]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[3]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="montaje">
                <div class='col2da' style="width:38%;">MONTAJE<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="montaje check" name="calificacion[4]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="montaje check" name="calificacion[4]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="montaje check" name="calificacion[4]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[4]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[4]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="prueba1">
                <div class='col2da' style="width:38%;">PRUEBA - 1<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba1 check" name="calificacion[5]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba1 check" name="calificacion[5]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba1 check" name="calificacion[5]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[5]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[5]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="prueba2">
                <div class='col2da' style="width:38%;">PRUEBA - 2<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba2 check" name="calificacion[6]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba2 check" name="calificacion[6]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="prueba2 check" name="calificacion[6]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[6]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[6]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="laminado">
                <div class='col2da' style="width:38%;">LAMINADO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="laminado check" name="calificacion[7]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="laminado check" name="calificacion[7]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="laminado check" name="calificacion[7]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[7]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[7]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="solicitudComponente">
                <div class='col2da' style="width:38%;">SOLICITUD DE COMPONENTES</div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="solicitudComponente check" name="calificacion[8]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="solicitudComponente check" name="calificacion[8]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="solicitudComponente check" name="calificacion[8]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[8]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[8]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="ingresoComponentes">
                <div class='col2da' style="width:38%;">INGRESO DE COMPONENTES<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ingresoComponentes check" name="calificacion[9]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ingresoComponentes check" name="calificacion[9]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ingresoComponentes check" name="calificacion[9]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[9]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[9]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="ordenCompra">
                <div class='col2da' style="width:38%;">ÓRDEN DE COMPRA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenCompra check" name="calificacion[10]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenCompra check" name="calificacion[10]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenCompra check" name="calificacion[10]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[10]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[10]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="ordenServicios">
                <div class='col2da' style="width:38%;">ÓRDEN DE SERVICIO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenServicios check" name="calificacion[11]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenServicios check" name="calificacion[11]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="ordenServicios check" name="calificacion[11]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[11]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[11]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="autorizacionServicioL">
                <div class='col2da' style="width:38%;">AUTORIZACIÓN DE SERVICIO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="autorizacionServicioL check" name="calificacion[12]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="autorizacionServicioL check" name="calificacion[12]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="autorizacionServicioL check" name="calificacion[12]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[12]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[12]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="cotizacionEnviada">
                <div class='col2da' style="width:38%;">COTIZACIÓN ENVIADA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="cotizacionEnviada check" name="calificacion[13]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="cotizacionEnviada check" name="calificacion[13]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="cotizacionEnviada check" name="calificacion[13]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[13]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[13]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class='fila col3e' id="entregado">
                <div class='col2da' style="width:38%;">ENTREGADO<span style='font-weight: normal;'></span></div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="entregado check" name="calificacion[14]" value="cumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="entregado check" name="calificacion[14]" value="nocumple" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'>
                  <div class="checkbox">
                    <label style="padding-left: 75px;">
                      <input type="checkbox" class="entregado check" name="calificacion[14]" value="na" />
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                    </label>
                  </div>
                </div>
                <div class='col2da'><input type="text" name="fechaProceso[14]" class="form-control tipotecnico calendario"><span style='font-weight: normal;'></span></div>
                <div class='col2da'><input type="text" name="responsableSeguimiento[14]"  class="form-control tipotecnico"><span style='font-weight: normal;'></span></div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>ENTRENAMIENTO CON DISPOSITIVO</div></div>
              <div class='fila col2'>
                <div style='width:50%;'>Nombre Ortesis</div>
                <div><span></span></div>
              </div>

              <div class='fila col3e'>
                <div class='col2da' style="width:33%;">ACTIVIDAD<span style='font-weight: normal;'></span></div>
                <div class='col2da'>FECHA<span style='font-weight: normal;'></span></div>
                <div class='col2da'>TÉCNICO ENTRENADOR<span style='font-weight: normal;'></span></div>
              </div>
              <?php foreach ($queryentrenamiento as $entrenamiento) { ?>
              <div class='fila col3e'>
                <div class='col2da' style="width:33%;"><?= $entrenamiento->motivo ?><span style='font-weight: normal;'></span></div>
                <div class='col2da'><?= $entrenamiento->fechaCita ?><span style='font-weight: normal;'></span></div>
                <div class='col2da'><?= $entrenamiento->nombreOrtopedista ?><span style='font-weight: normal;'></span></div>
              </div>
              <?php } ?>
              <div class="clear"></div>
            </div>
            <div class="seccion">
              <div class='fila center'><div style='margin-left:45%'>HISTORIA DEL USUARIO</div></div>
              <div class='fila col2'>
                <div style='width:40%;'>NOMBRE</div>
                <div><span id="txtNombreH"></span></div>
              </div>
              <div class="fila col3">
                <div>DOCUMENTO DE IDENTIDAD</div>
                <div><span id="txtTipoDocumento"></span></div>
                <div>NÚMERO:&nbsp;<span id="txtNumeroDocumentoH"></span></div>
              </div>
              <div class='fila center'><div style='margin-left:45%'>DESCRIPCIÓN</div></div>
              <div class="fila center">
                <?= $this->tag->textArea(['historiaClinicaTexto', 'class' => 'form-control', 'rows' => '10', 'style' => 'margin-top:20px; margin-left:20px; width:97%; margin-bottom:20px;']) ?>

              </div>
              <div class="fila col2">
                <div></div>
                <div>
                  <?php if ($tipoTecnico == 2) { ?>
                  <?php if ($fotoFirma == '') { ?>
                  <button class="form-control tipotecnico" id="Firmar">Firmar</button>
                  <?php } else { ?>
                  <?= $this->tag->image(['files/' . $fotoFirma, 'class' => 'img-responsive']) ?>
                  <?php } ?>
                  <?php } else { ?>
                  <?= $this->tag->image(['files/' . $fotoFirma, 'class' => 'img-responsive']) ?>
                  <?php } ?>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <div class="form-group">
            <div class="boton-guardar" id="EnviarFormulario">
              <a class="material-icons" title="Guardar Información Orden"  style="color:white; text-decoration:none;">&#xE161;</a>
            </div>
          </div>
          <div class="form-group">
            <div class="boton-modal-cita" id="AgregarCita">
              <a class="material-icons" title="Programar Cita Entrenamiento"  style="color:white; text-decoration:none;">&#xE878;</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container col-xs-12" style="margin-top:20px;">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h4>Archivos Paciente</h4></center>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="text-align:center" colspan="4">CARGAS ARCHIVOS</th>
            </tr>
            <tr>
              <th>Nombre Archivo</th>
              <th>Fecha Carga</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($archivos as $archivos) { ?>
            <tr>
              <td><?= $this->tag->linkTo(['files/' . $archivos->nombreArchivo, $archivos->nombreArchivo, 'target' => '_blank']) ?></td>
              <td><?= $archivos->fechaCarga ?></td>
              <td>
                <button class="btn btn-default btn-sm" onclick="eliminar(<?= $archivos->idCarga ?>)" type="button" title="Inhabilitar Registros" style="height: 34px;">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="panel-footer">
        <div class="form-group" style='overflow:hidden;text-align:right; padding-right:60px;'>
          <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-primary" id="AbrirModalArchivo" name="button">Nuevo Archivo</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="valor[0]" value="0">
<input type="hidden" name="valor[1]" value="1">
<input type="hidden" name="valor[2]" value="2">
<input type="hidden" name="valor[3]" value="3">
<input type="hidden" name="valor[4]" value="4">
<input type="hidden" name="valor[5]" value="5">
<input type="hidden" name="valor[6]" value="6">
<input type="hidden" name="valor[7]" value="7">
<input type="hidden" name="valor[8]" value="8">
<input type="hidden" name="valor[9]" value="9">
<input type="hidden" name="valor[10]" value="10">
<input type="hidden" name="valor[11]" value="11">
<input type="hidden" name="valor[12]" value="12">
<input type="hidden" name="valor[13]" value="13">
<input type="hidden" name="valor[14]" value="14">

<div id="ModalCitasEntrenamiento" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= $this->tag->form(['Ordenproduccion/createAgendaEntrenamiento', 'method' => 'post', 'autocomplete' => 'off']) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Asignar Cita Entrenamiento</h4>
      </div>
      <div class="modal-body">
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
          <label>Actividad</label>
          <textarea name="motivo" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary col-md-12" id="BuscarTecnicos">Buscar Técnicos Disponibles</button>
        </div>
        <div class="form-group">
          <br><br>
          <label>Técnico Entrenador</label>
          <?= $this->tag->hiddenField(['idPaciente']) ?>
          <?= $this->tag->hiddenField(['idOrden']) ?>
          <select id="idOrtopedistaOrden" name="idOrtopedistaOrden"  class="form-control tipotecnico">

          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" id="GuardarCitaEntrenamiento" value="Guardar">
      </div>
    </form>
  </div>
</div>
</div>

<div id="ModalArchivos" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= $this->tag->form(['Ordenproduccion/SubirArchivo', 'method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) ?>
      <?= $this->tag->hiddenField(['idOrden']) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subir Archivos Paciente</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Archivo</label>
          <input type="file" class="form-control tipotecnico" name="files[]" multiple>
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

<div id="ModalFirma" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= $this->tag->form(['Ordenproduccion/SubirFirma', 'method' => 'post', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) ?>
      <?= $this->tag->hiddenField(['idOrden']) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subir Firma Terapeuta</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Archivo</label>
          <input type="file" class="form-control tipotecnico" name="files[]" multiple>
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

<div class="modal fade" id="eliminar_elemento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
      </div>
      <div class="modal-body">
        <p>¿Está seguro de que desea eliminar la materia prima?</p>
        <p><div class="alert alert-danger"><i class="glyphicon glyphicon-warning-sign"></i> <strong>Atención: </strong>Después de eliminado no podrá ser recuperado y la información asociada se perderá.</div></p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="boton_eliminar">Eliminar</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?= $this->assets->outputJs() ?>
<script type="text/javascript">

$(document).ready(function(){
  var valor = $("#tipoOrtesis").val();
  MostrarImagen(valor);
  var tipoTecnico = $("#tipoTecnico").val();
  if (tipoTecnico == 2) {
    $(".tipotecnico").prop('readonly', true);
    $(".check").attr("disabled", true);
  }
});




var idOrden = $("#idOrden").val();
var tipoOrtesis = $("#tipoOrtesis").val();

$.get("<?php echo $this->url->get('Ordenproduccion/BuscarDatosOrden'); ?>/", { "idOrden": idOrden}, function(data){

  var responsable = data[0];
  var fechaProceso = data[1];
  var calificacion = data[2];
  var paciente = data[3];
  var nombreActividad = data[4];
  $("#txtNombre").text(paciente.nombre + " "+ paciente.apellido);
  $("#txtNombreH").text(paciente.nombre + " "+ paciente.apellido);
  $("#txtNumeroDocumento").text(paciente.numeroDocumento);
  $("#txtCelular").text(paciente.celular);
  $("#txtTelefono").text(paciente.telefono);
  $("#txtDireccion").text(paciente.direccion);
  $("#txtMunicipio").text(paciente.nombreMunicipio);
  $("#txtDepartamento").text(paciente.nombreDepartamento);
  $("#txtEdad").text(paciente.edad);
  $("#txtEstatura").text(paciente.estatura);
  $("#txtPeso").text(paciente.peso);
  $("#txtTipoDocumento").text(paciente.nombreTipoDocumento);
  $("#txtNumeroDocumentoH").text(paciente.numeroDocumento);

  

  


  for (var i = 0; i < nombreActividad.length; i++) {

    $('input[name="responsableSeguimiento['+nombreActividad[i]+']"]').val(responsable[i]);

    $('input[name="fechaProceso['+nombreActividad[i]+']"]').val(fechaProceso[i]);
    var checkedString = $('input[name="calificacion['+ nombreActividad[i] + ']"').map(function() { return this }).get();

    for (var j = 0; j < checkedString.length; j++) {
      if ($(checkedString[j]).val() == calificacion[i]) {
        $(checkedString[j]).prop('checked', true);
      }
    }
  }

  
});

function MostrarImagen (id)
{

  var urlimagen = "";
  if (id == 1) {
    urlimagen = "/cenop/img/OrtesisCalzado.png";
  }else if (id == 2) {
    urlimagen = "/cenop/img/OrtesisColumna.png";
  }else if (id == 3) {
    urlimagen = "/cenop/img/OrtesisFerulaMilgran.png";
  }else if (id ==  4) {
    urlimagen = "/cenop/img/OrtesisMiembroInferior.png";
  }else if (id == 5) {
    urlimagen = "/cenop/img/OrtesisMiembroSuperior.png";
  }else if (id == 6) {
    urlimagen = "/cenop/img/OrtesisSedentacion.png";
  }else if (id == 7) {
    urlimagen = "/cenop/img/ProtesisMiembroInferiorTransfemoral.png";
  }else if (id == 8) {
    urlimagen = "/cenop/img/ProtesisMiembroInferiorTranstibial.png";
  }else if(id == 9) {
    urlimagen = "/cenop/img/ProtesisMiembroSuperior.png";
  }else if(id == 10) {
    urlimagen = "/cenop/img/OrtesisPlantilla.png";
  }else if(id == 11) {
    urlimagen = "/cenop/img/OrtesisInsumo.png";
  }else {
    urlimagen = "";
  }

  $("#imagenprotesis").attr("src", urlimagen);

}

$("#tipoOrtesis").change(function(){
  var valor = $(this).val();
  MostrarImagen(valor);
});

$("#EnviarFormulario").click(function(){
  document.formOrden.submit()
});

$("#AgregarCita").click(function(){
  $("#ModalCitasEntrenamiento").modal("show");
});

$("#AbrirModalArchivo").click(function(){
  $("#ModalArchivos").modal("show");
});

$("#Firmar").click(function(e){
  e.preventDefault();
  $("#ModalFirma").modal("show");
});

$("#BuscarOP").click(function(){
  var op = $("#NumeroOP").val();
  $.post("<?php echo $this->url->get('ordenproduccion/Consultaropxid'); ?>/", { "op": op}, function(result){
    if (result == null) {
      bootbox.dialog({
        title: "Información",
        message: "La orden de producción no existe",
        buttons: {
          success: {
            label: "Cerrar",
            className: "btn-primary",
          }
        }
      });
    }else {
      window.location.replace(result);
    }
  });
  window.location.replace();
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

function eliminar(idCarga){

  $.get("<?php echo $this->url->get('ordenproduccion/EliminarCarga'); ?>/", { "idCarga": idCarga}, function(data){
    if (data == "OK") {
      location.reload();
    }
  });
}

</script>
