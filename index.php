<?php

    // session_start inicia a sessão
    session_start();

    // Verifica se esta na sessao
    if (!isset($_SESSION['userdata']))
    {
        // Se nao estiver
        // Remove qualquer dado existente
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

?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eficaz System - Pesquisa de qualidade</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../imagens/favicon2.ico">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/master.css" rel="stylesheet" type="text/css">

    <!-- Jquery file -->
    <script src="../js/jquery.js"></script>
    <script src="../js/master.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/sweetalert.min.js"></script>


</head>
<body>

    <div class="container">
        <div class="header clearfix">
            <nav>
              <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="javascript:void(0)">Enviar avaliação</a></li>
                 <li role="presentation"><a href="visualizacao_dados.php">Vizualizar dados</a></li>
                <!--<li role="presentation"><a href="#">Contact</a></li> -->
              </ul>
            </nav>
            <!-- <h3 class="text-muted">Eficaz System - Questionario de qualidade</h3> -->
             <a href="#"><img src="imagens/logo-eficaz-system_small.png" class="img-responsive"></a>
        </div>

        <div class="jumbotron">
           <h2>Enviar questionario de qualidade.</h2>
           <p class="lead">Informe os dados do cliente para envio de formulário.</p>
        </div>

        <div class="row well">

            <div class="col-md-12">

                <form id="questionario_cliente">

                    <div class="form-group">
                        <label for="nomeCliente">Nome do cliente</label>
                        <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Nome do cliente">
                    </div>

                    <div class="form-group">
                        <label for="numeroServico">Número de serviço</label>
                        <input type="text" class="form-control" id="numeroServico" name="numeroServico" placeholder="Número de serviço">
                    </div>

                    <div class="form-group">
                        <label for="emailEnd">Endereço de email</label>
                        <input type="text" class="form-control" id="emailEnd" name="emailEnd" placeholder="Endereço de email">
                    </div>

                    <p style="text-align:center;"><a class="btn btn-lg btn-success" id="mandarAvaliacao" href="javascript:void(0)" role="button">Enviar formulário</a></p>

                </form>

            </div>

        </div>


        <footer class="footer">
            <p class="">© <?php echo date('Y'); ?> Eficaz system - Sistema de avaliação de qualidade.</p>
        </footer>

    </div> <!-- /container -->

</body>
</html>

<?php

    }

?>
