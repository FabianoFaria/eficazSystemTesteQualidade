<?php

    //RECEBE OS DADOS VIA AJAX E RETORNA OS DADOS DE SATISFAÇÃO DO PERIODO

    if(isset($_POST['relatorio_inicio']) && isset($_POST['relatorio_fim'])){

        require_once "classes/conexao.php";
        require_once "classes/funcoes_uteis.php";

        $conn = new BancoDeDados;

        $db = $conn->conexao();

        $dataInicial       = implode("-", array_reverse(explode("/", $_POST['relatorio_inicio'])));

        $dataFinal         = implode("-", array_reverse(explode("/", $_POST['relatorio_fim'])));

        // prepare and bind
        $stmt = $db->prepare("SELECT numero_servico, nome_avaliador, identificar_tecnico, aparencia_tecnico, cordialidade, tempo_servico, agravante, expectativa, nivel_recomendacao FROM tb_resposta_cliente WHERE data_resposta BETWEEN :dataInicial AND :dataFinal");
        $stmt->execute(array(':dataInicial' => $dataInicial.' 00:00:00', ':dataFinal' => $dataFinal.' 23:59:59'));
        $clientesDados = $stmt->fetchAll();

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

        $arrayNota = array("0" => $nota0, "1" => $nota1, "2" => $nota2, "3" => $nota3, "4" => $nota4, "5" => $nota5, "6" => $nota6, "7" => $nota7, "8" => $nota8, "9" => $nota9, "10" => $nota10 );
        //$arrayNota = array("data" => [["0", 2], ["1", 3]]);

        exit(json_encode(array( 'status' => true,
                                'mensagem' => 'Requisição do período!',
                                'recomendacao' => $arrayNota,
                                'identificar_tecnicoA' => porcentagem_xn($identificacaoA, $totalRespostas),
                                'identificar_tecnicoB' => porcentagem_xn($identificacaoB, $totalRespostas),
                                'identificar_tecnicoC' => porcentagem_xn($identificacaoC, $totalRespostas),
                                'identificar_tecnicoD' => porcentagem_xn($identificacaoD, $totalRespostas),
                                'aparencia_tecnicoA' => porcentagem_xn($aparenciaA, $totalRespostas),
                                'aparencia_tecnicoB' => porcentagem_xn($aparenciaB, $totalRespostas),
                                'aparencia_tecnicoC' => porcentagem_xn($aparenciaC, $totalRespostas),
                                'aparencia_tecnicoD' => porcentagem_xn($aparenciaD, $totalRespostas),
                                'cordialidadeA' => porcentagem_xn($cordialidadeA, $totalRespostas),
                                'cordialidadeB' => porcentagem_xn($cordialidadeB, $totalRespostas),
                                'cordialidadeC' => porcentagem_xn($cordialidadeC, $totalRespostas),
                                'cordialidadeD' => porcentagem_xn($cordialidadeD, $totalRespostas),
                                'tempo_servicoA' => porcentagem_xn($tempoA, $totalRespostas),
                                'tempo_servicoB' => porcentagem_xn($tempoB, $totalRespostas),
                                'tempo_servicoC' => porcentagem_xn($tempoc, $totalRespostas),
                                'tempo_servicoD' => porcentagem_xn($tempoD, $totalRespostas),
                                'agravanteA' => porcentagem_xn($agravanteA, $totalRespostas),
                                'agravanteB' => porcentagem_xn($agravanteB, $totalRespostas),
                                'agravanteC' => porcentagem_xn($agravanteC, $totalRespostas),
                                'agravanteD' => porcentagem_xn($agravanteD, $totalRespostas),
                                'expectativaA' => porcentagem_xn($expectativaA, $totalRespostas),
                                'expectativaB' => porcentagem_xn($expectativaB, $totalRespostas),
                                'expectativaC' => porcentagem_xn($expectativaC, $totalRespostas),
                                'expectativaD' => porcentagem_xn($expectativaD, $totalRespostas),
                            )));

    }
    elseif(isset($_GET['relatorio_inicio_csv']) && isset($_GET['relatorio_fim_csv'])){

        require_once "classes/conexao.php";

        $conn = new BancoDeDados;

        $db = $conn->conexao();

        $dataInicial       = implode("-", array_reverse(explode("/", $_GET['relatorio_inicio_csv'])));

        $dataFinal         = implode("-", array_reverse(explode("/", $_GET['relatorio_fim_csv'])));

        // prepare and bind
        $stmt = $db->prepare("SELECT numero_servico, nome_avaliador, identificar_tecnico, aparencia_tecnico, cordialidade, tempo_servico, agravante, expectativa, nivel_recomendacao FROM tb_resposta_cliente WHERE data_resposta BETWEEN :dataInicial AND :dataFinal");
        $stmt->execute(array(':dataInicial' => $dataInicial.' 00:00:00', ':dataFinal' => $dataFinal.' 23:59:59'));
        $clientesDados = $stmt->fetchAll();

        //Variaveis para as notas

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

        // Definimos o nome do arquivo que será exportado
        $arquivo = 'planilha.xls';

        // Criamos uma tabela HTML com o formato da planilha
        $html = '';
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Planilha teste '.$_GET['relatorio_inicio_csv'].' ate '.$_GET['relatorio_fim_csv'].'</tr>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3"><b>Criterio</b></td>';
        $html .= '<td><b>Muito bom</b></td>';
        $html .= '<td><b>bom</b></td>';
        $html .= '<td><b>Ruim</b></td>';
        $html .= '<td><b>Muito ruim</b></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Identificacao</td>';
        $html .= '<td>'.$identificacaoA.'</td>';
        $html .= '<td>'.$identificacaoB.'</td>';
        $html .= '<td>'.$identificacaoC.'</td>';
        $html .= '<td>'.$identificacaoD.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Aparencia</td>';
        $html .= '<td>'.$aparenciaA.'</td>';
        $html .= '<td>'.$aparenciaB.'</td>';
        $html .= '<td>'.$aparenciaC.'</td>';
        $html .= '<td>'.$aparenciaD.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Cordialidade</td>';
        $html .= '<td>'.$cordialidadeA.'</td>';
        $html .= '<td>'.$cordialidadeB.'</td>';
        $html .= '<td>'.$cordialidadeC.'</td>';
        $html .= '<td>'.$cordialidadeD.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Tempo do servico</td>';
        $html .= '<td>'.$tempoA.'</td>';
        $html .= '<td>'.$tempoB.'</td>';
        $html .= '<td>'.$tempoC.'</td>';
        $html .= '<td>'.$tempoD.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Agravantes</td>';
        $html .= '<td>'.$agravanteA.'</td>';
        $html .= '<td>'.$agravanteB.'</td>';
        $html .= '<td>'.$agravanteC.'</td>';
        $html .= '<td>'.$agravanteD.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Cordialidade</td>';
        $html .= '<td>'.$expectativaA.'</td>';
        $html .= '<td>'.$expectativaB.'</td>';
        $html .= '<td>'.$expectativaC.'</td>';
        $html .= '<td>'.$expectativaD.'</td>';
        $html .= '</tr>';
        $html .= '</table>';

        $html .= '<br />';
        $html .= '<br />';

        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td colspan="3"><h3> Notas dadas pelas pessoas<h3/></tr>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3"><b>Notas</b></td>';
        $html .= '<td><b> 0</b></td>';
        $html .= '<td><b> 1</b></td>';
        $html .= '<td><b> 2</b></td>';
        $html .= '<td><b> 3</b></td>';
        $html .= '<td><b> 4</b></td>';
        $html .= '<td><b> 5</b></td>';
        $html .= '<td><b> 6</b></td>';
        $html .= '<td><b> 7</b></td>';
        $html .= '<td><b> 8</b></td>';
        $html .= '<td><b> 9</b></td>';
        $html .= '<td><b> 10</b></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="3">Total de votos</td>';
        $html .= '<td>'.$nota0.'</td>';
        $html .= '<td>'.$nota1.'</td>';
        $html .= '<td>'.$nota2.'</td>';
        $html .= '<td>'.$nota3.'</td>';
        $html .= '<td>'.$nota4.'</td>';
        $html .= '<td>'.$nota5.'</td>';
        $html .= '<td>'.$nota6.'</td>';
        $html .= '<td>'.$nota7.'</td>';
        $html .= '<td>'.$nota8.'</td>';
        $html .= '<td>'.$nota9.'</td>';
        $html .= '<td>'.$nota10.'</td>';
        $html .= '</tr>';
        $html .= '</table>';

        // Configurações header para forçar o download
        header ("Expires: Mon, 26 Jul 2018 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" ); 
        header ("Content-Description: PHP Generated Data" );

        // @header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
        // @header("Content-type: text/x-xls");
        // //@header("Content-type: application/x-msexcel");
        // // If the file is NOT requested via AJAX, force-download
        // if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        //     header("Content-Disposition: attachment; filename=planilha.xls");
        // }

        // Envia o conteúdo do arquivo
        echo $html;
        exit;
        //exit(json_encode(array('status' => true, 'mensagem' => 'Teste em curso!')));

    }
    else{

        exit(json_encode(array('status' => false, 'mensagem' => 'Período incorreto!')));

    }

?>
