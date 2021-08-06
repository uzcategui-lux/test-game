<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\StatusGame;

class StatusGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $statusGame = [
            'Status A',
            'Status B',
            'Status C',
            'Status D',
            'Status E'
        ];

        foreach ($statusGame as $status) {
            StatusGame::create([
                'description' => $status
            ]);            
        }

    }
}
