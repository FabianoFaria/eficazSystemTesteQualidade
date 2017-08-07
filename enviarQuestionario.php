<?php

    if(isset($_POST['nome_cliente']) && isset($_POST['servicoNumero']) && isset($_POST['emailEnd'])){

        //Em caso de mais um email seja mandado para diversos serviços
        $timeNow = date('Y-m-d h:i:s');

        $nomeCliente    = $_POST['nome_cliente'];
        $servicoNumero  = md5($_POST['servicoNumero']." ".$timeNow);
        $emailEnd       = $_POST['emailEnd'];

        require_once "classes/conexao.php";
        require_once "classes/email.php";

        $conn = new BancoDeDados;

        $db = $conn->conexao();

        // var_dump($db);
        // exit();

        if(empty($nomeCliente) || empty($servicoNumero) || empty($emailEnd)){

            exit(json_encode(array('status' => false, 'mensagem' => 'Verfique os dados enviados!')));

        }else{

            //insert data to database
            $sql = "INSERT INTO tb_avaliacao_cliente(nome_cliente, email_cliente, numero_servico) VALUES(:cliente, :email, :servico)";
            $query = $db->prepare($sql);

            $query->bindparam(':cliente', $nomeCliente);
            $query->bindparam(':email', $emailEnd);
            $query->bindparam(':servico', $servicoNumero);


            //exit(json_encode(array('status' => true, 'mensagem' => 'Dados registrados!')));

            $mailer = new email;

            $emailEnviado = $mailer->envioEmailAvaliacaoServico($emailEnd, $nomeCliente, $servicoNumero);

            //var_dump($emailEnviado);

            if($emailEnviado){

                //Após o envio do email, é registrado o envio no banco de dados.
                $query->execute();

                exit(json_encode(array('status' => true, 'mensagem' => 'Avaliação enviada!')));

            }else{
                exit(json_encode(array('status' => false, 'mensagem' => 'Erro ao enviar avaliação!')));
            }

        }

        //exit(json_encode(array('status' => true, 'mensagem' => 'Variaveis recebidas!')));

    }else{

        exit(json_encode(array('status' => false, 'mensagem' => 'Erro de envio!')));

    }

?>
