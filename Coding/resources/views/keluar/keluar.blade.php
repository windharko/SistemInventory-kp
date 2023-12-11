<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Barang keluar</title>

        <link href="/css/keluar.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="info">
            <div class="card-header py-3">
                    <h2 class="card-title text-center">Daftar Barang yang sedang diluar</h2>
            </div>
            @if($message=Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @endif
            <div class="upper">
                <div>
                    <div class="btn btn-outline-secondary" id="btn">
                        <a href="{{route('scan')}}">Scan Barang</a>
                    </div>
                    <div class="btn btn-outline-secondary" id="btn">
                        <a href="{{route('saved')}}">Data Tersimpan</a>
                    </div>
                </div>
                <form name="cariKeluar" method="GET" action="{{route('cariKeluar')}}" class="search">
                    <input type="search" name="cariKeluar" placeholder="cari barang Keluar">
                    <button type="submit">Search</button>
                </form>
            </div>
            @if(!empty($data))
            <div class="overflow-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Admin</th>
                            <th>Pengembalian</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <th>{{$item->name}}</th>
                            <th>{{$item->sum}}</th>
                            <th>{{$item->admin}}</th>
                            <th>
                                <a class="btn btn-outline-secondary" href="{{route('kembali', ['id'=>$item->id])}}">Barang Kembali</a>
                            </th>
                            <th>{{$item->created_at}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
            @else
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">NO DATA</h5>
                </div>
            </div>
            @endif
        </div>
        <x-footer />
        <script>
        var numberList= document.querySelectorAll("#number-list");
        numberList.forEach(function(element,index){
            element.textContent=index+1;
        });
        </script>
    </body>
</html>