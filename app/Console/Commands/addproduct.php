<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class addproduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:addproduct';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'You can add product here';

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
            $productname = $this->ask("Please, Input product name:");

            $price = $this->ask("Please, Input product price:");
            DB::table('purchases')->insert(
                [
                    'product' => $productname,
                    'purchase_price' => $price
                ]
            );
            $this->info("This product added successfully!");
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
