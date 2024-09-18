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
        // Jalankan seeder untuk tabel users
        $this->call(UsersTableSeeder::class);

        // Jalankan seeder untuk tabel templates
        $this->call(TemplatesTableSeeder::class);
    }
}
