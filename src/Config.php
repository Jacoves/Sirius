<?php

  namespace Sirius;

  class Config {
    
      protected static $token;
      protected static $url_api = "https://checkout-test.cloudfox.net/api/v1/";

      public static function setToken($token) {
        self::$token = $token;
      }

      public static function getToken() {
        return self::$token;
      }


      public static function getUrlApi() {
        return self::$url_api;
      }

    
  }