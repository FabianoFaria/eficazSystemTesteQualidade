<?php

    //RECEBE OS DADOS VIA AJAX E RETORNA OS DADOS DE SATISFAÇÃO DO PERIODO

    if(isset($_POST['relatorio_inicio']) && isset($_POST['relatorio_fim'])){

        /*
            Array (
            [numero_servico] => e9cf146ef2dff5248ab6041ca413852b
            [0] => e9cf146ef2dff5248ab6041ca413852b
            [nome_avaliador] => fabiano [1] => fabiano
            [identificar_tecnico] => 0 [2] => 0
            [aparencia_tecnico] => 1 [3] => 1
            [cordialidade] => 0 [4] => 0
            [tempo_servico] => 1 [5] => 1
            [agravante] => 1 [6] => 1
            [expectativa] => 0 [7] => 0
            [nivel_recomendacao] => 10
            [8] => 10 ) 

        */


        exit(json_encode(array('status' => true, 'mensagem' => 'Requisição do período!')));

    }else{

        exit(json_encode(array('status' => false, 'mensagem' => 'Período incorreto!')));

    }

?>
