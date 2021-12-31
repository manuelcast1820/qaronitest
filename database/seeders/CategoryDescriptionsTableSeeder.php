<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryDescriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_descriptions')->delete();
        
        \DB::table('category_descriptions')->insert(array (
            0 => 
            array (
                'categoryId' => 4,
                'created_at' => '2021-12-31 03:22:41',
                'deleted_at' => NULL,
                'id' => 1,
                'language' => 'es',
                'name' => 'Acusticos',
                'updated_at' => '2021-12-31 03:22:41',
            ),
            1 => 
            array (
                'categoryId' => 4,
                'created_at' => '2021-12-31 03:22:41',
                'deleted_at' => NULL,
                'id' => 2,
                'language' => 'en',
                'name' => 'Covers',
                'updated_at' => '2021-12-31 04:29:45',
            ),
            2 => 
            array (
                'categoryId' => 4,
                'created_at' => '2021-12-31 04:29:45',
                'deleted_at' => NULL,
                'id' => 3,
                'language' => 'fr',
                'name' => 'Fates',
                'updated_at' => '2021-12-31 04:29:45',
            ),
            3 => 
            array (
                'categoryId' => 5,
                'created_at' => '2021-12-31 04:34:57',
                'deleted_at' => NULL,
                'id' => 4,
                'language' => 'es',
                'name' => 'año nuevo',
                'updated_at' => '2021-12-31 04:34:57',
            ),
            4 => 
            array (
                'categoryId' => 5,
                'created_at' => '2021-12-31 04:34:57',
                'deleted_at' => NULL,
                'id' => 5,
                'language' => 'en',
                'name' => 'new year',
                'updated_at' => '2021-12-31 04:34:57',
            ),
            5 => 
            array (
                'categoryId' => 5,
                'created_at' => '2021-12-31 04:34:57',
                'deleted_at' => NULL,
                'id' => 6,
                'language' => 'fr',
                'name' => 'nouvel An',
                'updated_at' => '2021-12-31 04:34:57',
            ),
            6 => 
            array (
                'categoryId' => 5,
                'created_at' => '2021-12-31 04:34:57',
                'deleted_at' => NULL,
                'id' => 7,
                'language' => 'gl',
                'name' => 'ano novo',
                'updated_at' => '2021-12-31 04:34:57',
            ),
            7 => 
            array (
                'categoryId' => 6,
                'created_at' => '2021-12-31 14:27:47',
                'deleted_at' => '2021-12-31 14:47:33',
                'id' => 8,
                'language' => 'es',
                'name' => 'comida',
                'updated_at' => '2021-12-31 14:47:33',
            ),
            8 => 
            array (
                'categoryId' => 6,
                'created_at' => '2021-12-31 14:27:47',
                'deleted_at' => '2021-12-31 14:47:33',
                'id' => 9,
                'language' => 'gl',
                'name' => 'foode',
                'updated_at' => '2021-12-31 14:47:33',
            ),
            9 => 
            array (
                'categoryId' => 6,
                'created_at' => '2021-12-31 14:27:47',
                'deleted_at' => '2021-12-31 14:47:33',
                'id' => 10,
                'language' => 'en',
                'name' => 'food',
                'updated_at' => '2021-12-31 14:47:33',
            ),
            10 => 
            array (
                'categoryId' => 6,
                'created_at' => '2021-12-31 14:47:33',
                'deleted_at' => '2021-12-31 16:07:31',
                'id' => 11,
                'language' => 'es',
                'name' => 'comida',
                'updated_at' => '2021-12-31 16:07:31',
            ),
            11 => 
            array (
                'categoryId' => 6,
                'created_at' => '2021-12-31 14:47:33',
                'deleted_at' => '2021-12-31 16:07:31',
                'id' => 12,
                'language' => 'gl',
                'name' => 'foode',
                'updated_at' => '2021-12-31 16:07:31',
            ),
            12 => 
            array (
                'categoryId' => 7,
                'created_at' => '2021-12-31 17:48:08',
                'deleted_at' => NULL,
                'id' => 13,
                'language' => 'es',
                'name' => 'Tecnologia',
                'updated_at' => '2021-12-31 17:48:08',
            ),
            13 => 
            array (
                'categoryId' => 7,
                'created_at' => '2021-12-31 17:48:08',
                'deleted_at' => NULL,
                'id' => 14,
                'language' => 'gl',
                'name' => 'tecnoloxía',
                'updated_at' => '2021-12-31 17:48:08',
            ),
            14 => 
            array (
                'categoryId' => 7,
                'created_at' => '2021-12-31 17:48:08',
                'deleted_at' => NULL,
                'id' => 15,
                'language' => 'en',
                'name' => 'Tecnology',
                'updated_at' => '2021-12-31 17:48:08',
            ),
        ));
        
        
    }
}