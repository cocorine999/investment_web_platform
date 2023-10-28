<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Mail\NewMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SubscriptionPlan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:plan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify to user to subscribe to a new pack';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
         //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = "Alain, This is to inform you that you can run for a new investment.";
        $objDemo->sender = "BillionCycle";
        $objDemo->date = Carbon::Now();
        $objDemo->subject = "Subscription for a new plan!";
        
        Mail::bcc("bocogacorine@gmail.com")->send(new NewMessage($objDemo));
        
        $this->info('Subscription Notification has been Sent');
    }
}
