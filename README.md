### It is recommended that you read the official document first

kraken docs [https://www.kraken.live/api](https://www.kraken.live/api)

All interface methods are initialized the same as those provided by kraken. See details [src/api](https://github.com/zhouaini528/kraken-php/tree/master/src/Api)

Most of the interface is now complete, and the user can continue to extend it based on my design, working with me to improve it.

[中文文档](https://github.com/zhouaini528/kraken-php/blob/master/README_CN.md)

### Other exchanges API

[Exchanges](https://github.com/zhouaini528/exchanges-php) It includes all of the following exchanges and is highly recommended.

[Bitmex](https://github.com/zhouaini528/bitmex-php)

[Okex](https://github.com/zhouaini528/okex-php)

[Huobi](https://github.com/zhouaini528/huobi-php)

[Binance](https://github.com/zhouaini528/binance-php)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/Mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[zb](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/bitfinex-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Kraken](https://github.com/zhouaini528/kraken-php)

[Gate](https://github.com/zhouaini528/gate-php)

[Bigone](https://github.com/zhouaini528/bigone-php)   

[Crex24](https://github.com/zhouaini528/crex24-php)   

#### Installation
```
composer require linwj/kraken
```

Support for more request Settings
```php
$kraken=new kraken();

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
```

### Spot Trade API

Market related API [More](https://github.com/zhouaini528/kraken-php/blob/master/tests/market.php)
```php
$kraken=new Kraken();

try {
    $result=$kraken->market()->time();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$kraken->market()->assets();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$kraken->market()->assetPairs();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$kraken->market()->depth([
        'pair'=>'XXBTZUSD',
        'count'=>10,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

Order related API [More](https://github.com/zhouaini528/kraken-php/blob/master/tests/user_trade.php)
```php
$kraken=new Kraken($key,$secret);

//bargaining transaction
try {
    $result=$kraken->userTrade()->addOrder([
        //'userref'=>'xxxxx'  //Custom ID
        'pair' => 'XXBTZUSD',
        'type' => 'buy',
        'ordertype' => 'limit',
        'price' => '7000',
        'volume' => '1.123'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//track the order
try {
    $result=$kraken->user()->queryOrders([
        //'userref'=>'xxxxx'  //Custom ID
        'txid'=>'xxxxxx,xxxxxxx,xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//cancellation of order
try {
    $result=$kraken->userTrade()->cancelOrder([
        //'userref'=>'xxxxx'  //Custom ID
        'txid'=>'xxxxxx,xxxxxxx,xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

Accounts related API [More](https://github.com/zhouaini528/kraken-php/blob/master/tests/user.php)
```php
$kraken=new Kraken($key,$secret);

try {
    $result=$kraken->user()->balance();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$kraken->user()->tradeBalance();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$kraken->user()->openOrders();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$kraken->user()->queryOrders();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

```

[More Tests](https://github.com/zhouaini528/kraken-php/tree/master/tests)

[More Api](https://github.com/zhouaini528/kraken-php/tree/master/src/Api)
