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
                    . "Mon mignon, tu vient d'embarquer et tu es perdu ! Ha ha, ne t'inquiète pas ma p'tite sardinne, clique sur ce lien si tu veux un coup de main : http://leliensarriventsoon.fr \n\r"
                    . "Et pour les mignons aguerris qui ont la mémoire qui flanche (la faute aux embruns pour sûr), il y a toujours les commandes suivantes : !help general, !help log, !help pve, !help system"
                    . "Et comme on l'dit chez nous, un merci n'étanche pas soif ! hips ! Alors la prochaine est pour toi Mignon";
    }
    
    private function _generateGeneralHelp()
    {
        return  "Alors mon mignon, ça, c'est rien que pour le fun ! \n\r".
                "```css\n\r".
                " !bonjour : Si tu veux que j’te salut mon mignon; ;\r".
                " !infos : pour que j’te balance les liens de la guilde;\r".
                " !ping : Provoque moi mon mignon pour voir ce qu'il reste de ma dextérité légendaire !;\r".
                " !Shaping : mais why not dude ? Enjoy :-) ;\r".
                " !rand : Hey ! oui, toi mon mignon ! Défie moi en duel; \r".
                " !chucknorris : Je peux ChuckNorriser un mignon du bord ! Si ça c'est pas la classe ! ;\r".
                "```";
    }
    
    
    private function _generateLogHelp()
    {
        return  "Alors mon mignon, les logs, c'est un sujet qui te botte ?! \n\r".
                "```css\n\r".
                " !log : Et hop, j'te link les logs de la guilde;\r".
                " !log NomDuJoueur : Quoi, tu cherches les logs d'un mignon en particulier;\r".
                " !log NomDeLaGuilde NomDuServeur Region : Je te link les derniers logs de la guilde selectionnée (un exemple pour toi Mignon  : !log Millenium Ysondre eu);\r".
                "```";
    }
    
    private function _generatePveHelp()
    {
        return  "Alors mon mignon, on aime les raids ?! \n\r".
                "```css\n\r".
                " !progress : Si tu veux connaitre le classement de notre guilde et pourquoi pas un lien pour le mettre jour mon mignon \r".
                " !gear Pseudo Royaume : Je te renvoie des infos sur l’armurerie d’un joueur \r".
                " !Roster : ... quand il aurra desaoulé́, Captaine Chaton arrivera peut-être à te faire la liste des membres faisant partis du roster raid de la guilde !... ;\r".
                "```";
    }
    
    private function _generateSystemHelp()
    {
        return  "Alors mon mignons, on voudrait savoir qui demande quoi à bibi ?! \n\r".
                "```css\n\r".
                "!history : Retourne les 5 dernières commandes que tu m’as faites;\r".
                "!history nombre : Tu veux connaitre les dernières commandes que tu m’as faites ? Choisi un nombre entre 1 et 20 et c’est parti mon mignon !;\r".
                "!history all : i tu veux savoir ce que tous les mignons du bord m’ont demandé ;\r".
                "!history single: Si tu veux connaitre les commandes utilisées, et sans doublon mon mignon ;\r".
                "!history today: Ha ! les confidences de la journée... ;\r".
                "```\n\r".
                "Ps: N'oublie pas que tu peux cumuler les parametres! (exemple: !history 10 all single today)";
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

