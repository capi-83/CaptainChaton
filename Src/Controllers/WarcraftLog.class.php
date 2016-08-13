<?php

/* 
 * Document    : WowProgress.class.php
 *  Created on : 03/08/2017
 *  Author     : Thomas SIMON
 *  Readme     : /Licenses/license-default.txt
 *  Encodage   : UTF-8
 *  Description:
 *      Classe permettant d'intéroger l'api de warcraftlog
 */

Class WarcraftLog {

    
    /**
     * The gateway version the client uses.
     *
     * @var String
     */
    private $_time;
    
     /*
     *  retourne le status de l'authentification
     * 
     *  @bool boolean 
     */
    private $_data;
    
     /*
     *  retourne le status de l'authentification
     * 
     *  @bool boolean 
     */
    CONST METHOD = 'POST';
    
    /*
     *  retourne le status de l'authentification
     * 
     *  @bool boolean 
     */
    CONST DOMAIN = 'www.warcraftlogs.com:443/v1/reports'; 
    
    /*
     *  retourne le status de l'authentification
     * 
     *  @bool boolean 
     */
    CONST KEY = '';
    
    private $_zone = array(3 => 'Challenge Modes',
                            4 => 'Throne of Thunder',
                            5 => 'Siege of Orgrimmar',
                            6 => 'Highmaul',
                            7 => 'Blackrock Foundry',
                            8 => 'Hellfire Citadel',
                            9 => 'Mythic+ Dungeons',
                            10 => 'Emerald Nightmare',
                            11 => 'The Nighthold');
    /*
     * Constructeur de la classe. Assignation des variables.
     * 
     * $action: string
     * 
     * $data: array;
     * 
     */
    public function __construct($data = array()) {
       
       if(is_array($data)) $this->_data = $data;
       else $this->_data = array();
       
       $this->_time = mktime(date("H"), date("i"), date("s"), date("n"), date("j")-15, date("Y")).'000';
       
       return true;
    }
    
    public function queryGuild($data= array())
    {
        $d = array();
        $qdata = http_build_query($d);
        $opts = array('http' =>
            array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($qdata)."\r\n".
                            "User-Agent:MyAgent/1.0\r\n",
               'method'  => 'POST',
               'timeout' => 5,
               'content' => $qdata )
           );
        $context  = stream_context_create($opts); 
        if(empty($data))
        {
            $result = @file_get_contents("https://".self::DOMAIN."/guild/Mystra/Garona/EU?start={$this->_time}&api_key=".self::KEY,false,$context);
        }
        else
        {
            if(isset($data['guild']) && isset($data['server']) && isset($data['region']))
            {
                $result = @file_get_contents("https://".self::DOMAIN."/guild/{$data['guild']}/{$data['server']}/{$data['region']}?start={$this->_time}&api_key=".self::KEY,false,$context);
            }
            else return false;
        }
        
        if($result)
        {
            return $result;
        }
        else return false;
    }
    
    public function queryUser($data = array())
    {
        $d = array();
        $qdata = http_build_query($d);
        $opts = array('http' =>
            array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($qdata)."\r\n".
                            "User-Agent:MyAgent/1.0\r\n",
               'method'  => 'POST',
               'timeout' => 5,
               'content' => $qdata )
           );
        $context  = stream_context_create($opts); 
        if(!empty($data))
        {
            if(isset($data['user']))
            {
                $result = @file_get_contents("https://".self::DOMAIN."/user/{$data['user']}?start={$this->_time}&api_key=".self::KEY,false,$context);
                if($result) return $result;
                else return false;
            }
            else return false;
        }
        else return false;
    }
    
    public function getZone()
    {
        return $this->_zone;
    }
    
}

