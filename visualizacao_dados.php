<?php

    // Display erros
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

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

        $page = 'Vizualizar';

        include 'menu_inicial.php';

        ?>

            <!-- <html>
                <head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <title>Eficaz System - Pesquisa de qualidade</title>

                    <meta name="description" content="">
                    <meta name="author" content="">
                    <link rel="icon" href="../imagens/favicon2.ico"> -->

                    <!-- Bootstrap core CSS -->
<!--                     <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
                    <link href="../css/sweetalert.css" rel="stylesheet" type="text/css">
 -->
                    <!-- Custom styles for this template -->
                    <!-- <link href="../css/master.css" rel="stylesheet" type="text/css">
                    <link href="../css/metisMenu.css" rel="stylesheet" type="text/css">
                    <link href="../css/sb-admin-2.css" rel="stylesheet" type="text/css">
                    <link href="../css/wickedpicker.min.css" rel="stylesheet" type="text/css">
                    <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css">

                    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                    <link href="../css/sweetalert.css" rel="stylesheet" type="text/css">
 -->
                    <!-- Jquery file -->
                   <!--  <script src="../js/jquery.js"></script>
                    <script src="../js/jquery-ui.js"></script>
                    <script src="../js/jquery.flot.js"></script>
                    <script src="../js/jquery.flot.categories.js"></script>
                    <script src="../js/sweetalert.min.js"></script>
                    <script src="../js/jquery.validate.js"></script>
                    <script src="../js/additional-methods.js"></script>


                    <script src="../js/bootstrap.min.js"></script>
                    <script src="../js/wickedpicker.min.js"></script>
                    <script src="../js/master.js"></script>


                </head>
                <body> -->

                    <!-- <div class="container">
                        <div class="header clearfix">
                            <nav>
                              <ul class="nav nav-pills pull-right">
                                <li role="presentation" ><a href="index.php">Enviar avaliação</a></li>
                                <li role="presentation" class="active"><a href="javascript:void(0)">Vizualizar dados</a></li>
                                <li role="presentation"><a href="javascript:void(0)" id="saida">Sair</a></li>
                              </ul>
                            </nav> -->
                            <!-- <h3 class="text-muted">Eficaz System - Questionario de qualidade</h3> -->
                             <!-- <a href="#"><img src="imagens/logo-eficaz-system_small.png" class="img-responsive"></a>
                        </div> -->

                        <div class="row">
                            <div class="col-md-5">

                                <div class="panel panel-primary">
                                    <div class="panel-heading">Período relatôrio</div>
                                    <div class="panel-body">

                                        <form id="formPeriodoAvaliacao" class="">

                                            <div class="row borda-01">
                                                <div class="col-md-12 txt-center">
                                                    <label class="font-texto-02">Período</label>
                                                </div>
                                            </div>

                                            <div class="row borda-01">
                                                <div class="col-md-6">
                                                    <label class="font-texto-02">Desde : </label>
                                                </div>

                                                <div class="col-md-6 txt-center">
                                                    <label class="font-texto-02">
                                                        <input class="form-control" type="text" id="data_inicio_rel" name="data_inicio_rel" val="">
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="font-texto-02">Até :</label>
                                                </div>

                                                <div class="col-md-6 txt-center">
                                                    <label class="font-texto-02">
                                                        <input class="form-control" type="text" id="data_fim_rel" name="data_fim_rel" val="">
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="font-texto-02"></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="javascript:void(0)" class="btn btn-primary" id="pesquisarPeriodo" >Pesquisar</a>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-5">
                                <div class="panel panel-green">
                                    <div class="panel-heading">Exportar relatôrio</div>
                                    <div class="panel-body">
                                        <form id="formPeriodoExportar" class="">

                                            <div class="row borda-01">
                                                <div class="col-md-12 txt-center">
                                                    <label class="font-texto-02">Período</label>
                                                </div>
                                            </div>

                                            <div class="row borda-01">
                                                <div class="col-md-6">
                                                    <label class="font-texto-02">Desde : </label>
                                                </div>

                                                <div class="col-md-6 txt-center">
                                                    <label class="font-texto-02">
                                                        <input class="form-control" type="text" id="data_inicio_csv" name="data_inicio_csv" val="">
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="font-texto-02">Até :</label>
                                                </div>

                                                <div class="col-md-6 txt-center">
                                                    <label class="font-texto-02">
                                                        <input class="form-control" type="text" id="data_fim_csv" name="data_fim_csv" val="">
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="font-texto-02"></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="javascript:void(0)" class="btn btn-primary" id="exportarPeriodo" >
                                                    Exportar .CSV
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <?php

                                //Busca os dados da última semana.

                                require_once "classes/conexao.php";
                                require_once "classes/funcoes_uteis.php";

                                $conn = new BancoDeDados;

                                $db = $conn->conexao();

                                $dataHoje           = date('Y-m-d');
                                $date               = strtotime($dataHoje);
                                $dataSemanaPassada  = strtotime("-7 day", $date);
                                $dataSemanaPassada  = date('Y-m-d', $dataSemanaPassada);
                                $dataLabelIni       = implode("/", array_reverse(explode("-", $dataHoje)));
                                $dataLabelFini      = implode("/", array_reverse(explode("-", $dataSemanaPassada)));

                                // prepare and bind
                                $stmt = $db->prepare("SELECT numero_servico, nome_avaliador, identificar_tecnico, aparencia_tecnico, cordialidade, tempo_servico, agravante, expectativa, nivel_recomendacao FROM tb_resposta_cliente WHERE data_resposta BETWEEN :dataInicial AND :dataFinal");
                                $stmt->execute(array(':dataInicial' => $dataSemanaPassada.' 00:00:00', ':dataFinal' => $dataHoje.' 23:59:59'));
                                $clientesDados = $stmt->fetchAll();

                                //var_dump($clientesDados);

                            ?>

                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3>
                                        <i class="fa fa-file-text-o fa-x4"></i>
                                        Dados do período <span id="dataInicio"><?php echo $dataLabelIni; ?></span> até <span id="dataFinal"><?php echo $dataLabelFini; ?></span>
                                    </h3>

                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <!-- //Identificação do técnico -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <i class="fa fa-male fa-2x"></i> Identificação dos técnicos
                                            </div>
                                            <div class="panel-body">
                                                <?php

                                                    $totalRespostas = 0;

                                                    $identificacaoA = 0;
                                                    $identificacaoB = 0;
                                                    $identificacaoC = 0;
                                                    $identificacaoD = 0;

                                                    $aparenciaA = 0;
                                                    $aparenciaB = 0;
                                                    $aparenciaC = 0;
                                                    $aparenciaD = 0;

                                                    $cordialidadeA = 0;
                                                    $cordialidadeB = 0;
                                                    $cordialidadeC = 0;
                                                    $cordialidadeD = 0;

                                                    $tempoA = 0;
                                                    $tempoB = 0;
                                                    $tempoC = 0;
                                                    $tempoD = 0;

                                                    $agravanteA = 0;
                                                    $agravanteB = 0;
                                                    $agravanteC = 0;
                                                    $agravanteD = 0;

                                                    $expectativaA = 0;
                                                    $expectativaB = 0;
                                                    $expectativaC = 0;
                                                    $expectativaD = 0;

                                                    $nota0 = 0;
                                                    $nota1 = 0;
                                                    $nota2 = 0;
                                                    $nota3 = 0;
                                                    $nota4 = 0;
                                                    $nota5 = 0;
                                                    $nota6 = 0;
                                                    $nota7 = 0;
                                                    $nota8 = 0;
                                                    $nota9 = 0;
                                                    $nota10 = 0;

                                                    foreach($clientesDados as $identificacao) {

                                                        //print_r($identificacao);

                                                        $totalRespostas++;
                                                        switch ($identificacao['identificar_tecnico']) {
                                                            case '0':
                                                                $identificacaoA++;
                                                            break;

                                                            case '1':
                                                                $identificacaoB++;
                                                            break;

                                                            case '2':
                                                                $identificacaoC++;
                                                            break;

                                                            case '3':
                                                                $identificacaoD++;
                                                            break;
                                                        }

                                                        switch ($identificacao['aparencia_tecnico']) {
                                                            case '0':
                                                                $aparenciaA++;
                                                            break;

                                                            case '1':
                                                                $aparenciaB++;
                                                            break;

                                                            case '2':
                                                                $aparenciaC++;
                                                            break;

                                                            case '3':
                                                                $aparenciaD++;
                                                            break;
                                                        }

                                                        switch ($identificacao['cordialidade']) {
                                                            case '0':
                                                                $cordialidadeA++;
                                                            break;

                                                            case '1':
                                                                $cordialidadeB++;
                                                            break;

                                                            case '2':
                                                                $cordialidadeC++;
                                                            break;

                                                            case '3':
                                                                $cordialidadeD++;
                                                            break;
                                                        }

                                                        switch ($identificacao['tempo_servico']) {
                                                            case '0':
                                                                $tempoA++;
                                                            break;

                                                            case '1':
                                                                $tempoB++;
                                                            break;

                                                            case '2':
                                                                $tempoC++;
                                                            break;

                                                            case '3':
                                                                $tempoD++;
                                                            break;
                                                        }

                                                        switch ($identificacao['agravante']) {
                                                            case '0':
                                                                $agravanteA++;
                                                            break;

                                                            case '1':
                                                                $agravanteB++;
                                                            break;

                                                            case '2':
                                                                $agravanteC++;
                                                            break;

                                                            case '3':
                                                                $agravanteD++;
                                                            break;
                                                        }

                                                        switch ($identificacao['expectativa']) {
                                                            case '0':
                                                                $expectativaA++;
                                                            break;

                                                            case '1':
                                                                $expectativaB++;
                                                            break;

                                                            case '2':
                                                                $expectativaC++;
                                                            break;

                                                            case '3':
                                                                $expectativaD++;
                                                            break;
                                                        }

                                                        switch ($identificacao['nivel_recomendacao']) {
                                                            case '0':
                                                                $nota0++;
                                                            break;

                                                            case '1':
                                                                $nota1++;
                                                            break;

                                                            case '2':
                                                                $nota2++;
                                                            break;

                                                            case '3':
                                                                $nota3++;
                                                            break;

                                                            case '4':
                                                                $nota4++;
                                                            break;

                                                            case '5':
                                                                $nota5++;
                                                            break;

                                                            case '6':
                                                                $nota6++;
                                                            break;

                                                            case '7':
                                                                $nota7++;
                                                            break;

                                                            case '8':
                                                                $nota8++;
                                                            break;

                                                            case '9':
                                                                $nota9++;
                                                            break;

                                                            case '10':
                                                                $nota10++;
                                                            break;
                                                        }
                                                    }


                                                ?>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i> Fácil identificação
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="identificar_tecnicoA">
                                                                <?php echo porcentagem_xn($identificacaoA, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-meh-o fa-1x"></i> Houve dúvidas na identificação
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="identificar_tecnicoB">
                                                                <?php echo porcentagem_xn($identificacaoB, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p id="identificar_tecnicoC">
                                                                <i class="fa fa-meh-o fa-1x"></i> Difícil identificação
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="identificar_tecnicoD">
                                                                <?php echo porcentagem_xn($identificacaoC, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-frown-o fa-1x"></i> Muito difícil identificação
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                <?php echo porcentagem_xn($identificacaoD, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="panel-footer">

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <!-- //Aparência do técnico -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <i class="fa fa-street-view fa-2x"></i> Aparencia dos técnicos
                                            </div>
                                            <div class="panel-body">

                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i><i class="fa fa-smile-o fa-1x"></i> Muito boa aparência
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="aparencia_tecnicoA">
                                                                <?php echo porcentagem_xn($aparenciaA, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i> Boa aparência
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="aparencia_tecnicoB">
                                                                <?php echo porcentagem_xn($aparenciaB, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-meh-o fa-1x"></i> Aparência regular
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="aparencia_tecnicoC">
                                                                <?php echo porcentagem_xn($aparenciaC, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-frown-o fa-1x"></i> Má aparencia
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="aparencia_tecnicoD">
                                                                <?php echo porcentagem_xn($aparenciaD, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="panel-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- //Cordialidade do técnico -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <i class="fa fa-thumbs-o-up fa-2x"></i> Cordialidade dos técnicos
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i><i class="fa fa-smile-o fa-1x"></i> Muito cordiais
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="cordialidadeA">
                                                                <?php echo porcentagem_xn($cordialidadeA, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i> Cordiais
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="cordialidadeB">
                                                                <?php echo porcentagem_xn($cordialidadeB, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-meh-o fa-1x"></i> Pouco cordiais
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="cordialidadeC">
                                                                <?php echo porcentagem_xn($cordialidadeC, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-frown-o fa-1x"></i> Não foram cordiais
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="cordialidadeD">
                                                                <?php echo porcentagem_xn($cordialidadeD, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="panel-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Agravantes do serviço -->
                                <div class="row">
                                    <!-- //Cordialidade do técnico -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <i class="fa fa-clock-o fa-2x"></i> Tempo de atendimento
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i><i class="fa fa-smile-o fa-1x"></i> Rápido
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="tempo_servicoA">
                                                                <?php echo porcentagem_xn($tempoA, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i> Normal
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="tempo_servicoB">
                                                                <?php echo porcentagem_xn($tempoB, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-meh-o fa-1x"></i> Demorou um pouco
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="tempo_servicoC">
                                                                <?php echo porcentagem_xn($tempoC, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-frown-o fa-1x"></i> Demorou muito
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="tempo_servicoD">
                                                                <?php echo porcentagem_xn($tempoD, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="panel-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- //Tempo do serviço -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <i class="fa fa-exclamation-triangle fa-2x"></i> Agravantes do problema
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i><i class="fa fa-smile-o fa-1x"></i> Nenhum problema adicional
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="agravanteA">
                                                                <?php echo porcentagem_xn($agravanteA, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i> Nenhuma complicação relevante
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="agravanteB">
                                                                <?php echo porcentagem_xn($agravanteB, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-meh-o fa-1x"></i> Houve alguns imprevistos
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="agravanteC">
                                                                <?php echo porcentagem_xn($agravanteC, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-frown-o fa-1x"></i> Houve problemas graves
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="agravanteD">
                                                                <?php echo porcentagem_xn($agravanteD, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="panel-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- //Expectativa do serviço -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <i class="fa fa-smile-o fa-2x"></i> Serviço atendeu as expectativas
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i><i class="fa fa-smile-o fa-1x"></i> Melhor do que o esperado
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="expectativaA">
                                                                <?php echo porcentagem_xn($expectativaA, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-smile-o fa-1x"></i> Atendeu as expectativas
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="expectativaB">
                                                                <?php echo porcentagem_xn($expectativaB, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-meh-o fa-1x"></i> Deixou um pouco a desejar
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="expectativaC">
                                                                <?php echo porcentagem_xn($expectativaC, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-frown-o fa-1x"></i> Não me agradou
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p id="expectativaD">
                                                                <?php echo porcentagem_xn($expectativaD, $totalRespostas); ?>%
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="panel-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="panel panel-info">
                                <div class="panel-heading">

                                    <h3><i class="fa fa-star-o fa-1x"></i> Quantidade de pessoas por nota</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="demo-container">
                            			<div id="placeholder" class="demo-placeholder" style="height:450px;"></div>
                            		</div>
                                </div>
                            </div>

                        </div>

                       <!--  <footer class="footer">
                            <p class="">© <?php //echo date('Y'); ?> Eficaz system - Sistema de avaliação de qualidade.</p>
                        </footer>

                    </div> -->

                    <!-- modal de login -->
                    <div id="modalDados" class="modal fade" tabindex="-1" role="dialog" style="top:25%;">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">

                          <div class="modal-body">
                            <p style="text-align: center;">
                                <i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i>
                            </p>
                            <p id="mensagemModal"></p>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <script language='javascript'>
                        var options = {
                            dayNamesMin: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],
                            maxDate: "+0y +0m +0d",
                            mindate: "-1y -6m",
                            changeMonth: true,
                            changeYear: true,
                            yearRange: "c-1:c+1",
                            monthRange: "c-6:c+0",
                            dateFormat: "dd/mm/yy"
                        }

                        // Relatório por período
                        $("#data_inicio_rel").datepicker(options);
                        $("#data_fim_rel").datepicker(options);

                        // Período para exportar
                        $("#data_inicio_csv").datepicker(options);
                        $("#data_fim_csv").datepicker(options);

                        //Efetua a montagem do gráfico

                        $(function() {

		                    var data = [ ["0", <?php echo $nota0; ?>],
                                         ["1", <?php echo $nota1; ?>],
                                         ["2", <?php echo $nota2; ?>],
                                         ["3", <?php echo $nota3; ?>],
                                         ["4", <?php echo $nota4; ?>],
                                         ["5", <?php echo $nota5; ?>] ,
                                         ["6", <?php echo $nota6; ?>],
                                         ["7", <?php echo $nota7; ?>],
                                         ["8", <?php echo $nota8; ?>],
                                         ["9", <?php echo $nota9; ?>],
                                         ["10",<?php echo $nota10; ?>]
                                     ];

                    		$.plot("#placeholder", [ data ], {
                    			series: {
                    				bars: {
                    					show: true,
                    					barWidth: 0.6,
                    					align: "center"
                    				}
                    			},
                    			xaxis: {
                    				mode: "categories",
                    				tickLength: 1
                    			},
                                yaxis: {
                                    minTickSize: 1,
                                    tickDecimals: 0

                                }
                    		});

                    		// Add the Flot version string to the footer

                    		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
                    	});

                    </script>
                <!-- </body>
            </html>
 -->
        <?php

        include 'footer.php';
        //echo "Teste de validação dos dados!!";

    }

?>
