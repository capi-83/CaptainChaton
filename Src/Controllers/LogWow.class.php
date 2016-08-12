<?php

include __DIR__.'/WarcraftLog.class.php';

/* 
 * Document    : Log.class.php
 *  Created on : 03/08/2017
 *  Author     : Thomas SIMON
 *  Readme     : /Licenses/license-default.txt
 *  Encodage   : UTF-8
 *  Description:
 *      Classe gerant les demande de log
 */

Class LogWow {

 
    private $_bugParams = false;
    
    private $_jsResult = '';
    
    private $_aResult;
    
    private $_sResult;
    
    private $_query;
    
    private $_reply = false;
    
    private $_warcraftLog;
    
    private $_zone;
    
    private $_msg;
    
    private $_title = 'Mystra';
    
    
    public function __construct($query = array()) {
        
        $this->_msg = new Msg();
        
        $this->_warcraftLog = new WarcraftLog();
        $this->_zone = $this->_warcraftLog->getZone();
        $this->_query = $query;
       
        if(empty($query[1]))
        {
            $this->_jsResult = $this->_warcraftLog->queryGuild();
        }
        elseif(empty($query[2]))
        {
            $this->_title = $query[1];
            
            $aData = array('user'=>$query[1]);
            
            $this->_jsResult = $this->_warcraftLog->queryUser($aData);
        }
        elseif(!empty($query[3]) && !isset($query[4]))
        {
            $this->_title = $query[1];
           
            $aData = array('guild'=>$query[1],
                           'server'=> $query[2],
                           'region' => $query[3]);
            
            $this->_jsResult = $this->_warcraftLog->queryGuild($aData);
            
        }
        else 
        {
            $this->_bugParams = true;
            
        }
        
        $this->_aResult = json_decode($this->_jsResult);
        
        $this->_formatLog();
        
        return true;
    }
    
    private function _formatLog()
    {
        if(!empty($this->_aResult))
        {
            $this->_sResult = $this->_msg->getIntroLog($this->_title);
            
            foreach( $this->_aResult as $r)
            {
                $d = date("d-m-Y H:i:s",substr($r->start,0,-3));

                if(isset($this->_zone[$r->zone])) $zone = $this->_zone[$r->zone];
                else $zone = "undefined";

                $this->_sResult .="\t\t * Rapport de {$r->owner} du $d à **$zone** : https://www.warcraftlogs.com/reports/{$r->id} \n\r" ;
            }
        }
        else 
        {
            $this->_reply =true;
            if($this->_bugParams)
            {
                $this->_sResult = $this->_msg->getErreurLog();
            }
            else
            {
                $this->_sResult = $this->_msg->getNoLog();
            }
        }
    }
    
    
    public function getlog()
    {
        return array('reply'=> $this->_reply,
                     'msg' => $this->_sResult);
    }
}

