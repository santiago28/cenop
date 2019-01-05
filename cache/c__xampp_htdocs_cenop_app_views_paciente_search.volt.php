<div class="row">
  <nav>
    <ul class="pager">
      <li class="previous"><?= $this->tag->linkTo(['paciente/index', 'Go Back']) ?></li>
      <li class="next"><?= $this->tag->linkTo(['paciente/new', 'Create ']) ?></li>
    </ul>
  </nav>
</div>

<div class="page-header">
  <h1>Search result</h1>
</div>

<?= $this->getContent() ?>

<div class="row">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo Documento</th>
        <th>Numero Documento</th>
        <th>Teléfono</th>
        <th>Celular</th>
        <th>Municipio</th>
        <th>Dirección</th>
        <th>Edad</th>
        <th>Estatura</th>
        <th>Peso</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($page->items)) { ?>
      <?php foreach ($page->items as $paciente) { ?>
      <tr>
        <td><?= $paciente->nombre ?></td>
        <td><?= $paciente->apellido ?></td>
        <td><?= $paciente->tipoDocumento ?></td>
        <td><?= $paciente->numeroDocumento ?></td>
        <td><?= $paciente->telefono ?></td>
        <td><?= $paciente->celular ?></td>
        <td><?= $paciente->idMunicipio ?></td>
        <td><?= $paciente->direccion ?></td>
        <td><?= $paciente->edad ?></td>
        <td><?= $paciente->estatura ?></td>
        <td><?= $paciente->peso ?></td>

        <td><?= $this->tag->linkTo(['paciente/edit/' . $paciente->idPaciente, '&#xE254;', 'class' => 'material-icons', 'style' => 'color:#757575; text-decoration: none;']) ?></td>
        <td><?= $this->tag->linkTo(['paciente/delete/' . $paciente->idPaciente, '&#xE872;', 'class' => 'material-icons', 'style' => 'color:#757575; text-decoration: none;']) ?></td>
      </tr>
      <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>

<div class="row">
  <div class="col-sm-1">
    <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
      <?= $page->current . '/' . $page->total_pages ?>
    </p>
  </div>
  <div class="col-sm-11">
    <nav>
      <ul class="pagination">
        <li><?= $this->tag->linkTo(['paciente/search', 'First']) ?></li>
        <li><?= $this->tag->linkTo(['paciente/search?page=' . $page->before, 'Previous']) ?></li>
        <li><?= $this->tag->linkTo(['paciente/search?page=' . $page->next, 'Next']) ?></li>
        <li><?= $this->tag->linkTo(['paciente/search?page=' . $page->last, 'Last']) ?></li>
      </ul>
    </nav>
  </div>
</div>
