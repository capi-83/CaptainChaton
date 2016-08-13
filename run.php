<?php

include __DIR__.'/vendor/autoload.php';

spl_autoload_register(function ($class) {
     include __DIR__.'/Src/Controllers/'.$class . '.class.php';
});

$discord = new \Discord\Discord([
    'token' => '',
]);


$discord->on('ready', function ($discord) {
    
    $msg = new Msg();  
    echo $msg->log("Bot is ready.");
     
    $game = $discord->factory(Discord\Parts\User\Game::class, ['name' => 'write !help']);
    $discord->updatePresence($game);

    
    // Listen for events here
    $discord->on('message', function ($message) {
        
        $msg = new Msg();
        $logger = new Logger('./log');	
        
        if(substr($message->content,0,1)== '!')
        {
            echo $msg->log("{$message->author->username}: {$message->content}");
            $logger->log('history', 'err_php', "{$message->author->username}: {$message->content}", Logger::GRAN_MONTH);
           
            $request = new Query($message);
        }
    });
    
    
});

$discord->run();