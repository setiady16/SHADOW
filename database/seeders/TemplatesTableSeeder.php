<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed some example templates
        DB::table('templates')->insert([
            [
                'name' => 'Template Surat Resmi',
                'content' => '<h1>Surat Resmi</h1><p>Ini adalah template untuk surat resmi.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Template Surat Undangan',
                'content' => '<h1>Surat Undangan</h1><p>Ini adalah template untuk surat undangan.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Template Surat Keterangan',
                'content' => '<h1>Surat Keterangan</h1><p>Ini adalah template untuk surat keterangan.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
