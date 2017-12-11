<?php

class util {

    function __construct() {

    }

    /**
     * Converte uma string para decimal para ser gravado no banco de dados
     * @param string $string
     * @return float
     */
    function stringToFloat($string) {
        try {
            $aux = str_replace('.', '', $string);
            $number = str_replace(',', '.', $aux);
            return floatval($number);
        } catch (Exception $ex) {
            throw new Exception('O valor recebido é invalido para conversão de moedas');
        }
    }

    /**
     * Converte um valor recebido para o sistema monetario
     * @param float $float
     * @return string
     */
    function floatToCurrency($float) {
        return number_format($float, 2, ',', '.');
    }

    /**
     * Retorna a data e hora atual
     * @return STRING data atual
     */
    function dateAtual() {
        return date('d/m/Y H:i:s');
    }

    function dateHoraAtual(){
      return date('d/m/Y H:i:s');
    }

    function dateServerAtual(){
      return date('d/m/Y');
    }

    /**
     * Converte a data recebida do banco de dados para o formato dd/mm/yyy - hh:mm:ss
     * @param STRING $time
     * @return STRING
     */
    function dateToPtBR($time) {
        return date('d/m/Y - H:i:s', strtotime($time));
    }

    function dateToMDN($time) {
        return date('d/m/Y - H:i', strtotime($time));
    }

    function date($time) {
        return date('d/m/Y', strtotime($time));
    }

    /**
     * Converte uma data em formato yyyy-mm-dd hh:mm:ss
     * @param type $time
     * @return type
     */
    function dateToDataBase($time) {
        return implode('-', array_reverse(explode('/', $time)));
    }

    /**
     * Retona a data atual no formato yyyy-mm-dd hh:mm:ss
     * Proposito gravar em  um banco de dados
     * @return string
     */
    function dateToDataBaseAtual() {
        return date('Y-m-d H:i:s');
    }

    function dateFutureMinutes($time) {
        return DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', strtotime("+ {$time} minutes")));
    }

    /**
     *
     * @param real $val
     * @return real
     */
    function round($val) {
        return round($val, 2);
    }

    /**
     * Normaliza a exibição de uma agencia bancaria
     * @param string $prefixo
     * @param string $digitoVerificador
     * @return string
     */
    function normalizeDadosBancario($prefixo, $digitoVerificador) {
        $dados = [
            $prefixo,
            $digitoVerificador
        ];
        return implode('-', array_filter($dados));
    }

    function statusAcesso($valor){
      if ($valor === ATIVO){
        $status = '<span class="label label-info">ativo</span>';
      }
      if ($valor === BLOQUEADO){
        $status = '<span class="label label-warning">bloqueado</span>';
      }
      if ($valor === INATIVO){
        $status = '<span class="label label-default">inativo</span>';
      }
      if ($valor === CANCELADO){
        $status = '<span class="label label-inverse">cancelado</span>';;
      }
      return $status;
    }

    function statusChat($valor) {
      if ($valor === OFF_LINE){
        $status = '<label class="contato-status status-offline">Offline</label>';
      }
      if ($valor === ON_LINE){
        $status = '<label class="contato-status status-online">Online</label>';
      }
      if ($valor === EM_JOGO){
        $status = '<label class="contato-status status-jogando">Em Jogo</label>';
      }
      if ($valor === MESTRANDO){
        $status = '<label class="contato-status status-jogando">Mestrando</label>';
      }
      if ($valor === OCUPADO){
        $status = '<label class="contato-status status-ocupado">Ocupado</label>';
      }
      return $status;
    }

/* Retorna em forma de estrelas o valor de carisma de um usuário */

function makeCarismaIcon($carisma){
  if ((int)$carisma >= 1 AND (int)$carisma <= 49){
    $estrela = '<spam title="seu total de carisma é ' . $carisma . '"><i class="fa fa-star-half-o"></i></spam>';
  }
  if ((int)$carisma >= 50 AND (int)$carisma <= 99){
    $estrela = '<spam title="seu total de carisma é ' . $carisma . '"><i class="fa fa-star"></i></spam>';
  }
  if ((int)$carisma >= 100 AND (int)$carisma <= 199){
    $estrela = '<spam title="seu total de carisma é ' . $carisma . '"><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></spam>';
  }
  if ((int)$carisma >= 200 AND (int)$carisma <= 399){
    $estrela = '<spam title="seu total de carisma é ' . $carisma . '"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></spam>';
  }
  if ((int)$carisma >= 400 AND (int)$carisma <= 599){
    $estrela = '<spam title="seu total de carisma é ' . $carisma . '"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></spam>';
  }
  if ((int)$carisma >= 600 AND (int)$carisma <= 999){
    $estrela = '<spam title="seu total de carisma é ' . $carisma . '"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></spam>';
  }
  if ((int)$carisma >= 1000){
    $estrela = '<spam title="seu total de carisma é ' . $carisma . '"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></spam>';
  }
  /* Termina exibição de estrelas*/
/* Se o carisma for menor que 1, ele exibe uma mensagem ao usuário*/
  if ((int)$carisma < 1){
    $estrela = 'Você não possui pontuação';
  }
  /* Envia a variavel pra view */
  return $estrela;
}

/* Função criada para maskarar campos e re-organizar valores inseridos pelo usuário */
    function mask($val, $mask){
      $maskared = '';
      $k = 0;
      for($i = 0; $i<=strlen($mask)-1; $i++){
        if($mask[$i] == '#'){
            if(isset($val[$k])){
                $maskared .= $val[$k++];
                }else{
                  if(isset($mask[$i])){
                    $maskared .= $mask[$i];
                    }
                  }
                }
              }
              return $maskared;
            }

/* Fecha o util */
}
