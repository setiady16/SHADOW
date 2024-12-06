<?php

namespace App\Http\Controllers;

use App\Models\LetterOutput;
use App\Models\Template;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Carbon\Carbon;

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
        // Ambil nomor surat terakhir dari letter_outputs untuk template ini
        $lastLetterOutput = LetterOutput::count();
        $letterTemplate = Template::whereId($template->id)->first();
        $letterContent = $letterTemplate->content;


        // Jika tidak ada LetterOutput, set nomor surat pertama (1)
        $letterNumber = $lastLetterOutput != 0 ? $lastLetterOutput + 1 : 1;

        // Format nomor surat sesuai aturan (misalnya PSG/2024/0001)
        $formattedLetterNumber = now()->year . '/' . str_pad($letterNumber, 4, '0', STR_PAD_LEFT);
        $htmlString = $letterContent;

        $currentDate = Carbon::now();

        $formattedDate = $currentDate->format('j F Y');

        $htmlString = str_replace('{{tanggal}}', $formattedDate, $htmlString );
        $htmlString = str_replace('{{kode}}', $formattedLetterNumber, $htmlString);
        $htmlString = str_replace('{{penerima}}', 'Dimas', $htmlString);
        $htmlString = str_replace('{{hari}}', 'Setiap Hari Kamis', $htmlString);
        $htmlString = str_replace('{{waktu}}', '18.00 WIB', $htmlString);


        return view('templates.edit', ["number" => $formattedLetterNumber, "penerima" => "Dimas", "template" => $letterTemplate, "content" => new HtmlString($htmlString)]);
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

        // Ambil nomor surat terakhir dari letter_outputs untuk template ini
        $lastLetterOutput = $template->letterOutputs()->latest('letter_number')->first();

        // Tentukan nomor surat baru
        $letterNumber = $lastLetterOutput ? $lastLetterOutput->letter_number + 1 : 1;

        // Simpan LetterOutput baru dengan nomor surat yang telah ditentukan
        $letterOutput = $template->letterOutputs()->create([
            'letter_number' => $letterNumber,
            'content' => $request->input('content', $template->content),
        ]);

        // Format nomor surat sesuai aturan (misalnya PSG/2024/0001)
        $formattedLetterNumber = now()->year . '/' . str_pad($letterNumber, 4, '0', STR_PAD_LEFT);

        // Inisialisasi DomPDF
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);
        $content = request()->get('content');
        // Load HTML dari konten template dan LetterOutputs
        $html = view('templates.surat', compact('template', 'content','letterOutput', 'formattedLetterNumber'))->render();

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
