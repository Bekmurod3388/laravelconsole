<?php

namespace App\Console\Commands;
use App\Models\purchase;
use Illuminate\Console\Command;

class purchases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:purchase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'purchase table';

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
        $headers=['id','product','purchase_price'];
        $purchases = purchase::all(['id','product' ,'purchase_price'])->toArray();


        $this->table($headers,$purchases);
    }
}
