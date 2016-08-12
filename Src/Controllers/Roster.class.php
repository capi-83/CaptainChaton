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

Class Roster {
    
    
    public function __construct() {
        
        return true;
    }
    
    
    public function getRoster()
    {
        return "**Roster** \n\r".
                          "**Tank**".
                          "```css\n\r".
                          " Antarus: Moine;                 Alwynn : Pretre; \n\r".
                          "```".
                          "**Heal**".
                          "```css\n\r".
                          " Garfunk: Moine;                  Kaara : Pretre; \n\r".
                          "```\n\r";
    }
}

