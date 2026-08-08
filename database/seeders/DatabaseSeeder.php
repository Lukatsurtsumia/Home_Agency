<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL')],
           [ 'name' => 'GaGo Admin',
           'password'=> Hash::make(env('ADMIN_PASSWORD')),
           'email_verified_at' => now(),
           ]

        );

        $this->call(PortfolioDemoSeeder::class);
    }
}
