<?php

  require __DIR__.'/../vendor/autoload.php';

  Sirius\Config::setToken("eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxMyIsImp0aSI6IjdmMzU3NWMwOTU3ZWNjYjk2MzNjYzg4YWQ2OGE4MzZmODBhM2U3YTU2OGJjMzM2NWFlYzJiOTA5MTFhOTQ3ZDA3ZWMyNzIzZTJjN2JkNGRkIiwiaWF0IjoxNjM4Mjc3MzA1LjA0ODE3OCwibmJmIjoxNjM4Mjc3MzA1LjA0ODE4MSwiZXhwIjoyNTg0OTYyMTA1LjA0Mjc3MSwic3ViIjoiMjYiLCJzY29wZXMiOlsic2FsZSJdfQ.i59JYPrqUAchb9oEGqH0WuX-yopwL9tmi4FXfokDjsZO1iUL5vEezSsZASvvgzYwUrBjIxrH4b9GV_cPKGNKadiKIaiCHhaGP3ttyrYOozZOiI0l7t1wO6kif5lPy86ItTen6cg5_Atlyxpg-Bwi6j6OfrS__MvjN_QOZ08wlq4lhD-JKZJu2UseMwG5Mzar-grZGppDa3FrqW30JX0_1yNf6ei_icCbJ-zg8LNnMp3zF1Go5XUBVrgC-FxHERLI8p-T59N5XeTISUsSQRXviqgTBlEenP5MYReO0iZ9GHZ3NUEUqP9h_wJfgTm-ELYjD3QpfYW4E40eME3pwxpUPtgL3WBAR8O2Vrfm7QXKXseMZJWf1iUeiehWgGZ_LkedRLj26uN0DEM7WM9goqa3X0SMXvzQKCoDlR0l9eBkg71dPdBhR41h0Cscdt6qjf6SutIuOD7DCRjdwsebCEoVhj4Rltb6WugC-cXMl_Fo7ax4dN12yRdHeGbZcRM2g7Ho0hQ_4p8GQz89FjJ2AmJz4NT4-UeynqBNBPqE1R-ubpfeIhf4nDof5qt-5UZ3cMCzI9_gTwFXmcHQhg_f-TtCrl5eqDMALY_DMFBXF95EHWTSFDLWt1rD15gYUzoO_u3-S07ILD5B23K2-dMb1HYVD1Xq8CcGcSLxi2SojbujeQ0");

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