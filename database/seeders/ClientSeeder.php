<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Support\Str;
use App\Models\ClientAssistant;
use Illuminate\Database\Seeder;
use App\Enums\ClientAssistantRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory()->count(50)->create();

        ClientAssistant::factory()->count(50)->create();
    }
}
