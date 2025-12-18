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

        ClientAssistant::create([
            'client_id' => rand(1, 49),
            'name' => Str::random(10),
            'email' => 'assist1@client.com',
            'password' => 'password',
            'role' => ClientAssistantRole::ADMIN,
            'phone' => '1234567890',
        ]);

        ClientAssistant::create([
            'client_id' => rand(1, 49),
            'name' => Str::random(10),
            'email' => 'assist2@client.com',
            'password' => 'password',
            'role' => ClientAssistantRole::MANAGER,
            'phone' => '0987654321',
        ]);

        ClientAssistant::create([
            'client_id' => rand(1, 49),
            'name' => Str::random(10),
            'email' => 'assist3@client.com',
            'password' => 'password',
            'role' => ClientAssistantRole::VIEWER,
            'phone' => '1122334455',
        ]);
    }
}
