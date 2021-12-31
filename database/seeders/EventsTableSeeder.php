<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'capacity' => 2100,
                'categoryId' => 5,
                'created_at' => '2021-12-31 05:07:22',
                'date' => '2021-12-31 00:00:00',
                'deleted_at' => NULL,
                'id' => 3,
                'slug' => 'concierto',
                'updated_at' => '2021-12-31 17:29:22',
            ),
            1 => 
            array (
                'capacity' => 30,
                'categoryId' => 5,
                'created_at' => '2021-12-31 15:04:57',
                'date' => '2021-12-31 00:00:00',
                'deleted_at' => NULL,
                'id' => 4,
                'slug' => 'asdasd',
                'updated_at' => '2021-12-31 15:04:57',
            ),
            2 => 
            array (
                'capacity' => 100,
                'categoryId' => 6,
                'created_at' => '2021-12-31 15:09:02',
                'date' => '2022-01-05 00:00:00',
                'deleted_at' => NULL,
                'id' => 5,
                'slug' => 'feria',
                'updated_at' => '2021-12-31 15:13:50',
            ),
            3 => 
            array (
                'capacity' => 20,
                'categoryId' => 5,
                'created_at' => '2021-12-31 17:43:43',
                'date' => '2022-01-12 00:00:00',
                'deleted_at' => NULL,
                'id' => 10,
                'slug' => 'salud',
                'updated_at' => '2021-12-31 17:45:25',
            ),
            4 => 
            array (
                'capacity' => 30,
                'categoryId' => 7,
                'created_at' => '2021-12-31 17:50:16',
                'date' => '2022-01-27 00:00:00',
                'deleted_at' => NULL,
                'id' => 11,
                'slug' => 'teccongress',
                'updated_at' => '2021-12-31 17:50:57',
            ),
        ));
        
        
    }
}