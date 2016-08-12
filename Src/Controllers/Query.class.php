<?php

/* 
 * Document    : Roster.class.php
 *  Created on : 08/08/2017
 *  Author     : Thomas SIMON
 *  Readme     : /Licenses/license-default.txt
 *  Encodage   : UTF-8
 *  Description:
 *      Classe gerant les demande de log
 */

Class Query {
    
    private $_query;
    
    private $_request;
    
    private $_msg;
    
    private $_messageDiscord;
    
    
    public function __construct($query) {
        
        $this->_msg = new Msg();
        $this->_messageDiscord = $query;
        
        $this->_query = explode(' ',$this->_messageDiscord->content);
        
        $this->_request = $this->_query[0];
        
        switch ($this->_request) {
            case '!help':
                $this->_help();
                break;
            case '!history':
                $this->_history();
                break;
            case '!bonjour':
                $this->_bonjour();
                break;
            case '!shaping':
                $this->_shaping();
                break;
            case '!infos':
                $this->_infos();
                break;
            case '!ping':
                $this->_ping();
                break;
            case '!roster':
                $this->_roster();
                break;
            case '!chucknorris':
                $this->_chucknorris();
                break;
            case '!rand':
                $this->_rand();
                break;
            case '!progress':
                $this->_progress();
                break;
            case '!log':
                $this->_log();
                break;
            case '!todo':
                $this->_todo();
                break;
            case '!pn':
                $this->_pn();
                break;
            default:
                $this->_undefined();
                break;
        }
        
    }
    
    private function _help()
    {
        $help = new Help();
        if(isset($this->_query[1]))
        {
            switch ($this->_query[1]) {
                case 'general':
                    $this->_messageDiscord->channel->sendMessage($help->getgeneral());
                    break;
                case 'log':
                    $this->_messageDiscord->channel->sendMessage($help->getlog());
                    break;
                case 'pve':
                    $this->_messageDiscord->channel->sendMessage($help->getpve());
                    break;
                case 'system':
                    $this->_messageDiscord->channel->sendMessage($help->getSystem());
                    break;
                default:
                    $this->_messageDiscord->channel->sendMessage($help->gethelp());
                    break;
            }
            echo $this->_msg->log("help send");
        }
        else 
        {
            $this->_messageDiscord->channel->sendMessage($help->gethelp());
            echo $this->_msg->log("help send");
        }
    }
    
    private function _history()
    {  
        $nbr = 5;
        $all = false;
        $single = false;
        $today = false;
        
        foreach ($this->_query as $q)
        {
            if(is_numeric($q)) $nbr = $q;
            elseif($q === "all") $all = true;
            elseif($q === "single")$single = true;
            elseif($q === "today")$today = true;
        }
        
        if($nbr<=20)
        {
            $history = new History($this->_messageDiscord->author->username,$nbr,$all,$single,$today);
            $this->_messageDiscord->channel->sendMessage($history->getHistory());
            echo $this->_msg->log("History send");
        }
        else 
        {
            $this->_messageDiscord->channel->sendMessage($this->_msg->getMalade());
            echo $this->_msg->log("Fail argument");
        }
    }
    
    private function _bonjour()
    {
        $this->_messageDiscord->channel->sendMessage(
            $this->_msg->getBonjour($this->_messageDiscord->getAuthorAttribute())
        );
        echo $this->_msg->log("Bonjour send");
    }
    
    private function _shaping()
    {
        $guild = $this->_messageDiscord->channel->guild;
        $member = $guild->members->get('id', '166106651718320129');

        if($member)
        {
            $user = $member->getUserAttribute();
            $this->_messageDiscord->channel->sendMessage($this->_msg->getShaping($user));
            echo $this->_msg->log("shapo send");
        }
        else echo $this->_msg->log("shapo partit :'(");
    }
    
    private function _infos()
    {
        $this->_messageDiscord->channel->sendMessage($this->_msg->getInfosMystra());
        echo $this->_msg->log("Infos send");
    }
    
    private function _ping()
    {
        $this->_messageDiscord->reply('pong! ');
        echo $this->_msg->log("pong send");
    }
    
    private function _roster()
    {
        $roster = new Roster();
        $this->_messageDiscord->channel->sendMessage($roster->getRoster());
        echo $this->_msg->log("Roster send");
    }
    
    private function _chucknorris()
    {
        $guild = $this->_messageDiscord->channel->guild;
        $chuck = new ChuckNorris();

        $id = $chuck->getId();

        $member = $guild->members->get('id', $id);

        if($member)
        {
            $user = $member->getUserAttribute();

            $joke = $chuck->getSingleJoke();

            $this->_messageDiscord->channel->sendMessage(str_replace('%s',$user,$joke));
        }
    }
    
    private function _rand()
    {
        $rand = rand(0,100);
        $randCaptain =  rand(0,100);

        $r = $this->_msg->getRandText($randCaptain, $rand, $this->_messageDiscord->getAuthorAttribute());

        if($rand>$randCaptain)  $r .= $this->_msg->getRandWin();            
        else $r .= $this->_msg->getRandLoose(); 

        $this->_messageDiscord->channel->sendMessage($r);
        echo $this->_msg->log("Rand send");
    }
    
    private function _log()
    {
        $log = new LogWow($this->_query);
        $result = $log->getlog();

        if($result['reply']) $this->_messageDiscord->reply($result['msg']);
        else $this->_messageDiscord->channel->sendMessage($result['msg']);

        echo $this->_msg->log("Log send");
    }
    
    private function _progress()
    {
        $progress = new WoWProgress;

        $this->_messageDiscord->channel->sendMessage($progress->queryProgress());
        $this->_messageDiscord->channel->sendMessage($this->_msg->getProgress().$progress->updateProgress());
        echo $this->_msg->log("Progress send");
    }
    
    private function _undefined()
    {
        return $this->_messageDiscord->reply($this->_msg->getUndefined());
        echo $this->_msg->log("Undefined send");
    }
    
    private function _todo()
    {
        $this->_messageDiscord->channel->sendMessage($this->_msg->getTodo());
        echo $this->_msg->log("Todo send");
    }   
    
    private function _pn()
    {
        $this->_messageDiscord->channel->sendMessage($this->_msg->getPn());
        echo $this->_msg->log("Pn send");
    }
}

