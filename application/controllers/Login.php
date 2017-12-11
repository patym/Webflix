<?php
class Login extends Controller {
    function __construct() {
        parent::__construct();

    }

  public function login(){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $verificador = $this->model->verificaLogin($email, $senha);

    if (!empty($verificador)){
        if($email === $verificador->usu_email AND $senha === $verificador->usu_senha){
          $this->model->logaUsuario($email, $senha);
          if((int)$_SESSION[SESSION_LOGIN]->usu_tipo === ADMIN){
            $retorno = [
              'status' => 1,
              'msg' => 'Bem vindo ' . $_SESSION[SESSION_LOGIN]->usu_nome . ' !',
              'url' =>  URL . 'Admin/index'
              ];
          }
          if((int)$_SESSION[SESSION_LOGIN]->usu_tipo === USUARIO){
            $retorno = [
              'status' => 1,
              'msg' => 'Bem vindo ' . $_SESSION[SESSION_LOGIN]->usu_nome . ' !',
              'url' =>  URL . 'Usuario/index'
              ];
          }
        }else{
          $retorno = [
            'status' => 0,
            'msg' => 'Usuário ou Senha incorreto !',
            'url' =>  URL
          ];
        }
    }else{
      $retorno = [
        'status' => 0,
        'msg' => 'Usuário não encontrado !',
        'url' =>  URL
      ];
    }

    $this->view->jsonEncode($retorno);
}


    function cadastro(){

      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $nome =  $_POST['nome'];

      if(!empty($email) AND !empty($senha) AND !empty($nome)){
        $dados = [
          'usu_nome' => $nome,
          'usu_senha' => $senha,
          'usu_email' => $email,
          'usu_tipo' => USUARIO,
          'usu_status' => ATIVO
        ];
        $this->model->cadastro($dados);
        Transaction::close();
        $retorno = [
          'status' => 1,
          'msg' => 'Cadastro efetuado com sucesso !',
          'url' =>  URL
        ];
      }else{
        $retorno = [
          'status' => 0,
          'msg' => 'Não foi possivel realizar o cadastro, dados inválidos !',
          'url' =>  URL
        ];
      }
      $this->view->jsonEncode($retorno);
    }


    function logout(){
      session_destroy();
      header("location:" . URL . 'index/index');
      exit;
    }


























}//fecha controller

?>
