<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Aperture House',
                'category' => 'Brand Films',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Frame & Co.',
                'category' => 'Creative Agency',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Northline Studio',
                'category' => 'Commercial Brand',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Bloom Atelier',
                'category' => 'Fashion House',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Prism Collective',
                'category' => 'Design Studio',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Urban Craft',
                'category' => 'Retail Brand',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Motion House',
                'category' => 'Production Partner',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Atlas Media',
                'category' => 'Agency Partner',
                'order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
