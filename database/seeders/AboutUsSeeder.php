<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::updateOrCreate(
            ['id' => 1],
            [
            'company_name' => 'My Company',
            'about_company' => 'This is some information about the company.',
            'phone' => '123-456-7890',
            'phone2' => '987-654-3210',
            'email' => 'contact@company.com',
            'website' => 'https://mycompany.com',
            'location' => '123 Main St, City, Country',
            'facebook' => 'https://facebook.com/company',
            'whatsapp' => 'https://wa.me/1234567890',
            'instagram' => 'https://instagram.com/company',
            'telegram' => 'https://t.me/company',
            'logo' => 'company_logo.jpg',
            'established_date' => '2000-01-01',
            'status' => Status::Active,
            'meta_title' => 'Company Meta Title',
            'meta_description' => 'Company Meta Description',
        ]);
    }

}
