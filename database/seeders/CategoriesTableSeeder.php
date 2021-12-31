<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'created_at' => '2021-12-31 03:22:41',
                'deleted_at' => NULL,
                'id' => 4,
                'slug' => 'Musicales',
                'updated_at' => '2021-12-31 03:22:41',
            ),
            1 => 
            array (
                'created_at' => '2021-12-31 04:34:57',
                'deleted_at' => NULL,
                'id' => 5,
                'slug' => 'newyear',
                'updated_at' => '2021-12-31 04:34:57',
            ),
            2 => 
            array (
                'created_at' => '2021-12-31 14:27:47',
                'deleted_at' => '2021-12-31 16:07:31',
                'id' => 6,
                'slug' => 'comida',
                'updated_at' => '2021-12-31 16:07:31',
            ),
            3 => 
            array (
                'created_at' => '2021-12-31 17:48:08',
                'deleted_at' => NULL,
                'id' => 7,
                'slug' => 'tecnologia',
                'updated_at' => '2021-12-31 17:48:08',
            ),
        ));
        
        
    }
}