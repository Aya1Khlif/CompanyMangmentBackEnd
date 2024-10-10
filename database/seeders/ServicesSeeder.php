<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'Service 1',
            'sub_title' => 'Service 1 Subtitle',
            'description' => 'This is the description of Service 1.',
            'image' => 'service1.jpg',
            'card_image' => 'card_service1.jpg',
            'status' => Status::Active,
        ]);

        Service::create([
            'title' => 'Service 2',
            'sub_title' => 'Service 2 Subtitle',
            'description' => 'This is the description of Service 2.',
            'image' => 'service2.jpg',
            'card_image' => 'card_service2.jpg',
            'status' => Status::Active,
        ]);

    }
}
