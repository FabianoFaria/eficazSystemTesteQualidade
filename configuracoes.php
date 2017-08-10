<?php

	
	// session_start inicia a sessão
    session_start();
	

	// Verifica se esta na sessao
    if(empty($_SESSION['userdata']))
    {
        // Apaga qualquer valor
        $_SESSION['userdata'] = array();

        // Destroi a sessao
        unset($_SESSION);

        // Apaga qualquer valor
        $_SESSION['userdata'] = array();

        // Destroi toda sessao
        if(isset($_SESSION)){
            session_destroy();
        }

        // Configura a url do login
        $login_uri = 'login.php';

        //var_dump($login_uri);

        // Redireciona via javascript
        echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
	    echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';

    }else{

    	$page = 'Configuracoes';

        include 'menu_inicial.php';

        ?>
        	<script src="../js/configuracoes.js"></script>

        	<div class="row">

        		<div class="col-md-6">

        			<p>
        				<button id="addUser" class="btn btn-primary btn-lg btn-block">Adicionar usuário</button>
        				<button id="rmUser" class="btn btn-primary btn-lg btn-block">Remover usuário</button>
					</p>

                </div>

                <div class="col-md-6">
                	<p>
        				<button id="editUser" class="btn btn-primary btn-lg btn-block">Editar dados de login</button>
					</p>
                </div>


        	</div>

        	<!-- Modais para adição e edição de usuários -->

        	<!-- modal de adição -->
            <div id="modalAdicao" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
	                <div class="modal-header">
	                	<h4> Adicionar novo usuário</h4>
	                </div>
                  	<div class="modal-body">
                        <div class="row">
                        	<div class="col-md-12">
                        		<form id="novoUsuario" class="form-group">

                        			<div class="form-group">
									    <label for="nomeNovoUsuario">Nome do usuário</label>
									    <input type="text" class="form-control" id="nomeNovoUsuario" name="nomeNovoUsuario" placeholder="Nome usuário">
									</div>			

									<div class="form-group">
									    <label for="emailNovoUsuario">Email do usuário</label>
									    <input type="email" class="form-control" id="emailNovoUsuario" name="emailNovoUsuario" placeholder="Email usuário">
									</div>

									<div class="form-group">
									    <label for="senhaNovoUsuario">Senha</label>
									    <input type="password" class="form-control" id="senhaNovoUsuario" name="senhaNovoUsuario" >
									</div>

									<div class="form-group">
									    <label for="confirmaSenhaNovoUsuario">Confirmar senha</label>
									    <input type="password" class="form-control" id="confirmaSenhaNovoUsuario" name="confirmaSenhaNovoUsuario" placeholder="">
									</div>

									<div class="form-group">
									    <a href='javascript:void(0)' id="confirAdd" class="btn btn-primary btn-lg btn-block">Cadastrar novo usuário</a>
									</div>
                        		</form>
                        	</div>
                        </div>
                  	</div>
                  	<div class="modal-footer">
                  	</div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- modal de edição -->
            <div id="modalEdicao" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">

                  <div class="modal-body">
                    <p>
                        <i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i>
                    </p>
                    <p>Validando dados.</p>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- modal de espera -->
            <!-- modal de login -->
            <div id="modalEspera" class="modal fade" tabindex="-1" role="dialog" style="top:25%;">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">

                  <div class="modal-body">
                    <p style="text-align: center;">
                        <i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i>
                    </p>
                    <p>Validando dados.</p>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        <?php

        include 'footer.php';
    
    }

?>