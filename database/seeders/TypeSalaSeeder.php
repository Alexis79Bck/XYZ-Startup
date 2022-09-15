<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TypeSalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($j=1; $j <=5 ; $j++) {
            DB::table('TypesSalas')->insert([
                'Name' => Str::random(15),
                'Description' => Str::random(40),
                'CostPerMinute'=>random_int(10, 99),
            ]);

         }
    }
}
