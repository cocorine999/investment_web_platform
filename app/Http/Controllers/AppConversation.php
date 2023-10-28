<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class AppConversation extends Controller
{
    
    /**
     * Place your App questions logic here.
     */
    
    public function welcome()
    {
        $this->showInfo();
    }

    private function showInfo()
    {
    $this->say('You will be shown some questions about Laravel. Every correct answer will reward you with a certain amount of points. Please keep it fair, and don\'t use any help. All the best! 🍀');
    }
}
