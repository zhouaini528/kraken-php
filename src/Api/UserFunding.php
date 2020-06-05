<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken\Api;

use Lin\Kraken\Request;

class UserFunding extends Request
{
    /**
     * https://api.kraken.com/0/private/DepositMethods
     * */
    public function depositMethods(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/DepositMethods';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/DepositAddresses
     * */
    public function depositAddresses(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/DepositAddresses';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/DepositStatus
     * */
    public function depositStatus(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/DepositStatus';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WithdrawInfo
     * */
    public function withdrawInfo(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WithdrawInfo';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/Withdraw
     * */
    public function withdraw(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/Withdraw';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WithdrawStatus
     * */
    public function withdrawStatus(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WithdrawStatus';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WithdrawCancel
     * */
    public function withdrawCancel(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WithdrawCancel';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WalletTransfer
     * */
    public function walletTransfer(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WalletTransfer';
        $this->data=$data;
        return $this->exec();
    }
    
}