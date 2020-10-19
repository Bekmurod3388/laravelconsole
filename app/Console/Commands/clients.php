<?php

namespace App\Console\Commands;
use App\Models\client;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class clients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:clients';



    protected $description = 'Client table';

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
        $headers=['id','tel_number','e-mail'];
        $client = client::all(['id','tel_number' ,'e-mail'])->toArray();


        $this->table($headers,$client);
    }
}
