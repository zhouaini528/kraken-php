<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken;

use Lin\Kraken\Api\Market;
use Lin\Kraken\Api\User;
use Lin\Kraken\Api\UserTrade;
use Lin\Kraken\Api\UserFunding;

class Kraken
{
    protected $key;
    protected $secret;
    protected $host;
    
    protected $options=[];
    
    function __construct(string $key='',string $secret='',string $host='https://api.kraken.com'){
        $this->key=$key;
        $this->secret=$secret;
        $this->host=$host;
    }
    
    /**
     * 
     * */
    private function init(){
        return [
            'key'=>$this->key,
            'secret'=>$this->secret,
            'host'=>$this->host,
            'options'=>$this->options,
        ];
    }
    
    /**
     * 
     * */
    function setOptions(array $options=[]){
        $this->options=$options;
    }

    /**
     *
     * */
    function market(){
        return new Market($this->init());
    }
    
    /**
     *
     * */
    function user(){
        return new User($this->init());
    }
    
    /**
     *
     * */
    function userFunding(){
        return new UserFunding($this->init());
    }
    
    /**
     *
     * */
    function userTrade(){
        return new UserTrade($this->init());
    }
}