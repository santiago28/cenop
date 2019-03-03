
<?= $this->tag->form(['detalleactividad/create', 'method' => 'post']) ?>

<table width="100%">
    <tr>
        <td align="left"><?= $this->tag->linkTo(['detalleactividad', 'Go Back']) ?></td>
        <td align="right"><?= $this->tag->submitButton(['Save']) ?></td>
    </tr>
</table>

<?= $this->getContent() ?>

<div align="center">
    <h1>Create detalleactividad</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idActividad">IdActividad</label>
        </td>
        <td align="left">
            <?= $this->tag->textField(['idActividad', 'type' => 'numeric']) ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="nombreactividad">Nombreactividad</label>
        </td>
        <td align="left">
            <?= $this->tag->textField(['nombreactividad', 'size' => 30]) ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="dato">Dato</label>
        </td>
        <td align="left">
            <?= $this->tag->textField(['dato', 'type' => 'numeric']) ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="observacion">Observacion</label>
        </td>
        <td align="left">
            <?= $this->tag->textField(['observacion', 'size' => 30]) ?>
        </td>
    </tr>

    <tr>
        <td></td>
        <td><?= $this->tag->submitButton(['Save']) ?></td>
    </tr>
</table>

</form>
