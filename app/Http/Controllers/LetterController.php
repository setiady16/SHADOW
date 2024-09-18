<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\User;
use App\Models\Template;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = Letter::with('user', 'template')->get();
        return view('letters.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $templates = Template::all();
        return view('letters.create', compact('users', 'templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'template_id' => 'required|exists:templates,id',
            'title' => 'required|string|max:255',
        ]);

        Letter::create($request->all());

        return redirect()->route('letters.index')->with('success', 'Letter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        return view('letters.show', compact('letter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        $users = User::all();
        $templates = Template::all();
        return view('letters.edit', compact('letter', 'users', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'template_id' => 'required|exists:templates,id',
            'title' => 'required|string|max:255',
        ]);

        $letter->update($request->all());

        return redirect()->route('letters.index')->with('success', 'Letter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        $letter->delete();

        return redirect()->route('letters.index')->with('success', 'Letter deleted successfully.');
    }

    /**
     * Generate a letter template view with data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateSurat(Request $request)
    {
        // Data yang akan dikirim ke view
        $data = [
            'tanggal' => date('d-m-Y'),
            'penerima' => 'Bapak/Ibu Penerima',
            'isi_surat' => 'Dengan ini kami menginformasikan bahwa...',
            'pengirim' => 'Nama Pengirim',
            'barcode' => 'path/to/barcode/image.png',
        ];

        // Memanggil template surat dan mengirim data
        return view('templates.surat', $data);
    }
}
