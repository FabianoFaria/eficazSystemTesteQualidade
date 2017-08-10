<?php

    //Arquivo contendo funções que podem ser uteis.

    // Função de porcentagem: Quanto é X% de N?
    function porcentagem_xn( $parcial, $total ) {

        //Verificação de divisão por zero
        if($total != 0){
            $porcentagem = ( $parcial * 100 ) / $total;
        }else{
            $porcentagem = 0;
        }

        return  number_format($porcentagem, 2, ',', '');
    }





?>
