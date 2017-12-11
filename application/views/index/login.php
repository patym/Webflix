<!-- Toda view precisa ter uma div primaria, onde todas as outras devem vir dentro -->
<div id="corpo_da_pagina" class="container">
	<div class="row">
		<div class="col-lg-4" id="esquerda">
		</div>

		<!-- div que recebera o form login -->
		<div class="login col-lg-4">
			<div class="text-center" id="logo">
				<img src="<?= URL ?>public/img/logo2.png" alt="WebFlix" class="img-circle" width="60%" height="60%">
			</div>
			<form method="POST" id="formLogin">
				<fieldset id="fundo_login">
						<div class="form-group" style="width:100%;">
								<label for="email">Email</label><br>
								<input type="email" class="form-control" name="email" placeholder="" required>
						</div>
						<div class="form-group" style="width:100%;">
								<label for="password">Senha</label>
								<br>
								<input type="password" class="form-control" name="senha" placeholder="" required>
								<br>
								<small class="form-text text-muted">A senha deve ter entre 4 e 60 caracteres.</small>
								<br>
						</div>
						<div class="form-check">
						      <label class="form-check-label">
						        <input type="checkbox" class="form-check-input">
						        Lembre-se de mim
						      </label>
						</div>
						<div class="text-left">
							<button type="submit" class="btn btn-lg btn-danger" style="width:100%;">Entrar</button>
							<br />
							<br />
							<button type="button" class="btn btn-lg btn-info registrar" style="width:100%;">Registrar-se</button>
						</div>
				</fieldset>
			</form>
			<!-- fecha a div login -->
		</div>
	<div class="col-lg-4" id="direita">
	</div>
	</div>
<!-- fecha div corpo_da_pagina -->
</div>

<!-- Modal -->
<div id="registrar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar-se no Webflix</h4>
      </div>
      <div class="modal-body">
        <p>Precisamos de algumas informações suas para concluirmos seu cadastro.</p>
				<form  method="POST" id="formRegistro">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="nome" maxlength="12" placeholder="Seu nome">
					</div>
					<span class="help-block"></span>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-telegram"></i></span>
						<input type="email" class="form-control" name="email" placeholder="Nos informe seu email">
					</div>
					<span class="help-block"></span>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="senha" maxlength="12" placeholder="Crie a sua senha" id="senha">
					</div>
          <span class="help-block"></span>
          <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="confirma_senha" maxlength="12" placeholder="Confirme sua senha" id="confirmaSenha">
					</div>
					<span class="help-block"></span>
      </div>
      <div class="modal-footer">
				<button type="submit" class="btn btn-info" id="btnRegistro"><b>Registrar-se</b></button>
				<button type="button" class="btn btn-info" id="btnRegistrando" style="display:none;"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i><b>Registrando...</b></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Cancelar</b></button>
      </div>
			</form>
    </div>
  </div>
</div>
