<?php

namespace App\Http\Controllers;

use App\Models\Hilang;
use App\Models\History;
use App\Models\Inventory;
use App\Models\Kembali;
use App\Models\out;
use App\Models\Save;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarangController extends Controller
{
    /*home function*/
    public function home(){//show all item in database
        $barang=Inventory::paginate(10);

        foreach($barang as $item){
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
        };
        if($barang->count()>0){
            return view('dashboard.home', ['barang'=>$barang]);
        }else{
            $barang = array();
            return view('dashboard.home', ['barang'=>$barang]);
        }
    }
    public function cariStock(Request $request){//search the item based on name
        $data=Inventory::where('name', 'LIKE', '%'.$request->cariBarang.'%')->paginate(10);
        $cariBarang=$request->query('cariBarang');
        if($data->count()>0){
            foreach($data as $item){
                $sum= out::where('inventories_id', $item->id)->sum('sum');
                $hilang=Kembali::where('inventories_id', $item->id)->sum('hilang');
                $rusak=Kembali::where('inventories_id', $item->id)->sum('rusak');
                $save=Save::where('inventories_id', $item->id)->sum('sum');
                $many = $item->sum-$sum-$rusak-$hilang-$save;
                $item->hilang=$hilang;
                $item->rusak=$rusak;
                $item->many=$many;
                $item->out=$sum;
            };
            return view('dashboard.home', ['barang'=>$data, 'cariBarang'=>$cariBarang]);
        }else{
            return redirect('home')->with('error', 'Data NOT Found');
        }
    }
    /*=========================*/

    public function viewBarang(){
        return view('barang.updateBarang');
    }

    public function updateBarang(Request $request){
        $data=$request->validate([
            'name'=>['required'],
            'sum'=>['required'],
            'photo'=>['required'],
        ]);
        
        $code=Str::random(30);
        $qr=QrCode::size(300)->format('png')->generate($code);
        Storage::disk('public')->put('qr/' . $data['name']. '.png', $qr);
        $size= $request->file('photo')->getSize();
        $realName=$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/images/', $realName);
        $data['realName']=$realName;
        $data['size']=$size;
        $data['qr']=$code;
        Inventory::create($data);
        $allData=Inventory::all();
        return redirect()->route('barang', ['data'=>$allData]);
    }

    public function barang(){
        $data=Inventory::all();

        if($data->count()>0){
            return view('barang.barang', ['data'=>$data]);
        }else{
            $data = array();
            return view('barang.barang', ['data'=>$data]);
        }
    }


    public function kembali($id){   
        $data=DB::table('outs')->where('id', $id)->first();

        return view('barang.kembali', ['data'=>$data]);
    }

    public function postKembali(Request $request, $id){
        $data=$request->validate([
            'kembali'=>'required',
            'hilang'=>'required',
            'rusak'=>'required',
            'inventories_id'=>'required',
        ]);
        $newdata=DB::table('outs')->where('id', $id)->first();
        $total=$data['kembali']+$data['hilang']+$data['rusak'];
        if($total==$newdata->sum){
            Kembali::create([
                'name'=>$newdata->name,
                'admin'=>$newdata->admin,
                'sum'=>$newdata->sum,
                'kembali'=>$data['kembali'],
                'hilang'=>$data['hilang'],
                'rusak'=>$data['rusak'],
                'inventories_id'=>$data['inventories_id'],
                'tanggalKeluar'=>$newdata->created_at,
            ]);
            History::create([
                'name'=>$newdata->name,
                'sum'=>$newdata->sum,
                'admin'=>$newdata->admin,
                'inventories_id'=>$data['inventories_id'],
                'tanggalKeluar'=>$newdata->created_at,
            ]);
            DB::table('outs')->where('id', $id)->delete();
            return redirect()->route('keluar');
        }else{
            return redirect()->back()->with('error', 'Jumlah tidak sesuai');
        }
    }

    public function cariBarang(Request $request){
        $data=Inventory::where('name', 'LIKE', '%'.$request->cariBarang.'%')->get();
        $cariBarang=$request->query('cariBarang');
        
        if($data->count()>0){
            return view('barang.barang', ['data'=>$data, 'cariBarang'=>$cariBarang]);
        }else{
            return redirect('barang')->with('error', 'Data NOT Found');
        }
    }
    
    public function update($id){
        $data=DB::table('inventories')->where('id', $id)->first();

        return view('barang.update', ['data'=>$data]);
    }    

    public function hapus($id){
        $data=DB::table('inventories')->where('id', $id)->first();

        return view('barang.hapus', ['data'=>$data]);
    }

    public function postUpdate(Request $request, $id){
        $data=$request->validate([
            'sum'=>'required'
        ]);
        $new=Inventory::where('id', $id)->first();
        DB::table('Inventories')->where('id', $id)->update(['sum'=>$data['sum']]);
              
        return redirect()->route('barang');
    }

    public function postHapus($id){
        DB::table('Inventories')->where('id', $id)->delete();
              
        return redirect()->route('barang');
    }

    public function qrPrint($id){
        $data=Inventory::where('id','=',$id)->first();
        return view('scan.qr',['data'=>$data]);
    }

    public function photo($id){
        $data=Inventory::where('id','=',$id)->first();
        return view('barang.foto',['data'=>$data]);
    }
}
