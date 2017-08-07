<?php
    // Display erros
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    if(isset($_POST['identificarTecnico'])&& isset($_POST['aparenciaTecnico'])&& isset($_POST['cordialidadeTecnicos'])&& isset($_POST['tempoServico'])&& isset($_POST['agravanteServico'])&& isset($_POST['expectativaServico'])&& isset($_POST['medidaRecomendacao'])&& isset($_POST['sugestao'])){

        $nomeAvaliador          = $_POST['nomeCliente'];
        $numeroServico          = $_POST['numeroServico'];
        $identificaTecnico      = $_POST['identificarTecnico'];
        $aparenciaTecnico       = $_POST['aparenciaTecnico'];
        $cordialidade           = $_POST['cordialidadeTecnicos'];
        $tempoServico           = $_POST['tempoServico'];
        $agravante              = $_POST['agravanteServico'];
        $expectatva             = $_POST['expectativaServico'];
        $medidaRecomendacao     = $_POST['medidaRecomendacao'];
        $sugestao               = $_POST['sugestao'];


        require_once "classes/conexao.php";

        $conn = new BancoDeDados;

        $db = $conn->conexao();

        //Debug para mostrar possiveis erros de PDO
        //$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        $sql = "INSERT INTO tb_resposta_cliente(numero_servico, nome_avaliador, identificar_tecnico, aparencia_tecnico, cordialidade, tempo_servico, agravante, expectativa, nivel_recomendacao, sugestao)
                VALUES(:numeroServico, :avaliador, :identificaca, :aparencia, :cordialidade, :tempo, :agravante, :expectativa, :nivel_recomendacao, :sugestao)";
        $query = $db->prepare($sql);

        $query->bindparam(':numeroServico', $numeroServico, PDO::PARAM_STR);
        $query->bindparam(':avaliador', $nomeAvaliador, PDO::PARAM_STR);
        $query->bindparam(':identificaca', $identificaTecnico, PDO::PARAM_STR);
        $query->bindparam(':aparencia', $aparenciaTecnico, PDO::PARAM_STR);
        $query->bindparam(':cordialidade', $cordialidade, PDO::PARAM_STR);
        $query->bindparam(':tempo', $tempoServico, PDO::PARAM_STR);
        $query->bindparam(':agravante', $agravante, PDO::PARAM_STR);
        $query->bindparam(':expectativa', $expectatva, PDO::PARAM_STR);
        $query->bindparam(':nivel_recomendacao', $medidaRecomendacao, PDO::PARAM_STR);
        $query->bindparam(':sugestao', $sugestao, PDO::PARAM_STR);

        $resultadoQuery =  $query->execute();

        if($resultadoQuery){

            //Após salvar os dados da resposta, atualiza o status da avaliação
            $statusAvaliacao = "1";

            $sqlUpdate      = "UPDATE tb_avaliacao_cliente SET status_respondido = :novoStatus WHERE numero_servico = :numero_servico";
            $queryUpdate    = $db->prepare($sqlUpdate);
            $queryUpdate->bindparam(':novoStatus', $statusAvaliacao, PDO::PARAM_STR);
            $queryUpdate->bindparam(':numero_servico', $numeroServico, PDO::PARAM_STR);

            $queryUpdate->execute();

            exit(json_encode(array('status' => true, 'mensagem' => 'Sua resposta foi guardada, obrigado por dispor do seu tempo para melhorar nossos serviços!')));

        }else{
            exit(json_encode(array('status' => false, 'mensagem' => 'Erro de tentativa de guardar sua avaliação, favor tentar enviar mais tarde!')));
        }

    }else{

        exit(json_encode(array('status' => false, 'mensagem' => 'Erro de tentativa de processar sua avaliação, favor tentar enviar mais tarde!')));

    }

?>
