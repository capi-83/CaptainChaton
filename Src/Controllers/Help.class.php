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

Class Help {
    
    private $_sTitle;
    private $_sGeneral;
    private $_sLog;
    private $_sPve;
    private $_sSystem; 
    
    public function __construct() {
        
        $this->_sTitle = $this->_generateTitleHelp();
        $this->_sGeneral     = $this->_generateGeneralHelp();
        $this->_sLog         = $this->_generateLogHelp();
        $this->_sPve      = $this->_generatePveHelp();
        $this->_sSystem      = $this->_generateSystemHelp();
    }
    
    private function _generateTitleHelp()
    {
          return      "Le Cap'tain Chaton prend la barre ! Larguez les amarres, Le Mystra appareille !\n\r"
                    . " Tu as envie d'en savoir plus sur moi clique sur ce liens : http://leliensarriventsoon.fr \n\r"
                    . "sinon tu peux toujours taper les commandes suivante : !help general, !help log, !help pve, !help system"
                    . "Et comme on l'dit chez nous, un merci n'étanche pas soif ! hips !"
                    . "'bon vent, bonne mer !'";
    }
    
    private function _generateGeneralHelp()
    {
        return  "Te vla un peu d'aide \n\r".
                "```css\n\r".
                " !bonjour : Captain Chaton te dira bonjour mon mignon;\r".
                " !infos : Captain Chaton te balance les liens de la guilde;\r".
                " !ping : Provoque Captain Chaton pour juger son temps de réaction !;\r".
                " !Shaping : mais why not dude ? Enjoy :-) ;\r".
                " !rand : Sois inconscient ! Défie Captain Chaton en duel; \r".
                " !chucknorris : Captaine Chaton peut ChuckNorriser un mignon du bord ! Si ça c'est pas la classe ! : :) ;\r".
                "```";
    }
    
    
    private function _generateLogHelp()
    {
        return  "Te vla un peu d'aide \n\r".
                "```css\n\r".
                " !log : Captaine Chaton te link les logs de la guilde;\r".
                " !log NomDuJoueur : Captaine Chaton te link les derniers logs du joueur;\r".
                " !log NomDeLaGuilde NomDuServeur Region : Captain Chaton te link les derniers logs de la guilde selectionnee (un exemple pour toi Mignon : !log Millenium Ysondre eu);\r".
                "```";
    }
    
    private function _generatePveHelp()
    {
        return  "Te vla un peu d'aide \n\r".
                "```css\n\r".
                " !Roster : quand il aurra desaoulé, Captaine Chaton arrivera peut-être à te faire la liste des membres faisants partis du roster raid de la guilde !...;\r".
                "```";
    }
    
    private function _generateSystemHelp()
    {
        return  "Te vla un peu d'aide \n\r".
                "```css\n\r".
                "!history : Retourne tes 5 dernieres commande envoyer au bot;\r".
                "!history nombre : Retourne le nombre de commande que tu a choisit. (doit etre inferieur à 20);\r".
                "!history all : retourne les commande envoyer au bot par tout les usager;\r".
                "!history single: Retourne les commande envoyer au bot de façon unique (sans doublons);\r".
                "!history today: Retourne les commande envoyer au bot aujourdhui;\r".
                "```\n\r".
                "Ps: Noublie pas que tu peux cumuler les parametre! (exemple: !history 10 all single today)";
    }
    
    
    public function gethelp()
    {
        return $this->_sTitle;
    }
    public function getlog()
    {
        return $this->_sLog;
    }
    public function getgeneral()
    {
        return $this->_sGeneral;
    }
    public function getpve()
    {
        return $this->_sPve;
    }
    public function getSystem()
    {
        return $this->_sSystem;
    }
}

