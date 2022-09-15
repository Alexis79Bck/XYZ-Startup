<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $xNumber = random_int(1, 25);
            $xElementIndex = random_int(0,1);
            $xElement = ['Predios', 'Salas'];

            DB::table('PhotoGalleries')->insert([
                [
                    'Name' => 'Gallery #0' . $i,
                    'Type' => $xElement[$xElementIndex],
                    'Model_id' => $xNumber,
                    'Model_Type' => $xElement[$xElementIndex]
                ],
            ]);
        }
    }
}
