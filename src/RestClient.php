<?php


  namespace Sirius;

  use Curl\Curl;

  class RestClient extends Curl{

    public function __construct() {
      parent::__construct();
      
      $this -> setHeader('Authorization', 'Bearer ' . Config::getToken());
    }

    /**
     * Essa função é utilizada para calcular o valor de cada uma das n parcelas de uma compra no cartão de crédito e o valor final após 
     * aplicar os juros.
     * 
     * Exemplo de uso:
     * 
     * getInstallments([
     *  'installments' => 12,
     *  'installments_interest_free' => 5,
     *  'amount' => 1000
     * ])
     * 
     * Referência: https://documenter.getpostman.com/view/15800813/Tzz7PdVU#35bb127a-4bc1-4abf-b1ca-87a1abeeedf6
     */
    public function getInstallments($data = array()) {
      $this -> post(Config::getUrlApi() . "get-installments", $data);
      return $this -> response;
    }

    public function payments($data) {
      $this -> post(Config::getUrlApi() . "payments", $data);
      return $this -> response;
    }

    public function sales() {
      $this -> get(Config::getUrlApi() . "sales");
      return $this -> response;
    }

    // public function salesId($id) {
    //   $this -> get(Config::getUrlApi() . "sales/$id");
    //   return $this -> response;
    // }

  }