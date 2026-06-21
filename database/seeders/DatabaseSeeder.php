<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@pawai-tatung.com'],
            [
                'name' => 'Admin Pawai Tatung',
                'password' => bcrypt('admin123'),
            ]
        );
    }
}
