<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Barang Keluar</title>

        <link href="/css/barangKeluar.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    </head>
    <body>
        @include('additional.header')
        <div class="info">
            @if($message=Session::get('success'))
                <div class="alert alert-success" role="alert">
                {{$message}}
                </div>
            @endif
            @if(!empty($save))
                <div class="upper">
                    <div class="btn btn-outline-secondary" id="btn">
                        <a href="{{route('saving')}}">Simpan</a>
                    </div>
                </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Admin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forEach($save as $saves)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$saves->name}}</td>
                                <td>{{$saves->sum}}</td>
                                <td>{{$saves->admin}}</td>
                                <td>
                                    <form action="{{ route('saveHapus', ['id' => $saves->id]) }}" method="POST">
                                    @csrf
                                        <button type="submit" class="btn-close" aria-label="Close"></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $save->links() }}
            @elseif(empty($save))
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">NO DATA</h5>
                    <a href="{{route('keluar')}}" class="btn btn-outline-secondary">BACK</a>
                </div>
            </div>
            @endif
        </div>
        <x-footer />
    </body>
</html>