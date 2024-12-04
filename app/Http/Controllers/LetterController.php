<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;

class LetterController extends Controller
{
    public function create(Request $request)
    {
        $letter = new Letter();
        $letter->letter_number = $request->letter_number; // Dinamis, masukkan dari form
        $letter->recipient = $request->recipient;
        $letter->date = $request->date;
        $letter->save();

        return response()->json(['message' => 'Surat berhasil dibuat!']);
    }
}
