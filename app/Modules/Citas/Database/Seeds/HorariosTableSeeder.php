<?php

namespace App\Modules\Citas\Database\Seeds;
use Illuminate\Database\Seeder;
Use DB, Eloquent, Model;

class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('horarios')->insert([
        	'name' => '06:00 A 12:00',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
       DB::table('horarios')->insert([
        	'name' => '08:00 A 14:00',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
    }
}
