<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $xTypeSala = DB::table('TypesSalas')->count('id');
        $xPredio = DB::table('Predios')->count('id');
        $xGallery = DB::table('PhotoGalleries')->where('Type', '=', 'Salas')->count('id');
        for ($j=1; $j <=25 ; $j++) {
            DB::table('Salas')->insert([
                'Name' => Str::random(15),
                'Description'=> Str::random(25),
                'predio_id'=> random_int(1, $xPredio),
                'typeSala_id'=>  random_int(1, $xTypeSala),
                'photogallery_id' =>  random_int(1, $xGallery),
            ]);

        }
    }
}
