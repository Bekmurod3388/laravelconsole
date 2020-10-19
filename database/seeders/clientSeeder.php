<?php

namespace Database\Seeders;

use App\Models\client;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use Faker\Factory as Faker;
class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('clients')->insert([
                'tel_number' => $faker->phoneNumber,
                'e-mail' => $faker->email,

            ]);


        }
    }
}
