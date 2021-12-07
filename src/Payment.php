<?php


  namespace Sirius;

  use Curl\Curl;

  class Payment {

    protected $restClient;

    /**
     * payer
     * @var object
     * @Attrbiute()
     */
    public $payer;

    /**
     * card
     * @var string
     * @Attribute()
     */
    public $card;

    /**
     * items
     * @var array
     * @Attribute()
     */
    public $items = array();

    /**
     * payment
     * @var array
     * @Attribute()
     */
    public $payment;

    /**
     * payment_method
     * @var string
     * @Attribute()
     */
    public $payment_method;

    /**
     * amount
     * @var int
     * @Attribute()
     */
    public $amount;

    /**
     * installments
     * @var int
     * @Attribute()
     */
    public $installments;

    /**
     * installments_interest_free
     * @var int
     * @Attribute()
     */
    public $installments_interest_free;

    /**
     * invoice_description
     * @var string
     * @Attribute()
     */
    public $invoice_description;

    /**
     * attempt_reference
     * @var string
     * @Attribute()
     */
    public $attempt_reference;

    /**
     * shipping_amount
     * @var int
     * @Attribute()
     */
    public $shipping_amount;

    /**
     * status
     * @var string
     * @Attribute()
     */
    public $status;

    /**
     * response
     * @var array
     * @Attribute()
     */
    public $response;

    public function __construct() {
      $this -> restClient = new RestClient();
    }

    public function save() {
      $data = [
        'customer' => array(), 
        'items' => array(),
        'card' => array()
      ];

      // Customer
      foreach(get_class_vars(get_class($this -> payer)) as $key => $value) {
        if(!empty($this -> payer -> $key)) {
          $data['customer'] += [$key => $this -> payer -> $key];
        }
      }

      // Items
      $items_array = array();
      foreach($this -> items as $item) {
        foreach(get_class_vars(get_class($item)) as $key => $value) {
          if(!empty($item -> $key)) {
            $items_array += [$key => $item -> $key];
          }
        }
        array_push($data['items'], $items_array);
      }

      // Card
      foreach(get_class_vars(get_class($this -> card)) as $key => $value) {
        if(!empty($this -> card -> $key)) {
          $data['card'] += [$key => $this -> card -> $key];
        }
      }

      // Payment
      $payment_attributes = [
        'payment_method',
        'amount',
        'installments',
        'installments_interest_free',
        'invoice_description',
        'attempt_reference',
        'shipping_amount'
      ];

      foreach($payment_attributes as $value) {
        if(!empty($this -> $value)) {
          $data += [$value => $this -> $value];
        }
      }

      $response = $this -> restClient -> payments($data);
      $this -> status = $response -> status;
      $this -> response = $response -> response;
    }

  }