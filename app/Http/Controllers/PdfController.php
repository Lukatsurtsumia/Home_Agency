<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
public function generate(Request $request)
{
    try {

        $data = $request->all();

   foreach ($data['rows'] ?? [] as &$row) {

    $row['priceRaw'] = preg_replace('/₾/u', ' GEL', $row['priceRaw']);
    $row['totalRaw'] = preg_replace('/₾/u', ' GEL', $row['totalRaw']);
}

 

$data['totalFormatted'] = str_replace(
    ["₾", "$", "\u{202F}"],
    [" GEL", " USD", " "],
    $data['totalFormatted'] ?? ''
);
        $pdf = Pdf::loadView('pdf.summary', [
            'data' => $data
        ]);

        return $pdf->download('renovation-summary.pdf');

    }  catch (\Throwable $e) {
    report($e);   // logs the error 
    return back()->with('error', 'Sorry, we could not generate the PDF. Please try again.');
}
}
}