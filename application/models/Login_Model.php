<?php
class Login_Model extends Model {
    /*
     * Nomes dos campos onde ficam o usuário e a senha no DB
     * Formato: tipo => nome do campo na tabela
     * @var array
     * @since v1.0
     */

    var $campos = array(
        'email' => 'usu_email',
        'senha' => 'usu_senha'
      );

    /**
    * Define os campos do Array
    * Que  a variavel de sessão
    * ira carregar pelo sistema
    */
    var $dados = array(
        'usu_id',
        'usu_nome',
        'usu_senha',
        'usu_email',
        'usu_tipo',
        'usu_status'
        );
    /**
     * Inicia a sessão se necessário
     */
    var $iniciaSessao = true;

    /**
     * Prefixo das chaves usadas na sessão
     *
     * @var string
     * @since v1.0
     */
    var $prefixoChaves = SESSION_LOGIN;

    /**
     * Usa um cookie para melhorar a segurança
     */
    var $cookie = true;

    /**
     */
    var $caseSensitive = true;

    /**
     * Filtra os dados antes de consultá-los usando mysql_real_escape_string()?
     * Prejudica a performance do servidor, por hora desabilitado
     */
    var $filtraDados = false;

    /**
     * Quantidade (em dias) que o sistema lembrará os dados do usuário ("Lembrar minha senha")
     * Usado apenas quando o terceiro parâmetro do método Usuario::logaUsuario() for true
     * Os dados salvos serão encriptados usando base64
     * (uso experimental, não mudar o valor de 1)
     */
    var $lembrarTempo = 1;

    /**
     * Diretório a qual o cookie vai pertencer
     * Atenção: Não edite se você não souber o que está fazendo!
     *
     * @var string
     * @since v1.1
     */
    var $cookiePath = '/';

    /**
     * Armazena as mensagens de erro
     */
    var $erro = '';
    // irá receber uma conexão
    public $conex = null;

    // constructor
    public function __construct() {
        parent::__construct();
        session_start();
    }

    function logaUsuario($email, $senha) {
            if ($this->dados != false) {
                // Monta o formato SQL da lista de campos
                $dados = '' . join(', ', array_unique($this->dados)) . '';
                // Consulta os dados
                try {
                // executa a query
                $query = "SELECT {$dados} FROM usuario WHERE usu_email = '{$email}'";
                    //grava o resultado na sessão
                    $_SESSION[SESSION_LOGIN] = $this->db->select($query)[0];
//                    var_dump($_SESSION[SESSION_LOGIN]);
//                    die;
                    // desconecta
                    // retorna o resultado da query se houver erro
                } catch (PDOException $ex) {
                    $msg = "Não foi possivel conectar-se ao banco de dados, contacte o administrador !";
                }
            }

            // Define um cookie para maior segurança?
            if ($this->cookie) {
                // Monta uma cookie com informações gerais sobre o usuário: usuario, ip e navegador
                $valor = join('#', array($email, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']));
                // Encripta o valor do cookie
                $valor = sha1($valor);
                // Cria o cookie
                setcookie($this->prefixoChaves . 'token', $valor, 0, $this->cookiePath);
                $this->conex = null;
            }
                // Fim da verificação, retorna true
                return true;
    }


   function verificaLogin($email, $senha){
     $SQL = "SELECT * FROM usuario WHERE usu_email = '{$email}' AND usu_senha = '{$senha}'";
     $resultado = $this->db->select($SQL);

     if(count($resultado) > 0){
      return $this->db->select($SQL)[0];
    }else{
        return $this->db->select($SQL);
    }
   }

/*
   function cadastro($usuario, $senha, $email, $aniversario, $dataCadastro, $sexo, $tipo, $status, $img, $nickname){
     $SQL = "INSERT INTO usuario (usu_login, usu_senha, usu_email, usu_aniversario, usu_data_cadastro, usu_sexo, usu_tipo, usu_status, usu_img, usu_nickname) VALUES ('{$usuario}', '{$senha}', '{$email}', '{$aniversario}', '{$dataCadastro}', '{$sexo}', '{$tipo}', '{$status}', '{$img}', '{$nickname}')";
     return $this->db->_query($SQL);
   }
*/

function cadastro($dados){
  return $this->db->insert('usuario', $dados);
}

function checkUser($nome, $email){
  $SQL = "SELECT * FROM usuario WHERE usu_nome = {$nome} OR usu_email = {$email}";
  return $this->db->_query($SQL);
}


}//fecha a classe
