<?php

/* 
 * Document    : Msg.class.php
 *  Created on : 03/08/2017
 *  Author     : Thomas SIMON
 *  Readme     : /Licenses/license-default.txt
 *  Encodage   : UTF-8
 *  Description:
 *      Classe gerant les demande de log
 */

Class Msg {
    
    private $_sResult;
    
    public function __construct() {
        
        return true;
    }
    
    public function setMsg($msg)
    {
        $this->_sResult = $msg;
    }
    
    public function log($msg)
    {
        echo  date('H:i:s d-m-Y'). ': '.$msg, PHP_EOL;
    }
    
    public function getMsg($msg)
    {
        return $this->_sResult;
    }
    
    public function getBonjour($user)
    {
        echo "REPONSE : bonjour !", PHP_EOL;
        return "Salut à toi {$user}! Alors marin d'eau douce, au poil ?! ! ";
    }
    
    public function getShaping($user)
    {
        echo "REPONSE : shapong !", PHP_EOL;
        return "Alors,  {$user} shapong ?! !";
    }
    
    public function getInfosMystra()
    {
        echo "REPONSE : infos Mystra !", PHP_EOL;
        return "Et bien Mignon, on s'intéresse enfin à la vie du bord ! Ah, je vous jure, la bleussaille, c'est plus c'que c'était... \n\r".
               " **Site Internet** : http://www.guilde-mystra.fr \r".
               " **Facebook** : https://www.facebook.com/groups/131596013531352/?ref=bookmarks \n\r";
    }
    
    public function getMalade()
    {
        return "Tu serais pas un peu malade !!! \n\r";
    }
    
    public function getRandText($randBot,$randUser,$user)
    {
        return  "Cap'tain Chaton obtient $randBot\n".
                $user." Obtient $randUser \n\r";
    }
    
    public function getRandWin()
    {
        return "Et Mignon ! Surveille tes arrières!  Si c'est une mutinerie que tu fomentes, tu pourrais bien finir par nourrir les poissons. Morbleu ! ";
    }
    
    public function getRandLoose()
    {
        return "Et bien mon mignon, il semblerait que tout c'que t'arrives à gagner c'est le droit de récurer le pont ! "
              . "Allez, P'ti-Bras, oublie pas ta brosse à dent et que ça brille, Morbleu !";
    }
    
    public function getProgress()
    {
        return "Liens pour update le progress de la guilde : ";
    }
    
    public function getUndefined()
    {
        return "je ne comprend pas de quoi tu parle ! essaye le !help :)";
    }
    
    public function getJokeChuckNorris()
    {
        return   array( '%s a déjà compté jusqu´à l´infini. Deux fois. ',
                        'Certaines personnes portent un pyjama Superman. Superman porte un pyjama de %s. ',
                        '%s ne se mouille pas, c´est l´eau qui se %s. ',
                        'Le calendrier de %s passe du 31 mars au 2 avril. Personne ne fait de blague à %s.',
                        'Quand %s fait une prise de sang, il refuse la seringue et demande un fusil à pompe et une bassine. ',
                        'Les extra-terrestres existent : ils attendent juste que %s meurt avant de passer à l´attaque.',
                        '%s peut applaudir d´une seule main.  ',
                        '%s ne dort pas. Il attend.',
                        '%s est en couleur sur les photos Noir et Blanc.  ',
                        '%s a perdu sa virginité avant son père.',
                        '%s joue à la console sans télévision, il trouve que c´est trop facile sinon. ',
                        'Si ça a le goût du poulet, l´odeur du poulet et ça ressemble à du poulet, mais que %s te dit que c´est du mouton, alors cherche pas, c´est du mouton.  ',
                        'Des gamins pissent dans la neige pour écrire leur nom. %s le fait dans le béton armé.',
                        '%s a déjà fini Tétris.  ',
                        'La maison de %s a une alarme : pas pour prévenir %s des voleurs, mais pour prévenir les voleurs de %s .',
                        'Quand Google ne trouve pas quelque choses, il demande à %s. . ');
    }
    
    public function getIntroLog($name)
    {
        return "Log(s) de **$name** généré(s) depuis 15 jours: \n\r";
    }
    
    public function getErreurLog()
    {
        return  "Apprend un peu les bases petit ! ( exemple : !log guilde server region )";
    }
    
    public function getNoLog()
    {
       return "Vérifie ta demande mon chaton! Si elle est exacte, aucun log ne correspond à ta demande sur WarcraftLog .";
    }
    
    public function getProgressClassement($eu,$world,$serveur)
    {
        return  "***Classement Mystra Garona***\n\r" .
                "```css\n\r".
                " World: {$world};\n\r EU: {$eu};\n\r Serveur : {$serveur};".
                "```";
    }
    
    public function getTodo()
    {
        return  "***Au boulot bande de gros fainéant !***\n\r" .
                "\t\t\t * Dev la partie help afin de sortire des aides par commande (ou fichier externe (pdf) avec toutes les commandes) \n".
                "\t\t\t * Ajouter la possibilité de sortir seulement sont historique, et de supprimer les doublons. (!history) \n".
                "\t\t\t * Test l'upload de Antaruss et commencer à coder les hooks pour la prochaine API. \n".
                "";
    }
    
    public function getPn()
    {
        return  "***En voilà du bon Travail (08/08/2016)!***\n\r" .
                "\t\t\t * Refactorisation du code et ajout d'une class d'indexation des query \n".
                "\t\t\t * Ajout des entrés history, todo, pn (!history) \n".
                "\t\t\t * Gestions des textes, dans une seule class de langue et de messages. \n".
                "";
    }
}

