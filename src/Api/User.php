<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Kraken\Api;

use Lin\Kraken\Request;

class User extends Request
{
    /**
     * https://api.kraken.com/0/private/Balance 
     * */
    public function balance(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/Balance';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/TradeBalance 
     * */
    public function tradeBalance(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/TradeBalance';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/OpenOrders
     * */
    public function openOrders(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/OpenOrders';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/ClosedOrders 
     * */
    public function closedOrders(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/ClosedOrders';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/QueryOrders 
     * */
    public function queryOrders(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/QueryOrders';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/TradesHistory
     * */
    public function tradesHistory(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/TradesHistory';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/QueryTrades 
     * */
    public function queryTrades(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/QueryTrades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/OpenPositions 
     * */
    public function openPositions(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/OpenPositions';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/Ledgers 
     * */
    public function ledgers(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/Ledgers';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/QueryLedgers
     * */
    public function queryLedgers(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/QueryLedgers';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/TradeVolume 
     * */
    public function tradeVolume(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/TradeVolume';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/AddExport 
     * */
    public function addExport(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/AddExport';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/ExportStatus
     * */
    public function exportStatus(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/ExportStatus';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/RetrieveExport 
     * */
    public function retrieveExport(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/RetrieveExport';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *https://api.kraken.com/0/private/RemoveExport 
     * */
    public function removeExport(array $data=[]){
        $this->type='POST';
        $this->path='/0/private/RemoveExport';
        $this->data=$data;
        return $this->exec();
    }
}