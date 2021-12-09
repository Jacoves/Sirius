# PHP Sirius Gatway

A sirius-gateway consome a API da Sirius. A documentação você encontra aqui https://documenter.getpostman.com/view/15800813/Tzz7PdVU

## Requisitos

* PHP >= 7.0

## Dependências

  Esta biblioteca requer a seguinte lib

  - [`php-curl-class`](https://github.com/php-curl-class/php-curl-class)

  Se você usa o Composer, essas dependencias são gerenciadas automaticamente.

## Instalação

Para instalar essa dependência use o comando abaixo:
```shell
composer require jacoves/sirius-gatway
```

## Utilização

Para obter as últimas transações realizadas use:


```php
<?php
  
  require __DIR__.'/vendor/autoload.php';

  Sirius\Config::setToken("SEU_TOKEN");
  
  $restClient = new Sirius\RestClient();
  $response = $restClient -> sales();
  
  echo "<pre>";
  print_r($response);
  echo "</pre>";
```


Para simular uma compra você pode utilizar o exemplo abaixo:


```php
<?php

  require __DIR__.'/vendor/autoload.php';

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

  echo "<pre>";
  print_r([
    'status' => $payment -> status,
    'response' => $payment -> response
  ]);
  echo "</pre>";
```

