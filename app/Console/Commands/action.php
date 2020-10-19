<?php

namespace App\Console\Commands;

use App\Mail\Email;
use App\Models\client;
use App\Models\purchase;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class action extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:action';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'actions here! Good Luck!!!';

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
     * @return int
     */

    //choose e-mail
    public function choosemail()
    {
        try {
            $mailer = client::all();
            $mailing_list = [];

            foreach ($mailer as $client) {
                array_push($mailing_list, $client['e-mail']);
            }

            $choosenmail1 = $this->choice('which e-mail do you send?', $mailing_list);
            return $choosenmail1;
        }
        catch (Exception $ex)
        {
            $this->error ($ex->getMessage());
            DB::table('logs')->insert(
                [
                    'type'=>"error",
                    'message'=>$ex->getMessage()
                ]);

        }

    }
    //choose phone number
    public function smsnumber()
    {
        try {
            $number = client::all();
            $number_list = [];

            foreach ($number as $item) {
                array_push($number_list, $item['tel_number']);
            }

            $data = $this->choice('which sms do you send?', $number_list);
            return $data;
        }
        catch (Exception $ex){
            $this->error ($ex->getMessage());
            DB::table('logs')->insert(
                [
                    'type'=>"error",
                    'message'=>$ex->getMessage()
                ]);

        }
    }

    //choose purchase
    public function choosepurchase()
    {
        try {
            $purchaseall = purchase::all();
            $purchase_list = [];



            foreach ($purchaseall as $purchaseitem) {
                array_push($purchase_list, $purchaseitem['product'].' - '.$purchaseitem['purchase_price']);

            }

            $choosenproduct = $this->choice('which product do you choose?', $purchase_list);
//            $product = Db::table('purchases')->where(['product'=>$choosenproduct])->first();
//            var_export($product);
            return $choosenproduct;
        }
        catch (Exception $ex)
        {
            $this->error ($ex->getMessage());
            DB::table('logs')->insert(
                [
                    'type'=>"error",
                    'message'=>$ex->getMessage()
                ]);

        }
    }

    public function handle()
    {
        try {
            $sendmethod = $this->choice('How do you send?', ['e-mail', 'sms']);

            if ($sendmethod === 'e-mail') {
                $choosenmail = $this->choosemail();
                $choosenp = $this->choosepurchase();
                $xabar = 'You made the purchase:' . $choosenp . ' $';

                Mail::to($choosenmail)->send(new Email($xabar));
                /*--Mail::send('email', $data, function ($message) {

                    $message->from('task3388@gmail.com');

                    $message->to('bekmurod3388@gmail.com')
                        ->subject('Payment');

                });--*/
                $this->info('The emails are send successfully!');
                DB::table('logs')->insert(
                    [
                        'type'=>"info",
                        'message'=>'The emails are send successfully! to '.$choosenmail
                    ]);

            } else {
                $choosensms = $this->smsnumber();
                $choosenp = $this->choosepurchase();
                $this->info('The sms are send successfully!');
                DB::table('logs')->insert(
                    [
                        'type'=>"info",
                        'message'=>'The sms are send successfully! to '.$choosensms
                    ]);
            }



        }
        catch (Exception $ex)
        {
            $this->error ($ex->getMessage());
            DB::table('logs')->insert(
                [
                    'type'=>"error",
                    'message'=>$ex->getMessage()
                ]);

        }

    }
}
