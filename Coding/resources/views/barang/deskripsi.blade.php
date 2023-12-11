<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Deskripsi Barang</title>

        <link href="/css/deskripsi.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="content">
            <div class="card text-center" style="width: 25rem;" id="sidebar">
                <div class="card-header">
                    <div class="thumbnail">
                        <img src="{{asset('storage/images/'. $data->realName)}}" class="card-img-top">
                    </div>
                </div>
                <div class="card-body-md">
                    <h3 class="card-title">{{$data->name}}</h3>
                    <div class="card-text"><h6>Jumlah : {{$data->sum}}</h6></div>
                    <div class="card-text"><h6>Sisa : {{$data->many}}</h6></div>
                    <div class="card-text"><h6>Diluar : {{$data->out}}</h6></div>
                    <div class="card-text"><h6>Hilang : {{$data->hilang}}</h6></div>
                    <div class="card-text"><h6>Rusak : {{$data->rusak}}</h6></div>
                    <div class="card-text"><h6>Tersimpan : {{$data->save}}</h6></div>
                </div>
            </div>
            <div class="card" id="right">
                <div class="card" id="diluar">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Diluar</h5>
                    </div>
                    @if($out->count() > 0)
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
                                @foreach ($out as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->sum}}</td>
                                    <td>{{$item->admin}}</td>
                                    <td>
                                        <a class="btn btn-outline-secondary" href="{{route('kembali', ['id'=>$item->id])}}">Barang Kembali</a>
                                    </td>
                                    <td>{{$item->created_at}}</td>
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
                <div class="card" id="history">
                    <div class="card-header">
                        <h5 class="card-title">Daftar History</h5>
                    </div>
                    @if($history->count() > 0)
                    <div class="overflow-auto">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Admin</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->sum}}</td>
                                    <td>{{$item->admin}}</td>
                                    <td>{{$item->created_at}}</td>
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
            </div>
        </div>
        <x-footer />
    </body>
</html>