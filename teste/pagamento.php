<?php

  require __DIR__.'/../vendor/autoload.php';

  Sirius\Config::setToken("SEU_TOKEN");

  // Item
  $item = new Sirius\Item();
  $item -> id = "5";
  $item -> name = "Caneta Alta Rotação LED Preta";
  $item -> price = 10000;
  $item -> quantity = 1;
  $item -> product_type = "physical_goods";

  // Cartão
  $card = new Sirius\Card();
  $card  -> holder_name = "APROVADO";
  $card  -> number = "5545980854977869";
  $card  -> cvv = "123";
  $card  -> expiration_date = "10/2025";

  // Pagador
  $payer = new Sirius\Payer();
  $payer -> name = "Roberto Silva";
  $payer -> email = "robertosilva@hotmail.com";
  $payer -> first_name = "Roberto";
  $payer -> last_name = "Silva";
  $payer -> document_type = "cpf";
  $payer -> document_number = "60002212820";
  $payer -> telephone = "11222222222";
  $payer -> address = array(
    'street' => 'Avenida x',
    'number' => "1234",
    'complement' => "",
    "district" => "Teste",
    "city" => "Resende",
    "state" => "rj",
    "country" => "Brasil",
    "postal_code" => "27520174"
  );

  // Pagamento
  $payment = new Sirius\Payment();
  $payment -> payer = $payer;
  $payment -> card = $card;
  $payment -> items = array($item);
  $payment -> payment_method = "credit_card";
  $payment -> amount = 10000;
  $payment -> shipping_amount = "000";
  $payment -> installments = 3;
  $payment -> installments_interest_free = 3;
  $payment -> invoice_description = "Descrição da fatura";
  $payment -> attempt_reference = "api-6q510ZOjpX3E9D4-roegNjNOoRzgKwj";
  $payment -> save();

  print_r([
    'status' => $payment -> status,
    'response' => $payment -> response
  ]);