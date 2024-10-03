<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf; // Import DomPDF

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar semua kategori dengan fitur pencarian dan pengurutan.
     */
    public function index(Request $request)
    {
        // Mendapatkan kata kunci pencarian dari request
        $search = $request->input('search');

        // Mengambil kategori berdasarkan pencarian dan mengurutkannya
        $kategori = Kategori::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })->orderBy('nama', 'asc')->get();

        // Mengembalikan view dengan data kategori
        return view('kategori.index', compact('kategori', 'search'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Menyimpan kategori baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Membuat kategori baru
        Kategori::create([
            'id' => uniqid('kat'), // Buat ID unik dengan prefix 'kat'
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan kategori berdasarkan ID-nya.
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.show', compact('kategori'));
    }

    /**
     * Menampilkan form untuk mengedit kategori.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Memperbarui kategori yang ada di dalam database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Cari kategori berdasarkan ID dan update data
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }

    /**
     * Mengekspor data kategori ke dalam format PDF.
     */
    public function exportPdf()
    {
        $kategori = Kategori::all(); // Ambil semua data kategori
        $pdf = Pdf::loadView('kategori.export', compact('kategori')); // Muat view untuk PDF
        return $pdf->download('Data_Kategori.pdf'); // Download file PDF
    }
}
