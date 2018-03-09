<?php

use Illuminate\Database\Seeder;

class BantenprovPendidikanDitamatkanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovPendidikanDitamatkanSeederPendidikanDitamatkan::class);
    }
}
