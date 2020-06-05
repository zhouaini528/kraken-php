<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken\Api;

use Lin\Kraken\Request;

class Account extends Request
{
    /**
     * https://api.kraken.com/0/private/DepositMethods
     * */
    public function postDepositMethods(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/DepositMethods';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/DepositAddresses
     * */
    public function postDepositAddresses(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/DepositAddresses';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/DepositStatus
     * */
    public function postDepositStatus(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/DepositStatus';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WithdrawInfo
     * */
    public function postWithdrawInfo(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WithdrawInfo';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/Withdraw
     * */
    public function postWithdraw(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/Withdraw';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WithdrawStatus
     * */
    public function postWithdrawStatus(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WithdrawStatus';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WithdrawCancel
     * */
    public function postWithdrawCancel(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WithdrawCancel';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/WalletTransfer
     * */
    public function postWalletTransfer(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/WalletTransfer';
        $this->data=$data;
        return $this->exec();
    }
    
}