<?= $this->getContent() ?>
<div class="jumbotron" style="margin-top:40px;">
    <h1>Acceso denegado</h1>
    <p>Lo sentimos, no tienes acceso a esta área. Para mayor información contacte al Administrador.</p>
    <p><?= $this->tag->linkTo(['index', 'Inicio', 'class' => 'btn btn-primary']) ?></p>
</div>
