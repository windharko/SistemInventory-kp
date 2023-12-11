<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Update Barang</title>

        <link href="/css/hapus.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="global-container">
            <div class="content">
                <div class="card-header py-3">
                    <h2 class="card-title text-center">Hapus Data</h2>
                </div>
                <div class="flex">
                    <div class="main-content">
                        <div class="thumbnail">
                            <img src="{{asset('storage/images/'. $data->realName)}}" class="img-thumbnail">
                        </div>
                        <div class="form">
                            <form method="POST" action="{{route('postHapus', ['id'=>$data->id])}}">
                                @csrf
                                <div class="mb-3">
                                    <div class="col">Nama Barang</div>
                                    <div class="col" >{{$data->name}}</div>
                                </div>
                                <div class="mb-3">
                                    <div class="col">Jumlah Barang</div>
                                    <div class="col">{{$data->sum}}</div>
                                </div>
                                <div class="button">
                                    <button class="btn btn-outline-secondary">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </body>
</html>