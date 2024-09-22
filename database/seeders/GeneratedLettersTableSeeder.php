<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneratedLettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data dummy ke tabel generated_letters
        DB::table('generated_letters')->insert([
            [
                'template_id' => 1,
                'user_id' => 1,
                'title' => 'Surat Keterangan Kerja',
                'content' => 'Ini adalah surat keterangan kerja yang dibuat berdasarkan template 1.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'template_id' => 2,
                'user_id' => 2,
                'title' => 'Surat Pernyataan',
                'content' => 'Ini adalah surat pernyataan yang dibuat berdasarkan template 2.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
