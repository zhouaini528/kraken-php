### 建议您先阅读官方文档

ZB 文档地址 [https://www.zb.com/api](https://www.zb.com/api)

所有接口方法的初始化都与ZB提供的方法相同。更多细节 [src/api](https://github.com/zhouaini528/zb-php/tree/master/src/Api)

大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/zb-php/blob/master/README.md)

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php)

[Okex](https://github.com/zhouaini528/okex-php)

[Huobi](https://github.com/zhouaini528/huobi-php)

[Binance](https://github.com/zhouaini528/binance-php)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/zb-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Kraken](https://github.com/zhouaini528/kraken-php)

#### 安装方式
```
composer require linwj/zb
```

支持更多的请求设置
```php
$zb=new Zb($key,$secret);

//You can set special needs
$zb->setOptions([
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

### 现货交易 API

Market related API [More](https://github.com/zhouaini528/kraken-php/blob/master/tests/market.php)
```php
$kraken=new Kraken();

try {
    $result=$kraken->market()->time();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$kraken->market()->assets();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$kraken->market()->assetPairs();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$kraken->market()->depth([
        'pair'=>'XXBTZUSD',
        'count'=>10,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
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
    print_r(json_decode($e->getMessage(),true));
}

//track the order
try {
    $result=$kraken->user()->queryOrders([
        //'userref'=>'xxxxx'  //Custom ID
        'txid'=>'xxxxxx,xxxxxxx,xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//cancellation of order
try {
    $result=$kraken->userTrade()->cancelOrder([
        //'userref'=>'xxxxx'  //Custom ID
        'txid'=>'xxxxxx,xxxxxxx,xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

Accounts related API [More](https://github.com/zhouaini528/kraken-php/blob/master/tests/user.php)
```php
$kraken=new Kraken($key,$secret);

try {
    $result=$kraken->user()->balance();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$kraken->user()->tradeBalance();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$kraken->user()->openOrders();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$kraken->user()->queryOrders();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

```

[更多用例](https://github.com/zhouaini528/kraken-php/tree/master/tests)

[更多API](https://github.com/zhouaini528/kraken-php/tree/master/src/Api)

