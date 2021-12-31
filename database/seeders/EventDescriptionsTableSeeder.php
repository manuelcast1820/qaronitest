<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventDescriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('event_descriptions')->delete();
        
        \DB::table('event_descriptions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-12-31 05:07:22',
                'deleted_at' => NULL,
                'eventId' => 3,
                'id' => 1,
                'language' => 'es',
                'name' => 'concierto deftones',
                'updated_at' => '2021-12-31 16:29:37',
            ),
            1 => 
            array (
                'created_at' => '2021-12-31 05:07:22',
                'deleted_at' => NULL,
                'eventId' => 3,
                'id' => 2,
                'language' => 'en',
                'name' => 'concert deftones',
                'updated_at' => '2021-12-31 16:29:37',
            ),
            2 => 
            array (
                'created_at' => '2021-12-31 05:53:54',
                'deleted_at' => NULL,
                'eventId' => 3,
                'id' => 3,
                'language' => 'fr',
                'name' => 'concert',
                'updated_at' => '2021-12-31 16:29:37',
            ),
            3 => 
            array (
                'created_at' => '2021-12-31 15:04:57',
                'deleted_at' => NULL,
                'eventId' => 4,
                'id' => 4,
                'language' => 'en',
                'name' => 'asdasd',
                'updated_at' => '2021-12-31 15:04:57',
            ),
            4 => 
            array (
                'created_at' => '2021-12-31 15:09:02',
                'deleted_at' => NULL,
                'eventId' => 5,
                'id' => 5,
                'language' => 'es',
                'name' => 'Comida',
                'updated_at' => '2021-12-31 15:09:02',
            ),
            5 => 
            array (
                'created_at' => '2021-12-31 15:13:50',
                'deleted_at' => NULL,
                'eventId' => 5,
                'id' => 6,
                'language' => 'en',
                'name' => 'Food',
                'updated_at' => '2021-12-31 15:13:50',
            ),
            6 => 
            array (
                'created_at' => '2021-12-31 17:29:22',
                'deleted_at' => NULL,
                'eventId' => 3,
                'id' => 7,
                'language' => 'gl',
                'name' => 'concerto',
                'updated_at' => '2021-12-31 17:29:22',
            ),
            7 => 
            array (
                'created_at' => '2021-12-31 17:43:43',
                'deleted_at' => NULL,
                'eventId' => 10,
                'id' => 12,
                'language' => 'es',
                'name' => 'Congreso de la Salud',
                'updated_at' => '2021-12-31 17:43:43',
            ),
            8 => 
            array (
                'created_at' => '2021-12-31 17:45:25',
                'deleted_at' => NULL,
                'eventId' => 10,
                'id' => 15,
                'language' => 'gl',
                'name' => 'congreso de saúde',
                'updated_at' => '2021-12-31 17:45:25',
            ),
            9 => 
            array (
                'created_at' => '2021-12-31 17:50:16',
                'deleted_at' => NULL,
                'eventId' => 11,
                'id' => 16,
                'language' => 'es',
                'name' => 'Congreso de Desarrollo Movil',
                'updated_at' => '2021-12-31 17:50:16',
            ),
            10 => 
            array (
                'created_at' => '2021-12-31 17:50:16',
                'deleted_at' => NULL,
                'eventId' => 11,
                'id' => 17,
                'language' => 'en',
                'name' => 'Mobile Development Congress',
                'updated_at' => '2021-12-31 17:50:16',
            ),
        ));
        
        
    }
}