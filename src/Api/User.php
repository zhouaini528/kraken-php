<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken\Api;

use Lin\Kraken\Request;

class User extends Request
{
    /**
     * 
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='';
        $this->data=$data;
        return $this->exec();
    }
}