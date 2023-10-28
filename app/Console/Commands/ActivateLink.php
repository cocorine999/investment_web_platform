<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Mail\NewMessage;
use App\Mail\NewRegistration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class ActivateLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:activate_link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send to user his activate link';

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
        
        //send email
        /*$objDemo = new \stdClass();
        $objDemo->receiver_email = "afro.bio.cosmetiques@gmail.com
";
        $objDemo->receiver_password = "password";
        $objDemo->sender = "BillionCycle";
        $objDemo->receiver_name = "Achille";
        $objDemo->receiver_name = "NISSOU";
        $objDemo->acct_activate_link = "https://billioncycle.com/activate/17uWUf9aEyksB4j8tmgrrfflcAwA8Hr1sfTG6OqZ";

        Mail::to("afro.bio.cosmetiques@gmail.com
")->send(new NewRegistration($objDemo));*/

        $objDemo = new \stdClass();
            $objDemo->message = "Alain, This is to inform you that account is now increment.";
        $objDemo->sender = "BillionCycle";
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = "Auto Topup!";
        Mail::to("afro.bio.cosmetiques@gmail.com")->send(new NewRegistration($objDemo));
        $this->info('Activate Link Notification has been Sent');
    }
}
