<?php namespace App\Services;

use Illuminate\Contracts\Hashing\Hasher;

class CustomHasher implements Hasher {

  public function make($value, array $options = array()){
    if(!isset($options['salt']))
      $options['salt'] = bin2hex(mcrypt_create_iv(16));

    if(!isset($options['algo']))
      $options['algo'] = "SHA512";

    // Yes, cock.li really did use CRYPT for the first couple days, so we have
    // to support it for all eternity.
    if($options['algo'] === "CRYPT")
      $hashedPassword = "{CRYPT}" . crypt($value,$options['salt']);

    // SHA512 was used over bcrypt because the glibc cock.li was originally
    // hosted with didn't support it. Bite me.
    if($options['algo'] === "SHA512")
      $hashedPassword = "{SSHA512.hex}" . hash("SHA512",$value.hex2bin($options['salt'])).$options['salt'];

    return $hashedPassword;
  }

  public function check($value, $hashedValue, array $options = array()) {

    $passAlgo = preg_replace('/^\{(.*)\}.*$/','$1',$hashedValue);

    if($passAlgo == "CRYPT") {

      $salt = preg_replace('/\{CRYPT\}(.*)/','$1',$hashedValue);
      $passwordCorrect = $this->make($value,['salt'=>$salt,'algo'=>'CRYPT']) == $hashedValue;

      return $passwordCorrect;
    }
    if($passAlgo == "SSHA512.hex") {

      $passKey  = preg_replace('/^\{(.*)\}([0-9a-f]{128})(.*)$/','$2',$hashedValue);
      $passSalt = preg_replace('/^\{(.*)\}([0-9a-f]{128})(.*)$/','$3',$hashedValue);

      $passwordCorrect = $this->make($value,['salt'=>$passSalt,'algo'=>'SHA512']) == $hashedValue;

      return $passwordCorrect;

    }
  }

  public function needsRehash($value, array $options = array()) {
    return false;
  }

}
