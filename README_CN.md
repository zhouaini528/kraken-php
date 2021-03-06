### 建议您先阅读官方文档

Kraken 文档地址 [https://www.kraken.live/api](https://www.kraken.live/api)

所有接口方法的初始化都与Kraken提供的方法相同。更多细节 [src/api](https://github.com/zhouaini528/kraken-php/tree/master/src/Api)

大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/kraken-php/blob/master/README.md)

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php) 支持[Websocket](https://github.com/zhouaini528/bitmex-php/blob/master/README_CN.md#Websocket)

[Okex](https://github.com/zhouaini528/okex-php) 支持[Websocket](https://github.com/zhouaini528/okex-php/blob/master/README_CN.md#Websocket)

[Huobi](https://github.com/zhouaini528/huobi-php) 支持[Websocket](https://github.com/zhouaini528/huobi-php/blob/master/README_CN.md#Websocket)

[Binance](https://github.com/zhouaini528/binance-php) 支持[Websocket](https://github.com/zhouaini528/binance-php/blob/master/README_CN.md#Websocket)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/zb-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Kraken](https://github.com/zhouaini528/kraken-php)

[Gate](https://github.com/zhouaini528/gate-php)   

[Bigone](https://github.com/zhouaini528/bigone-php)   

[Crex24](https://github.com/zhouaini528/crex24-php)   

[Bybit](https://github.com/zhouaini528/bybit-php)  

[Coinbene](https://github.com/zhouaini528/coinbene-php)   

[Bitget](https://github.com/zhouaini528/bitget-php)   

[Poloniex](https://github.com/zhouaini528/poloniex-php)

#### 安装方式
```
composer require linwj/kraken
```

支持更多的请求设置
```php
$zb=new Kraken($key,$secret);

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

[更多用例](https://github.com/zhouaini528/kraken-php/tree/master/tests)

[更多API](https://github.com/zhouaini528/kraken-php/tree/master/src/Api)

