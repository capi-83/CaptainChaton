<?php

/* 
 * Document    : Roster.class.php
 *  Created on : 03/08/2017
 *  Author     : Thomas SIMON
 *  Readme     : /Licenses/license-default.txt
 *  Encodage   : UTF-8
 *  Description:
 *      Classe gerant les demande de log
 */

Class ChuckNorris {
    
    private $_msg;
    
    private $_ids = array(   '113654798506655745','164654320447389696','194883116861620224',
                            '202741708268634112','206811401598009346','204727903294980097','205071323519516672',
                            '187613687169810432','205075907113779200', '206859931486388224','209253094452625409',
                            '209379237633851393','208954859028873217','148421842116280320','127437833991487488',
                            '204927415372349441','204951438495973378'
                        );
    
    private $_joke = array();
    
    
    
    public function __construct() {
        
        $this->_msg = new Msg();
        $this->_joke = $this->_getJoke();
        
        return true;
    }
    
    public function getId()
    {
        return $this->_ids[array_rand($this->_ids, 1)];
    }
    
    private function _getJoke()
    {
        return   $this->_msg->getJokeChuckNorris();
    }
    
    public function getSingleJoke()
    {
        return $this->_joke[array_rand($this->_joke, 1)];
    }
}

