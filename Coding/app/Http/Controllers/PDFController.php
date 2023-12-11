<?php

namespace App\Http\Controllers;

use App\Models\Hilang;
use App\Models\History;
use App\Models\Kembali;
use App\Models\out;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;

class PDFController extends Controller
{
    public function pdfHistory($search_history=null){
        if (!empty($search_history)) {
            $history = History::where('created_at', 'LIKE', '%' . $search_history . '%')->get();
            $cari = $history->isEmpty() ? null : $history[0]->created_at;
        } else {
            $history = History::all();
            $cari = null;
        }

            $dompdf=App::make(Dompdf::class);
            $pdf=FacadesView::make('pdf.history_pdf',['history'=>$history])->render();
            $dompdf->loadHtml($pdf);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            return $dompdf->stream('Barang_history '.($cari ? $cari : '').'.pdf');

    }
    public function pdfKembali($search_kembali=null){
        if (!empty($search_kembali)) {
            $kembali = Kembali::where('created_at', 'LIKE', '%' . $search_kembali . '%')->get();
            $cari = $kembali->isEmpty() ? null : $kembali[0]->created_at;
        } else {
            $kembali = Kembali::all();
            $cari = null;
        }

            $dompdf=App::make(Dompdf::class);
            $pdf=FacadesView::make('pdf.kembali_pdf',['kembali'=>$kembali])->render();
            $dompdf->loadHtml($pdf);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            return $dompdf->stream('Barang_kembali '.($cari ? $cari : '').'.pdf');
    }
    public function pdfluar($search_keluar=null){
        if (!empty($search_keluar)) {
            $keluar = out::where('created_at', 'LIKE', '%' . $search_keluar. '%')->get();
            $cari = $keluar->isEmpty() ? null : $keluar[0]->created_at;
        } else {
            $keluar = out::all();
            $cari = null;
        }

            $dompdf=App::make(Dompdf::class);
            $pdf=FacadesView::make('pdf.luar_pdf',['luar'=>$keluar])->render();
            $dompdf->loadHtml($pdf);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            return $dompdf->stream('Barang_keluar '.($cari ? $cari : '').'.pdf');
    }
}
