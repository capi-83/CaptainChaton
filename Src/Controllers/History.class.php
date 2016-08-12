<?php

/* 
 * Document    : WowProgress.class.php
 *  Created on : 03/08/2017
 *  Author     : Thomas SIMON
 *  Readme     : /Licenses/license-default.txt
 *  Encodage   : UTF-8
 *  Description:
 *      Classe gerant les demande de log
 */

Class History {
    
    private $_nbrLog;
    private $_aLog;
    private $_aHistory = array();
    private $_sHistory;
    private $_path;
    private $_pathNeg;
    private $_logger;
    private $_all; 
    private $_single;
    private $_pseudo;
    private $_today;
    private $_uniqueItem = array();
    private $_iComtpeur = 0;
    
    public function __construct($pseudo,$log = 5, $all = false, $single = false, $today = false) {
        $this->_all = $all;
        $this->_single = $single;
        $this->_nbrLog = $log;
        $this->_pseudo = $pseudo;
        $this->_today = $today;
        
        $this->_logger = new Logger('./log');
        $this->_path = $this->_logger->path('history', 'err_php', Logger::GRAN_MONTH);
        $this->_pathNeg = $this->_logger->path('history', 'err_php', Logger::GRAN_MONTH,true);
        $this->_aLog = $this->_getlog();
        
        $this->_setHistory();
        
        if($this->_sHistory) return true;
        else return false;
    }
    
    private function _getlog()
    {        
        // lecture du fichier de log courant
        $aLog = file($this->_path);
        
        $this->_foreachLog($aLog);
        
        if($this->_iComtpeur < $this->_nbrLog && $this->_today = false)
        {
            $aLogNeg = file($this->_pathNeg);
            $this->_foreachLog($aLogNeg);
        }
        
        return $this->_aHistory;
    }

    private function _foreachLog($aLog)
    {
        $aLogfinal = array();
        
        //foreach du tableau de log actuel en ordre decroisant
        foreach (array_reverse($aLog) as $L)
        {
            //Booleen de suivit de condition. Pouvons nous enregistrer l'item?
            $save = true;
            
            if(!$this->_all)
            {
                //recherche si le speudo de l'usager est dedans.
                if(!stripos($L, $this->_pseudo)) $save = false;
            }
            if($this->_single)
            {
                // on recherche le htag utiliser
                $aHtag = explode(' !', $L);
                //est il dans le tableau? si non on l'ajoute, si oui on interdit le save
                if(in_array($aHtag[1],$this->_uniqueItem)) $save = false;
                else $this->_uniqueItem[] = $aHtag[1];
            }
            if($this->_today)
            {
                $aLogToday = explode(' ', $L);
                if(date('d/m/Y') != $aLogToday[0]) $save = false;
            }
            
            if(($this->_iComtpeur < $this->_nbrLog) && $save == true )
            {
                $this->_iComtpeur ++;
                $this->_aHistory[] = $L;
            }
            else break;
                        
        }
        
        return true;
    }
    
    private function _setHistory()
    {
        $this->_sHistory = "```css\n\r";
        
        foreach($this->_aLog as $log )
        {
            $this->_sHistory .= $log."\n";
        }
        
        $this->_sHistory .="```";
        
    }
    
    public function getHistory()
    {
        return $this->_sHistory;
    }
}

