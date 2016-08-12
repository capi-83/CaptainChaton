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

Class ArmoryRaidTracker {

    
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
    CONST DOMAIN = 'dev.raid-tracker.com'; 
    
    
    private $_msg;
    /*
     * Constructeur de la classe. Assignation des variables.
     * 
     * $action: string
     * 
     * $data: array;
     * 
     */
    public function __construct() 
    {
       $this->_msg = new Msg();
       return true;
    }
    
    public function queryProgress()
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

            $result = @file_get_contents("http://".self::DOMAIN."/api/character/garona/antaruss",false,$context);
        
        if($result)
        {
            return $this->_format($result);
        }
        else return "Serveur RTK est indisponible.";
    }
    
    private function _format($result)
    {
        $this->_data = json_decode($result);
    }
}

