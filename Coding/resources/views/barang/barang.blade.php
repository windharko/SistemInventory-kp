<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Daftar Barang</title>

        <link href="/css/barang.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="info" data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="0" tabindex="0">
            <div class="card-header py-3">
                    <h2 class="card-title text-center">Daftar Barang</h2>
            </div>
            @if($message=Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @endif
            @if($message=Session::get('success'))
                <div class="alert alert-success" role="alert">
                        {{$message}}
                </div>
            @endif
            <div class="upper">
                <div class="btn btn-outline-secondary">
                    <a href="{{route('updateBarang')}}">Update Barang</a>
                </div>
                <form name="cariBarang" method="GET" action="{{route('cariBarang')}}" class="search">
                    <input type="search" name="cariBarang" placeholder="cari barang">
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
                            <th>photo</th>
                            <th>QR</th>
                            <th>Perbarui</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <th>{{$item->name}}</th>
                            <th>{{$item->sum}}</th>
                            <th style="width: 300px;">
                                <div class="thumbnail" id="img">
                                    <a href="{{route('foto', ['id'=>$item->id])}}" class="btn" id="btn">
                                        <img src="{{asset('storage/images/'. $item->realName)}}" class="img-thumbnail">
                                    </a>
                                </div>
                            </th>
                            <th style="width: 150px;">
                                <div class="thumbnail" id="print">
                                    <a href="{{route('printQR', ['id'=>$item->id])}}" class="btn" id="btn">
                                        <img src="{{ asset('storage/qr/' . $item->name . '.png') }}" class="img-thumbnail" id="img">
                                    </a>
                                </div>
                            </th>
                            <th>
                                <a class="btn btn-outline-secondary" href="{{route('update', ['id'=>$item->id])}}">Perbarui Data</a>
                            </th>
                            <th>
                                <a class="btn btn-outline-secondary" href="{{route('hapus', ['id'=>$item->id])}}">Hapus</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

        const printBtn= document.getElementById('btn');

        </script>
    </body>
</html>