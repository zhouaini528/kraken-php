<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken;



use Lin\Kraken\Api\Account;
use Lin\Kraken\Api\Market;

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
    function account(){
        return new Account($this->init());
    }
    
    /**
     *
     * */
    function market(){
        return new Market($this->init());
    }
}