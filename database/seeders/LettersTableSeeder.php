<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data untuk tabel letters
        DB::table('letters')->insert([
            [
                'title' => 'Surat Undangan',
                'content' => 'Ini adalah contoh konten untuk surat undangan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Surat Pemberitahuan',
                'content' => 'Ini adalah contoh konten untuk surat pemberitahuan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Surat Keterangan',
                'content' => 'Ini adalah contoh konten untuk surat keterangan.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
