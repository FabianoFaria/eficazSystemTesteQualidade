<?php

    // session_start inicia a sessão
    session_start();

    // Verifica se esta na sessao
    if (!isset($_SESSION['userdata']) || empty ($_SESSION['userdata']))
    {

?>
    <html>
        <head>

            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Eficaz System - Sistema de avaliação de qualidade </title>

            <!-- Bootstrap -->
            <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="../css/sweetalert.css" rel="stylesheet" type="text/css">

            <link href="../css/login.css" rel="stylesheet" type="text/css">
            <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css">
             <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <!-- Jquery file -->
            <script src="../js/jquery.js"></script>
            <script src="../js/jquery-ui.js"></script>
            <script src="../js/bootstrap.min.js"> </script>
            <script src="../js/jquery.validate.js"> </script>
            <script src="../js/sweetalert.min.js"> </script>

            <script src="../js/master.js"></script>

            <!-- FAVICON -->
            <link rel="shortcut icon" href="../imagens/favicon2.ico">
            <link rel="apple-touch-icon" href="../imagens/apple-icon.png">

        </head>

        <body>

            <div class="site-wrapper-inner">

                <div class="cover-container">

                    <div class="container">

                        <div class="masthead clearfix">
                            <div class="inner">

                                <nav>
                                  <ul class="nav masthead-nav">

                                  </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="container">
                            <div class="imgLogin"><img src="../imagens/logo-eficaz-system_small.png"></div>
                            <div class="campoForm">
                                <form id="acessoUsuario">
                                    <p><input type="text"       id="pessoaAcesso"   name="pessoaAcesso" placeholder="USU&Aacute;RIO" class="txt_form"></p>
                                    <p><input type="password"   id="senhaAcesso"    name="senhaAcesso" placeholder="SENHA" class="txt_form"></p>
                                    <p><input type="button"     id="btnenviar"      name="btnenviar" value="ENTRAR" class="btn_form"></p>
                                </form>
                            </div>
                            <p><a href="" class="esquecisenha" data-toggle="modal" data-target="#myModal"> Esqueci a senha ?</a></p>

                            <div class="mastfoot">
                              <div class="inner">
                                <p class="footerLinha">© 2016 - <?php echo date('Y'); ?> Eficaz system - Sistema de qualidade de atendimento. Todos os direitos reservados.</p>
                              </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- modal de login -->
            <div id="modalLogin" class="modal fade" tabindex="-1" role="dialog" style="top:25%;">
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


        </body>

    </html>



<?php

    }else{

        //CASO A SESSION JÁ ESTEJA SETADA, REDIRECIONA PARA A PÁGINA PRINCIPAL

        // Configura a url do login
        $login_uri = 'index.php';

        //var_dump($login_uri);

        // Redireciona via javascript
        echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
		echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';

    }

?>
