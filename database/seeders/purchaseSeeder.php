<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;
use Faker\Factory as Faker;

class purchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach(range(1,10) as $index)
        {
            DB::table('purchases')->insert([
                'product'=>$faker->word(10),
                'purchase_price'=>$faker->randomDigit(),


            ]);
        }

    }
}
