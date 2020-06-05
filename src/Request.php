<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken;

use GuzzleHttp\Exception\RequestException;
use Lin\Kraken\Exceptions\Exception;

class Request
{
    protected $key='';
    
    protected $secret='';
    
    protected $host='';
    
    protected $nonce='';
    
    protected $signature='';
    
    protected $headers=[];
    
    protected $type='';
    
    protected $path='';
    
    protected $data=[];
    
    protected $options=[];
    
    protected $url='';
    
    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? '';
        
        $this->options=$data['options'] ?? [];
    }
    
    /**
     * 
     * */
    protected function auth(){
        $this->nonce();
        
        $this->signature();
        
        $this->headers();
        
        $this->options();
    }
    
    /**
     * 
     * */
    protected function nonce(){
        $nonce = explode(' ', microtime());
        $this->nonce = $nonce[1] . str_pad(substr($nonce[0], 2, 6), 6, '0');
    }
    
    /**
     * 
     * */
    protected function signature(){
        if($this->type!='GET'){
            $data=http_build_query($this->data, '', '&');
            
            $sign = hash_hmac('sha512', $this->path . hash('sha256', $this->nonce . $data, true), base64_decode($this->secret), true);
            $this->signature=base64_encode($sign);
        }
    }
    
    /**
     * 
     * */
    protected function headers(){
        $this->headers= [
            'Content-Type' => 'application/json',
        ];
        
        if($this->type!='GET'){
            $this->headers['API-Key']=$this->key;
            $this->headers['API-Sign']=$this->signature;
        }
    }
    
    /**
     * 
     * */
    protected function options(){
        $this->options=array_merge([
            'headers'=>$this->headers,
            //'verify'=>false
        ],$this->options);
        
        $this->options['timeout'] = $this->options['timeout'] ?? 60;
        
        if(isset($this->options['proxy']) && $this->options['proxy']===true) {
            $this->options['proxy']=[
                'http'  => 'http://127.0.0.1:12333',
                'https' => 'http://127.0.0.1:12333',
                'no'    =>  ['.cn']
            ];
        }
    }
    
    /**
     * 
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();
        
        $url=$this->host.$this->path;
        
        if($this->type=='GET') $url.='?'.http_build_query($this->data);
        
        $response = $client->request($this->type, $url , $this->options);
        
        return $response->getBody()->getContents();
    }
    
    /*
     * 
     * */
    protected function exec(){
        $this->auth();
        
        try {
            return json_decode($this->send(),true);
        }catch (RequestException $e){
            if(method_exists($e->getResponse(),'getBody')){
                $contents=$e->getResponse()->getBody()->getContents();
                
                $temp=json_decode($contents,true);
                if(!empty($temp)) {
                    $temp['_method']=$this->type;
                    $temp['_url']=$this->host.$this->path;
                }else{
                    $temp['_message']=$e->getMessage();
                }
            }else{
                $temp['_message']=$e->getMessage();
            }
            
            $temp['_httpcode']=$e->getCode();
            
            throw new Exception(json_encode($temp));
        }
    }
}