<?php

namespace App\Http\Controllers;

use App\Models\GeneratedLetter;
use App\Models\Letter;
use Illuminate\Http\Request;

class GeneratedLetterController extends Controller
{
    public function index()
    {
        $generated_letters = GeneratedLetter::with('letter')->get();
        return view('generated_letters.index', compact('generated_letters'));
    }

    public function create()
    {
        $letters = Letter::all();
        return view('generated_letters.create', compact('letters'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'letter_id' => 'required|exists:letters,id',
            'generated_content' => 'required|string',
            'generated_at' => 'required|date',
        ]);

        GeneratedLetter::create($request->all());

        return redirect()->route('generated_letters.index')->with('success', 'Generated letter created successfully.');
    }

    public function show(GeneratedLetter $generatedLetter)
    {
        return view('generated_letters.show', compact('generatedLetter'));
    }

    public function edit(GeneratedLetter $generatedLetter)
    {
        $letters = Letter::all();
        return view('generated_letters.edit', compact('generatedLetter', 'letters'));
    }

    public function update(Request $request, GeneratedLetter $generatedLetter)
    {
        $request->validate([
            'letter_id' => 'required|exists:letters,id',
            'generated_content' => 'required|string',
            'generated_at' => 'required|date',
        ]);

        $generatedLetter->update($request->all());

        return redirect()->route('generated_letters.index')->with('success', 'Generated letter updated successfully.');
    }
    public function destroy(GeneratedLetter $generatedLetter)
    {
        $generatedLetter->delete();

        return redirect()->route('generated_letters.index')->with('success', 'Generated letter deleted successfully.');
    }
}
