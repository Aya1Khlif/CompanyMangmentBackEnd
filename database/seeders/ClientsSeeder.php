<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'Client 1',
            'logo' => 'client1_logo.jpg',
        ]);

        Client::create([
            'name' => 'Client 2',
            'logo' => 'client2_logo.jpg',
        ]);
    }
}
