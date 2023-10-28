<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Mail\NewMessage;
use App\Mail\EndInvestment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\users;
use App\user_plans;
use App\plans;
use App\tp_transactions;
use App\Mail\DailyProfit;
use App\withdrawals;

class AutoTopup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:topup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto increment the benefits of users';

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

        $investments = user_plans::where('active', 'yes')->get();


        foreach ($investments as $investment) {
            $user_plan = $investment;

            $user = users::where('id', $user_plan->user)->first();
            $pack = plans::where('id', $user_plan->plan)->first();


            if ($user) {
                if ($pack) {

                    if ($user_plan) {

                        if ($user_plan->activated_at->diffInDays() < $user_plan->inv_duration + 1) {


                            $user->increment('roi', $pack->increment_amount);
                            $user->increment('account_bal', $pack->increment_amount);

                            $th = new tp_transactions();

                            $th->plan = $pack->id;
                            $th->user = $user->id;
                            $th->user_plan = $user_plan->id;
                            $th->amount = $pack->increment_amount;
                            $th->type = "ROI";
                            $th->save();

                            user_plans::where('id', $user_plan->id)
                                ->update([
                                    'last_growth' => Carbon::now()
                                ]);


                            //send email notification
                            $objDemo = new \stdClass();
                            $objDemo->receiver_plan = $pack->name;
                            $objDemo->received_amount = "$$pack->increment_amount";
                            $objDemo->receiver_name = $user->name;
                            $objDemo->date = Carbon::now();

                            Mail::to($user->email)->send(new DailyProfit($objDemo));

                            $withdraws = withdrawals::where('user', Auth::user()->id)->where('user_plan', $user_plan->id)->where('status', 'Processed')->sum('amount');


                            if ($user->roi + $user->ref_bonus + $withdraws + $user_plan->amount >= $pack->expected_return) {

                                $user->increment('account_bal', $user_plan->amount);

                                $profit = tp_transactions::where('user_plan', $user_plan->id)->where('user', Auth::id())->where('type', 'ROI')->sum('amount');

                                $bonus =  (($user_plan->amount * $user_plan->dplan->gift) / 100) - $profit;

                                //$user->increment('account_bal', $user_plan->amount);

                                //$bonus =  (($user_plan->amount * $user_plan->dplan->gift) / 100) - $user->roi;

                                if ($bonus > 0) {

                                    users::where('id', $user->id)
                                        ->update([
                                            'ref_bonus' => $user->ref_bonus - $bonus,
                                        ]);
                                }

                                //plan expired
                                user_plans::where('id', $user_plan->id)
                                    ->update([
                                        'active' => "expired",
                                    ]);

                                if ($bonus > 0) {

                                    //save to transactions history
                                    $th = new tp_transactions();
                                    $th->plan = $pack->id;
                                    $th->user = $user->id;
                                    $th->user_plan = $user_plan->id;
                                    $th->amount = $bonus;
                                    $th->type = "Bonus";
                                    $th->save();
                                }


                                //save to transactions history
                                $th = new tp_transactions();

                                $th->plan = $pack->id;
                                $th->user = $user->id;
                                $th->user_plan = $user_plan->id;
                                $th->amount = $user_plan->amount;
                                $th->type = "Investment capital";
                                $th->save();

                                //send email notification
                                $objDemo = new \stdClass();
                                $objDemo->receiver_plan = $pack->name;
                                $objDemo->received_amount = "$$user_plan->amount";
                                $objDemo->receiver_name = $user->name;
                                $objDemo->date = Carbon::now();

                                Mail::to($user->email)->send(new EndInvestment($objDemo));
                            }
                        } else {

                            $user->increment('account_bal', $user_plan->amount);

                            //plan expired
                            user_plans::where('id', $user_plan->id)
                                ->update([
                                    'active' => "expired",
                                ]);

                            //save to transactions history
                            $th = new tp_transactions();

                            $th->plan = $pack->id;
                            $th->user = $user->id;
                            $th->user_plan = $user_plan->id;
                            $th->amount = $user_plan->amount;
                            $th->type = "Investment capital";
                            $th->save();

                            //send email notification
                            $objDemo = new \stdClass();
                            $objDemo->receiver_plan = $pack->name;
                            $objDemo->received_amount = "$$user_plan->amount";
                            $objDemo->receiver_name = $user->name;
                            $objDemo->date = Carbon::now();

                            Mail::to($user->email)->send(new EndInvestment($objDemo));
                        }
                    }
                }
            }
        }
        $this->info('Auto increment has been done');
    }
}
