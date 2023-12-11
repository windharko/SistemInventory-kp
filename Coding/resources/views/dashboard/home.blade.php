<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>home</title>

        <link href="/css/home.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="info">
            @if(!empty($barang))
            <div class="barang">
                <div class='card-header py-2'>
                    <h2 class="card-title text-center">Barang Tersisa</h2>
                </div>
                @if($message=Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @endif
                <form name="cariBarang" method="GET" action="{{route('cariStock')}}" class="search">
                    <input type="search" name="cariBarang" placeholder="cari barang">
                    <button type="submit">Search</button>
                </form>
                <div class="overflow-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="background-color: aliceblue;">No</th>
                                <th style="background-color: aliceblue;">Nama Barang</th>
                                <th style="background-color: aliceblue;">Jumlah</th>
                                <th style="background-color: aliceblue;">Sisa</th>
                                <th style="background-color: aliceblue;">Hilang</th>
                                <th style="background-color: aliceblue;">Rusak</th>
                                <th style="background-color: aliceblue;">Barang diluar</th>
                                <th style="background-color: aliceblue;">Barang discanner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->sum}}</td>
                                <td>{{$item->many}}</td>
                                <td>{{$item->hilang}}</td>
                                <td>{{$item->rusak}}</td>
                                <td>{{$item->out}}</td>
                                <td>{{$item->save}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $barang->links() }}
            </div>
            @elseif(empty($save))
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">NO DATA</h5>
                </div>
            </div>
            @endif
        </div>
        <x-footer />
    </body>
</html>