<?php

    if(isset($_POST['pessoaAcesso']) && isset($_POST['senhaAcesso'])){

        // session_start inicia a sessão
        session_start();

        $acessoPessoal      = $_POST['pessoaAcesso'];
        $senhaInformada     = $_POST['senhaAcesso'];

        require_once "classes/conexao.php";

        $conn = new BancoDeDados;

        $db = $conn->conexao();

        // prepare and bind
        $stmt = $db->prepare("SELECT email_usuario, senha_usuario, nome_usuario FROM tb_sistema_usuarios WHERE email_usuario = :email AND status = '1'");
        //$stmt->bind_param("s", $acessoPessoal);

        $stmt->execute(array(':email' => $acessoPessoal));
        $usuarioDados = $stmt->fetchAll();

        if(!empty($usuarioDados)){
            //Usuário encontrado
            //var_dump($usuarioDados[0]['email_usuario']);
            $nomeUsuario    = $usuarioDados[0]['nome_usuario'];
            $senhaHash      = $usuarioDados[0]['senha_usuario'];

            if (crypt($senhaInformada, $senhaHash) === $senhaHash) {
                //Configura a $_SESSION do usuário e redireciona para a index

                //Atualiza a ID de sessão
                session_regenerate_id();

                $_SESSION['userdata'] = $nomeUsuario;

                exit(json_encode(array('status' => true, 'mensagem' => 'Senha aceita!')));
            } else {
                exit(json_encode(array('status' => false, 'mensagem' => 'Senha ou usuário incorretos!')));
            }

        }else{
            //Usuário não encontrado
            exit(json_encode(array('status' => false, 'mensagem' => 'Usuário não encontrado!')));
        }

        //var_dump($usuarioDados);

    }elseif(isset($_POST['saida'])){

        //Simples destruição da sessão
        session_start() ;
        session_destroy() ;


        exit(json_encode(array('status' => true, 'mensagem' => 'Logout efetuado!')));

    }
    elseif(isset($_POST['novoUsuario']) && isset($_POST['novoEmail'])){

        //CADASTRO DE NOVO USUÁRIO

        $novoUsuario    = $_POST['novoUsuario'];
        $email_novo     = $_POST['novoEmail'];
        $senhaNova      = $_POST['novaSenha'];
        $confirmaSenha  = $_POST['confirmaSenha'];


    }
    elseif(isset($_POST['email_teste'])){

        // VERIFICAÇÂO DO SISTEMA SE O EMAIL DO NOVO USUÁRIO JÁ ESTÁ EM USO

        $email_teste = $_POST['email_teste'];

        require_once "classes/conexao.php";

        $conn = new BancoDeDados;

        $db = $conn->conexao();


        // prepare and bind
        $stmt = $db->prepare("SELECT email_usuario FROM tb_sistema_usuarios WHERE email_usuario = :email AND status = '1'");

        $stmt->execute(array(':email' => $email_teste));
        $usuarioDados = $stmt->fetchAll();

        if(!empty($usuarioDados)){

            // false DE EXISTENTE, LOGO IMPROPIO PARA SEGUIR
            echo json_encode(false);

        }else{

            //TRUE DE NÚMERO SIM NÃO EXISTENTE, CADASTRO PODE SEGUIR
            echo json_encode(true);

        }

    }
    else{

        exit(json_encode(array('status' => false, 'mensagem' => 'Erro de tentativa de login!')));

    }

?>
