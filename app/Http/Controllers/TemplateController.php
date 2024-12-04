<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = Template::all();
        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Template::create($request->all());

        return redirect()->route('templates.index')->with('success', 'Template created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        // Mengambil semua LetterOutputs yang terkait dengan template
        $letterOutputs = $template->letterOutputs;

        // Mengirim data ke view
        return view('templates.surat', compact('template', 'letterOutputs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $template->update($request->all());

        return redirect()->route('templates.index')->with('success', 'Template updated successfully.');
    }

    /**
     * Download a template as a PDF.
     */
    public function download(Request $request, $id)
    {
        // Temukan template berdasarkan ID
        $template = Template::findOrFail($id);

        // Ambil LetterOutputs terkait
        $letterOutputs = $template->letterOutputs;

        // Get the content from the request if available
        $content = $request->input('content', $template->content);

        // Inisialisasi DomPDF
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);

        // Load HTML dari konten template dan LetterOutputs
        $html = view('templates.surat', compact('template', 'letterOutputs', 'content'))->render();

        // Load HTML ke DomPDF
        $dompdf->loadHtml($html);

        // (Opsional) Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        return $dompdf->stream($template->name . '.pdf', ['Attachment' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        $template->delete();

        return redirect()->route('templates.index')->with('success', 'Template deleted successfully.');
    }
}
