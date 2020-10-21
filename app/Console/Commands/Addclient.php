<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class addclient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:addclient';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If you need add client';

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
    public function handle()
    {
        try {
            $email = $this->ask("Input your e-mail:");

            $phone_number = $this->ask("Input your phone number:");
            DB::table('clients')->insert(
                [
                    'tel_number' => $phone_number,
                    'e-mail' => $email
                ]
            );
            $this->info("This client added successfully!");
        }
        catch (Exception $ex)
        {
            $this->error($ex->getMessage());
            DB::table('logs')->insert(
                [
                    'type' => 'error',
                    'message' => $ex->getMessage()
                ]
            );
        }
    }
}
