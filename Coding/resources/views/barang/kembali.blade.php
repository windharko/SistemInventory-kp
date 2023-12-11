<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Barang Hilang</title>

        <link href="/css/kembali.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="content">
            <div class='card-header py-3'>
                <h2 class="card-title text-center">Barang Kembali</h2>
            </div>
            @if($message=Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @endif
            <div class="kembali">
                <form name="kembali" method="POST" action="{{route('postKembali', ['id'=>$data->id])}}" id="flex">
                    @csrf
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Admin</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah Kembali</th>
                                <th>Jumlah Hilang</th>
                                <th>Jumlah Rusak</th>
                                <th>Maksimal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->admin}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>
                                    <div class="kembali">
                                        <label name="kembali">:</label>
                                        <input name="kembali" type="number" value="0" id="kembali" max="{{$data->sum}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="hilang">
                                        <label name="hilang">:</label>
                                        <input name="hilang" type="number" value="0"id="hilang" max="{{$data->sum}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="rusak">
                                        <label name="rusak">:</label>
                                        <input name="rusak" type="number" value="0"id="rusak" max="{{$data->sum}}">
                                    </div>
                                </td>
                                <td>{{$data->sum}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="inventories_id" value="{{$data->inventories_id}}">
                    <input class="btn btn-outline-secondary" type="submit" value="upload" id="btn">
                </form>
            </div>
        </div>
        <x-footer />
        <script>
            
            $('input[type=number]').on('keydown' , (event)=>{
                let key = event.key;
                let value = event.target.value;
                let new_value = Number(value + key);
                let max = Number(event.target.max);
                if(new_value > max){ event.preventDefault(); }
          });
        /*var numberList= document.querySelectorAll("#number-list");
        numberList.forEach(function(element,index){
            element.textContent=index+1;
        });*/
        </script>
    </body>
</html>