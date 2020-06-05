<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken\Api;

use Lin\Kraken\Request;

class UserTrade extends Request
{
    /**
     * https://api.kraken.com/0/private/AddOrder
     * */
    public function addOrder(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/AddOrder';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/CancelOrder 
     * */
    public function cancelOrder(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/CancelOrder';
        $this->data=$data;
        return $this->exec();
    }
}