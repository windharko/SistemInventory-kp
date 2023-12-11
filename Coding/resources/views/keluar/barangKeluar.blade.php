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
            <div class="content">
                <div class="card-header py-3" >
                    <div class="btn" id="close">
                        <a href="{{route('keluar')}}" role="button" class="btn-close btn-close" aria-label="Close"></a>
                    </div>
                    <h2 class="card-title text-center">Barang Keluar</h2>
                </div>
                <div class="keluar">
                    <form id="theForm"><!--name="keluar" method="POST" action="route{{'scan'}}"-->
                        @csrf
                        <div class="row">
                            <input type="hidden" name="inventories_id" value="{{$data->id}}">
                            <div class="col-md-12">
                                <label for="admin">Nama Admin </label>
                            </div>
                            <div class="col-md-12" id="form">
                                <input name="admin" type="text" value="{{$admin}}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="label-name">
                                <label for="name">Nama Barang </label>
                            </div>
                            <div class="col-md-12" id="form">
                                <input name="name" type="text" value="{{$data->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="sum">Jumlah Barang </label>
                            </div>
                            <div class="col-md-12" id="form">
                                <input name="sum" type="number" placeholder="jumlah" id="num" class="form-control" value="0" max="{{$data->many}}">
                            </div>
                        </div>
                        <div class="container">
                            <button id="btn" type="button" class="btn btn-outline-secondary" onclick="submitForm('route1')">Scan</button>
                            <button id="btn" type="button" class="btn btn-outline-secondary" onclick="submitForm('route2')">Simpan</button>
                        </div>
                    </form>
                </div>
                @if(!empty($save))
                <div>
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
                                <td><a href="{{route('saveHapus', ['id'=>$saves->id])}}" role="button" class="btn-close" aria-label="Close"></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
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
        function submitForm(route) {
            // Get the form element
            const form = document.getElementById('theForm');

            // Set the appropriate form action based on the clicked button
            if (route === 'route1') {
                form.action = '/scanAgain';
                form.method = 'POST';
            } else if (route === 'route2') {
                form.action = '/firstSaved';
                form.method = 'POST';
            }

            // Submit the form
            form.submit();
        }
        </script>
    </body>
</html>