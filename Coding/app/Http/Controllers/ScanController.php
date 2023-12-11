<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Inventory;
use App\Models\Kembali;
use App\Models\out;
use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScanController extends Controller
{
    /*Cari Barang Feature*/
    public function cariScanItem(){//view Cari Barang Scanner page
        return view('scan.cariScan');
    }
    public function cariScan(Request $request){//Searching item based on qr
        $data=DB::table('inventories')->where('qr',$request->qr_code)->first();
        $item=DB::table('inventories')->where('name', 'like', $request->qr_code)->first();


        if(!empty($data)){
            $sum= out::where('inventories_id', $data->id)->sum('sum');
            $hilang=Kembali::where('inventories_id', $data->id)->sum('hilang');
            $rusak=Kembali::where('inventories_id', $data->id)->sum('rusak');
            $save=Save::where('inventories_id', $data->id)->sum('sum');
            $many = $data->sum-$sum-$rusak-$hilang-$save;
            $data->hilang=$hilang;
            $data->rusak=$rusak;
            $data->many=$many;
            $data->out=$sum;
            $data->save=$save;
            $history=History::where('inventories_id', $data->id)->orderBy('created_at', 'DESC')->get();
            $out=out::where('inventories_id', $data->id)->orderBy('created_at', 'DESC')->get();
            return view('barang.deskripsi', ['data' => $data, 'history' => $history, 'out' => $out]);
        }else if(!empty($item)){
            $sum= out::where('inventories_id', $item->id)->sum('sum');
            $hilang=Kembali::where('inventories_id', $item->id)->sum('hilang');
            $rusak=Kembali::where('inventories_id', $item->id)->sum('rusak');
            $save=Save::where('inventories_id', $item->id)->sum('sum');
            $many = $item->sum-$sum-$rusak-$hilang-$save;
            $item->hilang=$hilang;
            $item->rusak=$rusak;
            $item->many=$many;
            $item->out=$sum;
            $item->save=$save;
            $history=History::where('inventories_id', $item->id)->orderBy('created_at', 'DESC')->get();
            $out=out::where('inventories_id', $item->id)->orderBy('created_at', 'DESC')->get();
            return view('barang.deskripsi', ['data' => $item, 'history' => $history, 'out' => $out]);
        }
        else{
            return redirect('home')->with('error', 'No Data');
        }
    }
    /*==================================*/

    /*Keluar Barang Feature*/
    public function scanner(){
        return view('scan.scan');
    }
    public function scan(Request $request){
        $data=DB::table('inventories')->where('qr',$request->qr_code)->first();
        $admin=Auth::user()->name;
        $save=Save::all();
        if($data!=Null){
            $sum= out::where('name', $data->name)->sum('sum');
            $hilang=Kembali::where('name', $data->name)->sum('hilang');
            $rusak=Kembali::where('name', $data->name)->sum('rusak');
            $many = $data->sum-$sum-$rusak-$hilang;
            $data->many=$many;
            if($save->count()>0){
                return view('keluar.barangKeluar', ['data'=>$data, 'admin'=>$admin, 'save'=>$save]);
            }else{
                return view('keluar.barangKeluar', ['data'=>$data, 'admin'=>$admin])->with('error', 'Not Data');
            }
        }else{
            return redirect()->back()->with('error', 'Barang Tidak Ditemukan');
        }
    }

    public function scanAgain(Request $request){
        
        $data=$request->validate([
            'admin'=>'required',
            'name'=>'required',
            'sum'=>'required',
            'inventories_id'=>'required',
        ]);
        if($data['sum']>0){
            $check=Save::where('inventories_id', $data['inventories_id'])->first();
            if($check==Null){
                $item= Inventory::where('id', $data['inventories_id'])->first();
                $sum= out::where('inventories_id', $item->id)->sum('sum');
                $hilang=Kembali::where('inventories_id', $item->id)->sum('hilang');
                $rusak=Kembali::where('inventories_id', $item->id)->sum('rusak');
                $many = $item->sum-$sum-$rusak-$hilang;
                if($data['sum']<=$many){
                    Save::create($data);
                    return view('scan.scan');
                }
                else{
                    return redirect()->back()->with('error', 'Data bermasalah');
                }
            }else{
                return redirect()->back()->with('error', 'Data sudah ada');
            }
        }else{
            return redirect()->back()->with('error', 'Jumlah Tidak Sesuai');
        }
    }
}
