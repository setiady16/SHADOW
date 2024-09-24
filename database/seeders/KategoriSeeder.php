<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data kategori untuk surat
        DB::table('kategori')->insert([
            [
                'id' => 'kat1',
                'nama' => 'Surat Peminjaman Kepada Adak & Adum',
                'deskripsi' => 'Kategori untuk surat peminjaman kamera & taplak.',
            ],
            [
                'id' => 'kat2',
                'nama' => 'Surat Peminjaman Kepada Fakultas',
                'deskripsi' => 'Kategori untuk surat peminjaman proyektor.',
            ],
            [
                'id' => 'kat3',
                'nama' => 'Surat Peminjaman Kepada Puskom',
                'deskripsi' => 'Kategori untuk surat peminjaman sound sistem.',
            ],
        ]);
    }
}
