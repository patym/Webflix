<?php

class View {

    /**
     * Define o titulo da pagina
     */
    public $title_page = "MDN - Online";


    function __construct() {
        $this->util = new util();
    }

    public function render($name, $header = 'jogador', $noInclude = TRUE) {
        if ($noInclude === FALSE) {
            require_once 'application/views/' . $name . '.php';
        } else {
            require_once 'application/views/header_' . $header . '.php';
            require_once 'application/views/' . $name . '.php';
            require_once 'application/views/footer_' . $header . '.php';
        }
    }

    private function img($usu_login){
      $img = URL . 'public/avatars/users/' . $usu_login . '.png';
      return $img;
    }

    private function imgSala($sala_id){
      $img = URL . 'public/avatars/salas' . $sala_id . '.png';
      return $img;
    }

    private function geraTimestamp($data) {
        $partes = explode('/', $data);
        return mktime($partes[3], $partes[4], $partes[5], $partes[1], $partes[0], $partes[2]);
    }

    private function getTimeStamp($dataInicial) {
        // Usa a função criada e pega o timestamp das duas datas:
        $time_inicial = $this->geraTimestamp(date('d/m/Y/H/i/s', strtotime($dataInicial)));
        $time_final = $this->geraTimestamp(date('d/m/Y/H/i/s'));
        return (int) floor(($time_final - $time_inicial) / 60);
    }

    function normalizeDataHora($dataInicial) {
        $time = $this->getTimeStamp($dataInicial);
        if ($time === 0) {
            return "agora";
        }
        if ($time < 60) {
            return $time . " min";
        } else if ($time < 120) {
            return "1 hr";
        } else {
            $horas = (int) floor(($time) / 60);
            if ($horas < 24) {
                return $horas . " hrs";
            } else if ($horas < 25) {
                return "1 dia";
            } else if ($horas > 25) {
                return (int) floor(($horas) / 60) + 1 . " dias";
            }
        }
    }

    function error($err) {
        require_once 'application/views/error/' . $err . '.php';
    }

    function jsonEncode($dados) {
        header('Content-Type: application/json');
        echo json_encode($dados, JSON_PRETTY_PRINT);
    }

    function objToArr($obj) {
        $arr = [];
        foreach ($obj as $kobj => $vobj) {
            $arr[$kobj] = $vobj;
        }
        return $arr;
    }

}
