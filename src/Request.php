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
        $this->passphrase = $data['passphrase'] ?? '';
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
        $this->nonce=time()*1000;
    }
    
    /**
     * 
     * */
    protected function signature(){
        $sort=$this->sort(array_merge(['accesskey'=>$this->key],$this->data));
        $this->url=implode('&',$sort);
        $this->signature = hash_hmac('md5',$this->url,sha1($this->secret));
    }
    
    /**
     * 
     * */
    protected function headers(){
        $this->headers= [
            'Content-Type' => 'application/json',
            'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36',
        ];
    }
    
    /**
     * 
     * */
    protected function sort($param)
    {
        $u = [];
        $sort_rank = [];
        foreach ($param as $k => $v) {
            $u[] = $k . "=" . urlencode($v);
            $sort_rank[] = ord($k);
        }
        asort($u);
        
        return $u;
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
        
        $url=$this->host.$this->path.'?'.$this->url.'&sign='.$this->signature.'&reqTime='.$this->nonce;
        
        $response = $client->request($this->type, $url, $this->options);
        
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