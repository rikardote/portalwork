<?php
namespace App\Modules\Citas\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CitasDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('App\Modules\Citas\Database\Seeds\HorariosTableSeeder');
		 $this->call('App\Modules\Citas\Database\Seeds\TiposTableSeeder');
		 $this->call('App\Modules\Citas\Database\Seeds\EspecialidadesTableSeeder');
	}

}
