<?php

    if(isset($_GET['prefilled_answer']) && isset($_GET['numeroServico'])){

        $notaRecomentdacao = $_GET['prefilled_answer'];
        $numeroServicoHash = $_GET['numeroServico'];

        //Inicia a procura pelo serviço a ser avaliado pelo cliente

        require_once "classes/conexao.php";

        $conn = new BancoDeDados;

        $db = $conn->conexao();

        // prepare and bind
        $stmt = $db->prepare("SELECT id_teste, nome_cliente, email_cliente, numero_servico, status_respondido FROM tb_avaliacao_cliente WHERE numero_servico = :numeroServico ");

        $stmt->execute(array(':numeroServico' => $numeroServicoHash));
        $servicosAvaliando = $stmt->fetchAll();

        if(!empty($servicosAvaliando)){

            $nomeCliente        = $servicosAvaliando[0]['nome_cliente'];
            $emailCliente       = $servicosAvaliando[0]['email_cliente'];
            $statusCliente      = $servicosAvaliando[0]['status_respondido'];
            $numeroServicoHash  = $servicosAvaliando[0]['numero_servico'];

            //print_r($servicosAvaliando);

            if($statusCliente == 0){

                //Iniciar o formulário
                ?>

                    <html>
                        <head>

                            <meta charset="utf-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1">

                            <title>Eficaz System - Formulário de qualidade de atendimento</title>

                            <meta name="description" content="">
                            <meta name="author" content="">
                            <link rel="icon" href="../imagens/favicon2.ico">

                            <!-- Bootstrap core CSS -->
                            <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
                            <link href="../css/sweetalert.css" rel="stylesheet" type="text/css">

                            <!-- Custom styles for this template -->
                            <link href="../css/master.css" rel="stylesheet" type="text/css">

                            <!-- Custom Fonts -->
                            <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                                        <li role="presentation" class="active"><a href="#">Início</a></li>
                                        <!-- <li role="presentation"><a href="#">About</a></li>
                                        <li role="presentation"><a href="#">Contact</a></li> -->
                                      </ul>
                                    </nav>
                                    <!-- <h3 class="text-muted">Eficaz System - Questionario de qualidade</h3> -->
                                     <a href="#"><img src="imagens/logo-eficaz-system_small.png" class="img-responsive"></a>
                                </div>

                                <div class="">
                                   <h2>
                                       <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        Formulário de qualidade de serviço.
                                    </h2>

                                </div>

                                <div class="">
                                    <p class="lead">Por gentileza, continue respondendo as demais perguntas para que possamos melhorar nossos serviços.</p>
                                </div>

                                <div class="">

                                    <div class="col-md-12">

                                        <form id="questionario_resposta_cliente">

                                            <input type="hidden" id="nomeAvaliador" name="nomeAvaliador" value="<?php echo $nomeCliente; ?>">
                                            <input type="hidden" id="numeroServico" name="numeroServico" value="<?php echo $numeroServicoHash; ?>">

                                            <div class="form-group">
                                                <label for="medidaRecomendacao">
                                                    <i class="fa fa-users fa-4x" aria-hidden="true"></i>
                                                    O Quanto você recomenda os serviços da Eficaz System a um amigo:
                                                </label>
                                                <select class="form-control" id="medidaRecomendacao">
                                                    <?php

                                                        for($i=0;$i<11;$i++){

                                                            if($notaRecomentdacao == $i){
                                                                echo "<option value='".$i."' selected='true'>".$i."</option>";
                                                            }else{
                                                                echo "<option value='".$i."'>".$i."</option>";
                                                            }

                                                        }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="identificarTecnico">
                                                    <i class="fa fa-male fa-4x" aria-hidden="true"></i>
                                                    Foi facíl identificar o(s) técnico(s) enviado(s) para efetuar o serviço?
                                                </label>
                                                <br />
                                                <input type="radio" name="identificarTecnico" value="0"> Fácil identificação<br />
                                                <input type="radio" name="identificarTecnico" value="1"> Houve dúvidas na identificação<br />
                                                <input type="radio" name="identificarTecnico" value="2"> Difícil identificação<br />
                                                <input type="radio" name="identificarTecnico" value="3"> Muito difícil identificação
                                            </div>

                                            <div class="form-group">
                                                <label for="aparenciaTecnico">
                                                    <i class="fa fa-street-view fa-4x" aria-hidden="true"></i>
                                                    O(s) técnico(s) estavam com um boa aparência?
                                                </label>
                                                <br />
                                                <input type="radio" name="aparenciaTecnico" value="0"> Muito boa aparência<br />
                                                <input type="radio" name="aparenciaTecnico" value="1"> Boa aparência<br />
                                                <input type="radio" name="aparenciaTecnico" value="2"> Aparência regular<br />
                                                <input type="radio" name="aparenciaTecnico" value="3"> Má aparencia
                                            </div>

                                            <div class="form-group">
                                                <label for="cordialidadeTecnicos">
                                                    <i class="fa fa-thumbs-o-up fa-4x" aria-hidden="true"></i>
                                                    Quanto a cordialidade do(s) técnico(s) enviados para executar o serviço.
                                                </label>
                                                <br />
                                                <input type="radio" name="cordialidadeTecnicos" value="0"> Muito cordiais<br />
                                                <input type="radio" name="cordialidadeTecnicos" value="1"> Cordiais<br />
                                                <input type="radio" name="cordialidadeTecnicos" value="2"> Pouco cordiais<br />
                                                <input type="radio" name="cordialidadeTecnicos" value="3"> Não foram cordiais
                                            </div>

                                            <div class="form-group">
                                                <label for="tempoServico">
                                                    <i class="fa fa-clock-o fa-4x" aria-hidden="true"></i>
                                                    Quanto tempo o serviço levou para ser concluído?
                                                </label>
                                                <br />
                                                <input type="radio" name="tempoServico" value="0"> Rápido<br />
                                                <input type="radio" name="tempoServico" value="1"> Normal<br />
                                                <input type="radio" name="tempoServico" value="2"> Demorou um pouco<br />
                                                <input type="radio" name="tempoServico" value="3"> Demorou muito
                                            </div>

                                            <div class="form-group">
                                                <label for="agravanteServico">
                                                    <i class="fa fa-exclamation-triangle fa-4x" aria-hidden="true"></i>
                                                    Apareceu algum problema durante o serviço?
                                                </label>
                                                <br />
                                                <input type="radio" name="agravanteServico" value="0"> Nenhum problema adicional<br />
                                                <input type="radio" name="agravanteServico" value="1"> Nenhuma complicação relevante<br />
                                                <input type="radio" name="agravanteServico" value="2"> Houve alguns imprevistos<br />
                                                <input type="radio" name="agravanteServico" value="3"> Houve problemas graves.
                                            </div>

                                            <div class="form-group">
                                                <label for="expectativaServico">
                                                    <i class="fa fa-smile-o fa-4x" aria-hidden="true"></i>
                                                    O serviço que foi prestado a você atendeu suas expectativas.
                                                </label>
                                                <br />
                                                <input type="radio" name="expectativaServico" value="0"> Melhor do que o esperado.<br />
                                                <input type="radio" name="expectativaServico" value="1"> Atendeu as expectativas.<br />
                                                <input type="radio" name="expectativaServico" value="2"> Deixou um pouco a desejar.<br />
                                                <input type="radio" name="expectativaServico" value="3"> Não me agradou.
                                            </div>

                                            <div class="form-group">
                                                <label for="sugestaoArea">
                                                    <i class="fa fa-question-circle fa-4x" aria-hidden="true"></i>
                                                    Alguma sugestão ou crítica para podermos melhorar nossos serviços?
                                                </label>
                                                <br />
                                                <textarea id="sugestaoArea" name="sugestaoArea" class="form-control" rows="5"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <input type="button" id="enviarAvaliacao" name="enviarAvaliacao" value="ENTRAR" class="btn btn-primary">
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>

                        </body>

                    </html>

                <?php

            }else{

                //Caso a avaliação já tenha sido respondida antes
                ?>
                    <html>
                        <head>
                            <meta charset="utf-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1">

                            <title>Eficaz System - Formulário de qualidade de atendimento</title>

                            <meta name="description" content="">
                            <meta name="author" content="">
                            <link rel="icon" href="../imagens/favicon2.ico">

                            <!-- Bootstrap core CSS -->
                            <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

                            <!-- Jquery file -->
                            <script src="../js/jquery.js"></script>
                            <script src="../js/bootstrap.min.js"></script>

                            <style>
                                /* Sticky footer styles
                                -------------------------------------------------- */
                                html {
                                position: relative;
                                min-height: 100%;
                                }
                                body {
                                /* Margin bottom by footer height */
                                margin-bottom: 60px;
                                }
                                .footer {
                                position: absolute;
                                bottom: 0;
                                width: 100%;
                                /* Set the fixed height of the footer here */
                                height: 60px;
                                background-color: #f5f5f5;
                                }


                                /* Custom page CSS
                                -------------------------------------------------- */
                                /* Not required for template or sticky footer method. */

                                .container {
                                width: auto;
                                max-width: 680px;
                                padding: 0 15px;
                                }
                                .container .text-muted {
                                margin: 20px 0;
                                }
                            </style>
                        </head>
                        <body>
                            <!-- Begin page content -->
                           <div class="container">
                             <div class="page-header">
                               <a href="#"><img src="imagens/logo-eficaz-system_small.png" class="img-responsive"></a>
                             </div>
                             <p class="lead">Agradecemos que tenha retornado aqui.</p>
                             <p>A avaliação que você está acessando, já foi respondida, a Eficaz System está trabalhando com eles para tornar nosso atendimento a você cada vez melhor.</p>
                           </div>

                           <footer class="footer">
                             <div class="container">
                                <p class="">© <?php echo date('Y'); ?> Eficaz system - Sistema de avaliação de qualidade.</p>
                             </div>
                           </footer>
                        </body>
                    </html>
                <?php

                //echo "Avaliação já foi respondida.";

            }


        }else{

            //Caso o código de serviço esteja errado.

            echo "Teste de vazio.";

        }


        /*
        Array ( [0] => Array ( [id_teste] => 3 [0] => 3 [nome_cliente] => Fabiano [1] => Fabiano [email_cliente] => sistemaeficaz@sistema.eficazsystem.com.br [2] => sistemaeficaz@sistema.eficazsystem.com.br [status_respondido] => 0 [3] => 0 ) )
        */


    }else{
        //CASO USUÁRIO TENHA CHEGADO AQUI POR ACASO

        // Configura a url do login
        $login_uri = 'login.php';

        //var_dump($login_uri);

        // Redireciona via javascript
        echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
	    echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
    }


    // $myFile = "teste.txt";
    // $fh = fopen($myFile, 'w') or die("can't open file");
    // $stringData = $varTest."\n";
    // fwrite($fh, $stringData);
    // fclose($fh);

?>
