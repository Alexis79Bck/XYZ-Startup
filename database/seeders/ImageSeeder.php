<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 15 ; $i++) {
            $xNumber = random_int(1, 6);
            DB::table('images')->insert([
                [
                    'Title' => 'Title Image #' . $i ,
                    'ImagePath' => 'https://picsum.photos/seed/picsum/200/300',
                    'photogallery_id' => $xNumber
                ],
            ]);

        }

    }
}
