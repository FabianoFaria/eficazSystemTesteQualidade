<?php
	
	
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
    <link href="../css/metisMenu.css" rel="stylesheet" type="text/css">
    <link href="../css/sb-admin-2.css" rel="stylesheet" type="text/css">
    <link href="../css/wickedpicker.min.css" rel="stylesheet" type="text/css">
    <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css">

    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- Jquery file -->
    <script src="../js/jquery.js"></script>
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

<body>

    <div class="container">
        <!-- Inicio da parte do menu -->
        <div class="header clearfix">
            <nav>
              <ul class="nav nav-pills pull-right">

                <li role="presentation" <?php if( $page == 'indice'){ echo 'class="active"';} ?> ><a href="index.php">Enviar avaliação</a></li>
                 <li role="presentation" <?php if( $page == 'Vizualizar'){ echo 'class="active"';} ?> ><a href="visualizacao_dados.php">Vizualizar dados</a></li>
                 <li role="presentation" <?php if( $page == 'Configuracoes'){ echo 'class="active"';} ?> >
                 	<a href="configuracoes.php">Configurações</a>
                 </li>
                <li role="presentation"><a href="javascript:void(0)" id="saida">Sair</a></li> 
              </ul>
            </nav>
            <!-- <h3 class="text-muted">Eficaz System - Questionario de qualidade</h3> -->
            <a href="index.php"><img src="imagens/logo-eficaz-system_small.png" class="img-responsive"></a>
        </div>
        <!-- Fim da parte do menu -->
