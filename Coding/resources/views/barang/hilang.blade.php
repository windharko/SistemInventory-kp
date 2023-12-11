<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Barang Hilang</title>

        <link href="/css/hilang.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="content">
            <div class='card-header py-3'>
                <h2>Barang Keluar</h2>
            </div>
            <div class='hilang'>
                <form name="hilang" method="POST" action="{{route('postHilang', ['id'=>$data->id])}}">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Admin</th>
                            <th>Tanggal Keluar</th>
                            <th>Jumlah yang hilang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->admin}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>
                                @csrf
                                <div class="sum">
                                    <label name="sum">:</label>
                                    <input name="sum" type="number" placeholder="jumlah" id="num">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="upload">
                </form>
            </div>
        </div>
        <x-footer />
        <script>
        /*var numberList= document.querySelectorAll("#number-list");
        numberList.forEach(function(element,index){
            element.textContent=index+1;
        });*/
        </script>
    </body>
</html>