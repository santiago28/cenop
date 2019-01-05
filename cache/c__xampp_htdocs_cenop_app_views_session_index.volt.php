<?= $this->getContent() ?>


<div id="bodyLogin" style="">
    <div align="center">
        <div class="container well" id="sha">
					<?= $this->tag->form(['session/start', 'role' => 'form']) ?>
            <div class="row">
                <div class="col-xs-12">
                    
										<?= $this->tag->image(['img/logo.jpg', 'id' => 'avatar', 'alt' => '']) ?>
                    <br /><br />
                </div>
            </div>
            <section>
                <div class="form-group">
                    <div class="col-md-offset-0">
                        <?= $this->tag->textField(['nombreUsuario', 'class' => 'form-control', 'placeholder' => 'Documento Identidad	']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-0">
                        <?= $this->tag->passwordField(['contrasena', 'class' => 'form-control', 'placeholder' => 'Contraseña']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-0 col-XS-10">
                        <?= $this->tag->submitButton(['Enviar', 'class' => 'btn btn-lg btn-primary btn-block']) ?>
                    </div>
                </div>
                
            </section>
						</form>
        </div>
    </div>
</div>
<script type="text/javascript">

	setTimeout(function(){
		$("#MenuPrincipal").css("display", "none");
		$('.barra-menu').attr('style', 'display: none !important');
	},200);

</script>
