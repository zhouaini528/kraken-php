<?php

/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Kraken\Kraken;

require __DIR__ .'../../vendor/autoload.php';

include 'key_secret.php';

$kraken=new Kraken($key,$secret);

//You can set special needs
$kraken->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
    
    //If you are developing locally and need an agent, you can set this
    //'proxy'=>true,
    //More flexible Settings
    /* 'proxy'=>[
     'http'  => 'http://127.0.0.1:12333',
     'https' => 'http://127.0.0.1:12333',
     'no'    =>  ['.cn']
     ], */
    //Close the certificate
    //'verify'=>false,
]);

try {
    $result=$kraken->userFunding()->depositAddresses();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


