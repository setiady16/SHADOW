<?php

namespace App\Http\Controllers;

use App\Models\GeneratedLetter;
use App\Models\Letter;
use Illuminate\Http\Request;

class GeneratedLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generated_letters = GeneratedLetter::with('letter')->get();
        return view('generated_letters.index', compact('generated_letters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letters = Letter::all();
        return view('generated_letters.create', compact('letters'));
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
            'letter_id' => 'required|exists:letters,id',
            'generated_content' => 'required|string',
            'generated_at' => 'required|date',
        ]);

        GeneratedLetter::create($request->all());

        return redirect()->route('generated_letters.index')->with('success', 'Generated letter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneratedLetter  $generatedLetter
     * @return \Illuminate\Http\Response
     */
    public function show(GeneratedLetter $generatedLetter)
    {
        return view('generated_letters.show', compact('generatedLetter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneratedLetter  $generatedLetter
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneratedLetter $generatedLetter)
    {
        $letters = Letter::all();
        return view('generated_letters.edit', compact('generatedLetter', 'letters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneratedLetter  $generatedLetter
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneratedLetter  $generatedLetter
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneratedLetter $generatedLetter)
    {
        $generatedLetter->delete();

        return redirect()->route('generated_letters.index')->with('success', 'Generated letter deleted successfully.');
    }
}
