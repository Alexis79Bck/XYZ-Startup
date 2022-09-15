<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j=1; $j <= 13 ; $j++) {
            $xCNPJ = "";
            $xCEP = "";
            for ($i = 1; $i <= 8; $i++) {
                $xDigit = random_int(0, 9);
                $xCNPJ = $xCNPJ . $xDigit;
            }
            $xCNPJ = $xCNPJ . "/";
            for ($i = 1; $i <= 4; $i++) {
                $xDigit = random_int(0, 9);
                $xCNPJ = $xCNPJ . $xDigit;
            }
            $xCNPJ = $xCNPJ . "-";
            for ($i = 1; $i <= 2; $i++) {
                $xDigit = random_int(0, 9);
                $xCNPJ = $xCNPJ . $xDigit;
            }

            for ($i = 1; $i <= 5; $i++) {
                $xDigit = random_int(0, 9);
                $xCEP = $xCEP . $xDigit;
            }
            $xCEP = $xCEP . "-";
            for ($i = 1; $i <= 3; $i++) {
                $xDigit = random_int(0, 9);
                $xCEP = $xCEP . $xDigit;
            }

            DB::table('customers')->insert([
                [
                    
                    'CNPJ' => $xCNPJ,
                    'CompanyName' => Str::random(40) . ' #' . $j,
                    'FancyName' => Str::random(40) . ' ##' . $j,
                    'Phone' => '(###) ####-##-##',
                    'email' => Str::random(40),
                    'Birthday' =>random_int(1970, 2001) . '-' . random_int(1, 12) . '-' .  random_int(1, 31),
                    'CEP' => $xCEP,
                    'State' => Str::random(40),
                    'UF' => Str::upper(Str::random(2)),
                    'City' =>  Str::random(40),
                    'StreetAddress' =>  Str::random(40),
                    'Number' => random_int(0, 99),
                    'Complement' => Str::random(40),
                ],
            ]);
        }



    }
}
