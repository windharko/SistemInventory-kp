<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Update Barang</title>

        <link href="/css/update.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="global-container">
            <div class="content">
                <div class="card-header py-3">
                    <h2 class="card-title text-center">Perbarui Data</h2>
                </div>
                <div class="card">
                    <div class="thumbnail">
                        <img src="{{asset('storage/images/'. $data->realName)}}" class="img-thumbnail">
                    </div>
                    <div class="card-text">
                        <form method="POST" action="{{route('postUpdate', ['id'=>$data->id])}}">
                            @csrf
                            <div class="mb-3">
                                <div class="col">Nama Barang</div>
                                <div class="col" >{{$data->name}}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Barang</label>
                                <div class="input">
                                    <input class="form-control" name="sum" type="number" placeholder="jumlah" id="num" value="{{$data->sum}}">
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn btn-outline-secondary">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </body>
</html>