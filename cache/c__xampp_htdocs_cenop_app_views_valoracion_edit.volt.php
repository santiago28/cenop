<div class="container col-xs-12" style="margin-top:40px;">
  <?= $this->getContent() ?>
  <?= $this->assets->outputCss() ?>
  <div style="list-style:none; width:100%" class="col-md-12">
    <?= $this->tag->form(['valoracion/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    <br>
    <?= $this->tag->hiddenField(['idValoracion']) ?>
    <?= $this->tag->hiddenField(['dispositivomedico']) ?>
    <div id="imprimir">
      <div class="seccion encabezado">
        <div class='fila col3'>
          <div style="width:15%;"><center><?= $this->tag->image(['img/logo.jpg', 'style' => 'width:100px;']) ?></certer>
          </div>
          <div style='width:70%;'><h3><center>VALORACIÓN INTEGRAL DEL USUARIO</certer></h3>
          </div>
          <div style="width:15%;">
            <?= $this->tag->textField(['codigo', 'class' => 'form-control', 'style' => 'height:25px; margin-top:2px;', 'placeholder' => 'Código']) ?>
            <?= $this->tag->textField(['version', 'class' => 'form-control', 'style' => 'height:25px; margin-top:2px;', 'placeholder' => 'Versión']) ?>
            <?= $this->tag->textField(['fecha', 'class' => 'form-control calendario', 'style' => 'height:25px; margin-top:2px;', 'placeholder' => 'Fecha']) ?>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="seccion">
        <div class='fila col2'>
          <div style='width:15%;'>Fecha</div>
          <div><?= $this->tag->textField(['fecha', 'type' => 'text', 'class' => 'form-control calendario']) ?></div>
        </div>
        <div class='fila col2'>
          <div style='width:15%;'>Diagnostico</div>
          <div style='width:75%;'>
            <?= $this->tag->textArea(['diagnostico', 'class' => 'form-control', 'style' => 'width:100%;']) ?>
          </div>
        </div>
        <div class='fila center bold'><div style='margin-left:47%'> ANTECEDENTES</div></div>
        <div class='fila col2'>
          <div style='width:15%;'>Personales</div>
          <div style='width:75%;'>
            <?= $this->tag->textArea(['antpersonales', 'class' => 'form-control', 'style' => 'width:100%;']) ?>
          </div>
        </div>
        <div class='fila col2'>
          <div style='width:15%;'>Familiares</div>
          <div style='width:75%;'>
            <?= $this->tag->textArea(['antfamiliares', 'class' => 'form-control', 'style' => 'width:100%;']) ?>
          </div>
        </div>
        <div class='fila center bold'><div style='margin-left:46%'>DISPOSITIVO MEDICO</div></div>
        <div class='fila col2 bold'>
          <div style='width:50%;'>ORTESIS</div>
          <div style='width:50%;'>PROTESIS / AMPUTACIÓN</div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:15%;">MIEMBRO SUPERIOR<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="miembrosuperior" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">COLUMNA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="columna" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">DESARTICULADO HOMBRO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="desarticuladohombro" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">DESARTICULADO CADERA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="desarticuladocadera" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:15%;">MIEMBRO INFERIOR<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="miembroinferior" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">CABEZA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="cabeza" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">TRANSHUMERAL<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="transhumeral" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">TRANSFEMORAL<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="transfemoral" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:15%;">CADERA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="cadera" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">SEDESTACIÓN<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="sedentacion" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">TRANSRADIAL<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="transradial" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">TRANSTIBIAL<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="transtibial" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:15%;">DEDOS<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="dedos" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">CUELLO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="cuello" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">PARCIAL DE MANO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="parcialmano" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:15%;">PARCIAL DE PIE<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 40px;">
                <input type="checkbox" class="dispositivomedico check" name="dispositivo" value="parcialpie" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila center bold'><div style='margin-left:47%'>AMPUTACIÓN</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:25%;">FECHA DE LA AMPUTACIÓN<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:25%;">
            <?= $this->tag->textField(['fechaamputacion', 'type' => 'text', 'class' => 'form-control calendario']) ?>
          </div>
          <div class='col2da' style="width:25%;">LADO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:25%;">
            <select class="form-control" name="lado">
              <option value="1">Derecho</option>
              <option value="2">Izquierdo</option>
              <option value="3">Bilateral</option>
            </select>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:20%;">NIVEL DE ACTIVIDAD<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:20%;"></div>
          <div class='col2da' style="width:20%;"></div>
          <div class='col2da' style="width:20%;"></div>
          <div class='col2da' style="width:20%;"></div>
        </div>
        <div class='fila center bold'><div style='margin-left:47%'> ANTECEDENTES</div></div>
        <div class='fila col2'>
          <div style='width:15%;'>CAUSA DE LA AMPUTACIÓN</div>
          <div style='width:75%;'>
            <?= $this->tag->textArea(['causaamputacion', 'class' => 'form-control', 'style' => 'width:100%;']) ?>
          </div>
        </div>
        <div class='fila center bold'><div style='margin-left:47%'>RANGO DE MOVILIDAD</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:50%;">Marque con una X según corresponda<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:20%;">Conservado</div>
          <div class='col2da' style="width:5%;">C</div>
          <div class='col2da' style="width:20%;">No conservado</div>
          <div class='col2da' style="width:5%;">N</div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE HOMBRO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionhombro check" name="calificacion[0]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionhombro check" name="calificacion[0]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionhombro check" name="calificacion[0]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE RODILLA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionrodilla check" name="calificacion[1]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionrodilla check" name="calificacion[1]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionrodilla check" name="calificacion[1]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE CODO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncodo check" name="calificacion[2]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncodo check" name="calificacion[2]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncodo check" name="calificacion[2]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE TOBILLO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulaciontobillo check" name="calificacion[3]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulaciontobillo check" name="calificacion[3]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulaciontobillo check" name="calificacion[3]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE MUÑECA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionmuneca check" name="calificacion[4]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionmuneca check" name="calificacion[4]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionmuneca check" name="calificacion[4]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE PIE<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionpie check" name="calificacion[5]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionpie check" name="calificacion[5]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacionpie check" name="calificacion[5]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DEDOS<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulaciondedos check" name="calificacion[6]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulaciondedos check" name="calificacion[6]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulaciondedos check" name="calificacion[6]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DEL CUELLO<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncuello check" name="calificacion[7]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncuello check" name="calificacion[7]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncuello check" name="calificacion[7]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE CADERA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncadera check" name="calificacion[8]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncadera check" name="calificacion[8]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncadera check" name="calificacion[8]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:20%;">ARTICULACIÓN DE COLUMNA<span style='font-weight: normal;'></span></div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncolumna check" name="calificacion[9]" value="na" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncolumna check" name="calificacion[9]" value="c" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
          <div class='col2da' style="width:10%;">
            <div class="checkbox">
              <label style="padding-left: 45px;">
                <input type="checkbox" class="articulacioncolumna check" name="calificacion[9]" value="n" />
                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class='fila center bold'><div style='margin-left:44%'>FUERZA MUSCULAR</div></div>
        <div class='fila col3e bold'>
          <div class='col2da' style="width:50%;">MIEMBRO CONTRALATERAL</div>
          <div class='col2da' style="width:50%;">MIEMBRO AFECTADO</div>
        </div>
        <div class='fila col3e bold'>
          <div class='col2da' style="width:35%;">GRUPO MUSCULAR</div>
          <div class='col2da' style="width:15%;">CALIFICACIÓN</div>
          <div class='col2da' style="width:35%;">GRUPO MUSCULAR</div>
          <div class='col2da' style="width:15%;">CALIFICACIÓN</div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:35%;">FLEXORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza1[0]', $datosFuerza, 'value' => $listafuerza1[0], 'class' => 'form-control']) ?>
          </div>
          <div class='col2da' style="width:35%;">FLEXORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza2[0]', $datosFuerza, 'value' => $listafuerza2[0], 'class' => 'form-control']) ?>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:35%;">EXTENSORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza1[1]', $datosFuerza, 'value' => $listafuerza1[1], 'class' => 'form-control']) ?>
          </div>
          <div class='col2da' style="width:35%;">EXTENSORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza2[1]', $datosFuerza, 'value' => $listafuerza2[1], 'class' => 'form-control']) ?>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:35%;">ABDUCTORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza1[2]', $datosFuerza, 'value' => $listafuerza1[2], 'class' => 'form-control']) ?>
          </div>
          <div class='col2da' style="width:35%;">ABDUCTORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza2[2]', $datosFuerza, 'value' => $listafuerza2[2], 'class' => 'form-control']) ?>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:35%;">ADUCTORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza1[3]', $datosFuerza, 'value' => $listafuerza1[3], 'class' => 'form-control']) ?>
          </div>
          <div class='col2da' style="width:35%;">ADUCTORES</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza2[3]', $datosFuerza, 'value' => $listafuerza2[3], 'class' => 'form-control']) ?>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:35%;">ROTADOR INTERNO</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza1[4]', $datosFuerza, 'value' => $listafuerza1[4], 'class' => 'form-control']) ?>
          </div>
          <div class='col2da' style="width:35%;">ROTADOR INTERNO</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza2[4]', $datosFuerza, 'value' => $listafuerza2[4], 'class' => 'form-control']) ?>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:35%;">ROTADOR EXTERNO</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza1[5]', $datosFuerza, 'value' => $listafuerza1[5], 'class' => 'form-control']) ?>
          </div>
          <div class='col2da' style="width:35%;">ROTADOR EXTERNO</div>
          <div class='col2da' style="width:15%;">
            <?= $this->tag->select(['fuerza2[5]', $datosFuerza, 'value' => $listafuerza2[5], 'class' => 'form-control']) ?>
          </div>
        </div>
        <div class='fila center bold'><div style='margin-left:47%'>MARCHA</div></div>
        <div class='fila col3e'>
          <div class='col2da' style="width:35%;">USO DE AYUDA EXTERNA</div>
          <div class='col2da' style="width:15%;">
            <select class="form-control" name="ayudaexterna">
              <option value="0">0</option>
              <option value="1">1</option>
            </select>
          </div>
          <div class='col2da' style="width:10%;">¿CUÁL?</div>
          <div class='col2da' style="width:40%;">
            <?= $this->tag->textField(['cualayuda', 'type' => 'text', 'class' => 'form-control fecha']) ?>
          </div>
        </div>
        <div class='fila col3e'>
          <div class='col2da' style="width:25%;">EQUILIBRIO ESTATICO</div>
          <div class='col2da' style="width:25%;">
            <?= $this->tag->textField(['equilibrioestatico', 'type' => 'text', 'class' => 'form-control fecha']) ?>
          </div>
          <div class='col2da' style="width:25%;">EQUILIBRIO DINAMICO</div>
          <div class='col2da' style="width:25%;">
            <?= $this->tag->textField(['equilibriodinamico', 'type' => 'text', 'class' => 'form-control fecha']) ?>
          </div>
        </div>
        <div class='fila center bold'><div style='margin-left:47%'>TECNICO A CARGO</div></div>
        <div class='fila center bold'></div>
        <div class="clear"></div>
      </div>
      <?= $this->tag->submitButton(['Guardar', 'class' => 'btn btn-primary']) ?>
      <br><br>
    </div>
  </form>
</div>
</div>
<?= $this->assets->outputJs() ?>
<script type="text/javascript">
var idValoracion = $("#idValoracion").val();
$.get("<?php echo $this->url->get('Valoracion/BuscarDatosValoracion'); ?>/", { "idValoracion": idValoracion}, function(data){
  var dato = data[1];
  var rango = data[0];
  for (var i = 0; i < 10; i++) {
    var checkedString = $('input[name="calificacion['+ rango[i] + ']"').map(function() { return this }).get();
    for (var j = 0; j < checkedString.length; j++) {
      if ($(checkedString[j]).val() == dato[i]) {
        $(checkedString[j]).prop('checked', true);
      }
    }
  }
});

var dispositivo = $("#dispositivomedico").val();
var checkedString1 = $('input[name="dispositivo"').map(function() { return this }).get();
for (var i = 0; i < checkedString1.length; i++) {
  if ($(checkedString1[i]).val() == dispositivo) {
    $(checkedString1[i]).prop('checked', true);
  }
}

</script>
