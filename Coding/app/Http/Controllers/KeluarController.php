<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Kembali;
use App\Models\out;
use App\Models\Save;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeluarController extends Controller
{
    /*Barang Keluar fiture*/
    public function getKeluar(){
        $data=out::paginate(10);

        if($data->count()>0){
            return view('keluar.keluar', ['data'=>$data]);
        }else{
            $data = array();
            return view('keluar.keluar',['data'=>$data]);
        }
    }

    public function getKeluarBarang(){
        $data=Inventory::pluck('name');
        $admin=Auth::user()->name;
        return view('keluar.barangKeluar',['data'=>$data, 'admin'=>$admin]);
    }

    public function postKeluar(Request $request){
        $data=$request->validate([
            'name'=>['required', ],
            'sum'=>['required'],
        ]);
        $data['admin']=Auth::user()->name;

        out::create($data);
        return redirect()->route('keluar');
    }
    public function cariKeluar(Request $request){
        $data=out::where('name', 'LIKE', '%'.$request->cariKeluar.'%')->paginate(10);
        $cariKeluar=$request->query('cariKeluar');
        if($data->count()>0){
            return view('keluar.keluar', ['data'=>$data, 'cariKeluar'=>$cariKeluar]);       
        }else{
            return redirect('keluar')->with('error', 'Data NOT Found');
        }
    }
    /*=======================================*/

    /*Saving all item that will out*/
    public function saved(){
        $data=Save::paginate(10);
        if($data->count()>0){
            return view('keluar.save',['save'=>$data]);
        }else{
            $data = array();
            return view('keluar.save',['save'=>$data]);
        }
    }

    public function firstSaved(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'admin'=>'required',
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
                    $save=Save::paginate(10);
                    return view('keluar.save',['save'=>$save]);
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
    public function saving(){
        $save=Save::all();
        foreach($save as $item){
            out::create([
                'name'=>$item->name,
                'sum'=>$item->sum,
                'admin'=>$item->admin,
                'inventories_id'=>$item->inventories_id,
            ]);
        }
        Save::truncate();
        return redirect('keluar');
    }
    public function hapus($id){
        Save::where('id', $id)->delete();
        return redirect('saved')->with('success', 'Data sudah dihapus');
    }
    /*====================================*/
}
