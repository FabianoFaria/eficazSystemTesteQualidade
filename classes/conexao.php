<?php

/**
* Classe de conexao com o banco
*
* Responsavel por gerenciar toda a conexao
* Select , query e fechamento da conexao
*/

class BancoDeDados
{

    # Variável que guarda a conexão PDO.
    protected static $db;

    # Private construct - garante que a classe só possa ser instanciada internamente.
    public function __construct()
    {

        # Informações sobre o banco de dados:

        // $db_host = "eficazqualidad.mysql.dbaas.com.br";
        // $db_nome = "eficazqualidad";
        // $db_usuario = "eficazqualidad";
        // $db_senha = "qwe!@#1968";
        // $db_driver = "mysql";

        # Informações sobre o sistema:
        $sistema_titulo = "Eficaz System - Avaliação de qualidade";
        $sistema_email = "sistemaeficaz@sistema.eficazsystem.com.br";

    }

    # Método estático - acessível sem instanciação.
    public static function conexao()
    {

        $db_host = "eficazqualidad.mysql.dbaas.com.br";
        $db_nome = "eficazqualidad";
        $db_usuario = "eficazqualidad";
        $db_senha = "qwe!@#1968";
        $db_driver = "mysql";


        /*
        * IMPLEMENTAÇÃO DE CONEXÃO DE PDO
        */
        $dsn = 'mysql:host='.$db_host.';dbname='.$db_nome.''; // define host name and database name
        $username = $db_usuario; // define the username
        $pwd = $db_senha; // password

        try {
            $db = new PDO($dsn, $username, $pwd);

            //RETONA OBJETO PDO
            return $db;
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "this is displayed because an error was found";
            //exit();
            return $error_message;
        }

        // try
        // {
        //     # Atribui o objeto PDO à variável $db.
        //     self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
        //     # Garante que o PDO lance exceções durante erros.
        //     self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     # Garante que os dados sejam armazenados com codificação UFT-8.
        //     self::$db->exec('SET NAMES utf8');
        // }
        // catch (PDOException $e)
        // {
        //     echo $e->getMessage();
        //
        //     # Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conexão.
        //     mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
        //     # Então não carrega nada mais da página.
        //     die("Connection Error: " . $e->getMessage());
        // }

    }


}


?>
