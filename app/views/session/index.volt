{{ content() }}
{# <div class="container form-signin form-container-login">

	<h2>Iniciar Sesión</h2>
	{{ form('session/start', 'role': 'form') }}
	{{ text_field('nombreUsuario', 'class': "form-control", 'placeholder' : "Usuario o Email") }}
	{{ password_field('contrasena', 'class': "form-control", 'placeholder' : "Contraseña") }}
	{{ submit_button('Enviar', 'class': 'btn btn-lg btn-primary btn-block') }}
	</form>

</div> #}

<div id="bodyLogin" style="">
    <div align="center">
        <div class="container well" id="sha">
					{{ form('session/start', 'role': 'form') }}
            <div class="row">
                <div class="col-xs-12">
                    {# <img src="logo.jpg" id="avatar" /> #}
										{{ image("img/logo.jpg", "id": "avatar", "alt": "") }}
                    <br /><br />
                </div>
            </div>
            <section>
                <div class="form-group">
                    <div class="col-md-offset-0">
                        {{ text_field('nombreUsuario', 'class': "form-control", 'placeholder' : "Documento Identidad	") }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-0">
                        {{ password_field('contrasena', 'class': "form-control", 'placeholder' : "Contraseña") }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-0 col-XS-10">
                        {{ submit_button('Enviar', 'class': 'btn btn-lg btn-primary btn-block') }}
                    </div>
                </div>
                {# <div>
                    <p style="padding-left:22px;">
                        <a ng-click="AbrirModalRecuperar()">Recuperar Contraseña</a>
                    </p>
                </div> #}
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
