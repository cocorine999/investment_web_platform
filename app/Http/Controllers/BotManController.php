<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        
         $botman->fallback(function($bot) {
            $bot->types();
            $bot->reply('Sorry, I did not understand that command. Please touch this icon 👉  /start  👈');
        });

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }
    
    public function welcome($bot)
    {
       $bot->reply('welcome'); 
    }
    
    public function referral($bot)
    {
       $bot->startConversation(new AppConversation());
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
