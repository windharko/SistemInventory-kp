<?php

namespace App\Http\Controllers;

use App\Models\Hilang;
use App\Models\History;
use App\Models\Inventory;
use App\Models\Kembali;
use App\Models\out;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getLaporan(Request $request){
        $history=History::all();
        $kembali=Kembali::all();
        $barang=Inventory::all();
        $luar=out::all();
        $searchQuery=$request->query('search_query');

        return view('hasil.laporan', ['history'=>$history, 'kembali'=>$kembali, 'barang'=>$barang, 'luar'=>$luar, 'searchQuery'=>$searchQuery]);
    }

    public function laporanHistory(Request $request){
        $cari=$request->input('search_history');
        $date=History::where('tanggalKeluar', 'LIKE', '%'.$cari.'%')->get();
        $thing=History::where('name', 'LIKE', $cari)->get();
        $kembali=Kembali::all();
        $barang=Inventory::all();
        $luar=out::all();

        if($date->count()>0){
            $searchHistory=$request->query('search_history');
            return view('hasil.laporan', ['history'=>$date, 'kembali'=>$kembali, 'barang'=>$barang, 'luar'=>$luar, 'searchHistory'=>$searchHistory]);
        }else if($thing->count()>0){
            $searchHistory=$request->query('search_hilang');
            return view('hasil.laporan', ['history'=>$thing, 'kembali'=>$kembali, 'barang'=>$barang, 'luar'=>$luar, 'searchHistory'=>$searchHistory]);
        }else{
            $searchHistory=$request->query('search_hilang');
            return view('hasil.laporan', ['history'=>$date, 'kembali'=>$kembali, 'barang'=>$barang, 'luar'=>$luar, 'searchHistory'=>$searchHistory]);
        }
    }

    public function laporanKembali(Request $request){
        $cari=$request->input('search_kembali');
        $date=Kembali::where('created_at', 'LIKE', '%'.$cari.'%')->get();
        $thing=Kembali::where('name', 'LIKE', $cari)->get();
        $history=History::all();
        $barang=Inventory::all();
        $luar=out::all();

        if($date->count()>0){
            $searchKembali=$request->query('search_kembali');
            return view('hasil.laporan', ['history'=>$history, 'kembali'=>$date, 'barang'=>$barang, 'luar'=>$luar, 'searchKembali'=>$searchKembali]);
        }else if($thing->count()>0){
            $searchKembali=$request->query('search_kembali');
            return view('hasil.laporan', ['history'=>$history, 'kembali'=>$thing, 'barang'=>$barang, 'luar'=>$luar, 'searchKembali'=>$searchKembali]);
        }else{
            $searchKembali=$request->query('search_kembali');
            return view('hasil.laporan', ['history'=>$history, 'kembali'=>$date, 'barang'=>$barang, 'luar'=>$luar, 'searchKembali'=>$searchKembali]);;
        }
    }

    public function laporanKeluar(Request $request){
        $cari=$request->input('search_keluar');
        $date=out::where('created_at', 'LIKE', '%'.$cari.'%')->get();
        $thing=out::where('name', 'LIKE', $cari)->get();
        $history=History::all();
        $barang=Inventory::all();
        $kembali=Kembali::all();

        if($date->count()>0){
            $searchKeluar=$request->query('search_keluar');
            return view('hasil.laporan', ['history'=>$history, 'kembali'=>$kembali, 'barang'=>$barang, 'luar'=>$date, 'searchKembali'=>$searchKeluar]);
        }else if($thing->count()>0){
            $searchKeluar=$request->query('search_keluar');
            return view('hasil.laporan', ['history'=>$history, 'kembali'=>$kembali, 'barang'=>$barang, 'luar'=>$thing, 'searchKembali'=>$searchKeluar]);
        }else{
            $searchKeluar=$request->query('search_keluar');
            return view('hasil.laporan', ['history'=>$history, 'kembali'=>$kembali, 'barang'=>$barang, 'luar'=>$date, 'searchKembali'=>$searchKeluar]);
        }
    }
}
