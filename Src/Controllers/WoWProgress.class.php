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

Class WoWProgress {

    
    /*
     *  retourne le status de l'authentification
     * 
     *  @bool boolean 
     */
    CONST DOMAIN = 'www.wowprogress.com'; 
    
    
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

            $result = @file_get_contents("http://".self::DOMAIN."/guild/eu/Garona/Mystra/json_rank",false,$context);
        
        if($result)
        {
            return $this->_format($result);
        }
        else return "Serveur WoWProgress.com indisponible.";
    }
    
    public function updateProgress()
    {
        return "http://".Self::DOMAIN."/update_progress/eu/garona/Mystra";
    }
    
    private function _format($result)
    {
        $r = json_decode($result);
        
        return  $this->_msg->getProgressClassement($r->area_rank, $r->world_rank, $r->realm_rank);
    }
}

