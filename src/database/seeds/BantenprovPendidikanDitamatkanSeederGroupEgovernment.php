<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\PendidikanDitamatkan\Models\Bantenprov\PendidikanDitamatkan\PendidikanDitamatkan;

class BantenprovPendidikanDitamatkanSeederPendidikanDitamatkan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $pendidikan_ditamatkans = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($pendidikan_ditamatkans as $pendidikan_ditamatkan) {
            $model = PendidikanDitamatkan::updateOrCreate(
                [
                    'label' => $pendidikan_ditamatkan->label,
                ],
                [
                    'description' => $pendidikan_ditamatkan->description,
                ]
            );
            $model->save();
        }
	}
}
