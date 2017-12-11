<?php

class index extends Controller {
    function __construct() {
        session_start();
        parent::__construct();
    }

    function index() {

        if(!empty($_SESSION[SESSION_LOGIN]) AND (int)$_SESSION[SESSION_LOGIN]->usu_tipo === USUARIO) {
            $this->view->render('Usuario/index', 'usuario');
        }

        if(!empty($_SESSION[SESSION_LOGIN]) AND (int)$_SESSION[SESSION_LOGIN]->usu_tipo === ADMIN) {
            $this->view->render('Admin/index', 'admin');
        }


        if (empty($_SESSION[SESSION_LOGIN])){
          $this->login();
        }

}



    function login() {
        $this->view->render('index/login', 'login');
    }

    function logout(){
      session_destroy();
      header('Location:' . URL . 'Login/login'); exit();

    }

























}
