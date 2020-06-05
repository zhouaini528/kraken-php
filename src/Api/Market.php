<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken\Api;

use Lin\Kraken\Request;

class Market extends Request
{
    /**
     * https://api.kraken.com/0/public/Time
     * */
    public function getTime(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/Time';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/public/Assets
     * */
    public function getAssets(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/Assets';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/public/AssetPairs
     * */
    public function getAssetPairs(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/AssetPairs';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/public/Ticker
     * */
    public function getTicker(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/Ticker';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/public/OHLC
     * */
    public function getOhlc(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/OHLC';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/public/Depth 
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/Depth';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/public/Trades 
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/Trades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/public/Spread 
     * */
    public function getSpread(array $data=[]){
        $this->type='GET';
        $this->path='/0/public/Spread ';
        $this->data=$data;
        return $this->exec();
    }
}