<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PredioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $xCostumer = DB::table('Customers')->count('id');
        $xGallery = DB::table('PhotoGalleries')->where('Type','=','Predios')->count('id');

        for ($j = 1; $j <= 8; $j++) {
            $xCEP = "";
            for ($i = 1; $i <= 5; $i++) {
                $xDigit = random_int(0, 9);
                $xCEP = $xCEP . $xDigit;
            }
            $xCEP = $xCEP . "-";
            for ($i = 1; $i <= 3; $i++) {
                $xDigit = random_int(0, 9);
                $xCEP = $xCEP . $xDigit;
            }

            DB::table('Predios')->insert([
                'Name' => Str::random(15),
                'Description' => Str::random(15),
                'CEP' => $xCEP,
                'State' => Str::random(40),
                'UF' => Str::upper(Str::random(2)),
                'City' => Str::random(40),
                'StreetAddress' => Str::random(40),
                'Number' => random_int(0, 99),
                'Complement' => Str::random(40),
                'customer_id' => random_int(1, $xCostumer),
                'photogallery_id' => random_int(1, $xGallery),
            ]);

        }

    }
}
