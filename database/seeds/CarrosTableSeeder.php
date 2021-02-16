<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table carros is empty
        if(DB::table('carros')->get()->count() == 0){

            DB::table('carros')->insert([

                [
                    'id_marca'   => 1,
                    'modelo'     => 'Onix Plus',
                    'ano'        => '2015',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id_marca'   => 2,
                    'modelo'     => 'Ford Mustang',
                    'ano'        => '1995',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                   	'id_marca'   => 3,
                    'modelo'     => 'Proace City Verso',
                    'ano'        => '2020',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[A tabela não está vazia === "; }

    }
}
