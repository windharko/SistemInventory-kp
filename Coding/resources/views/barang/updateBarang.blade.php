<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Update Barang</title>

        <link href="/css/updateBarang.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="info">
            <div class="content">
                <div class='card-header py-3'>
                    <h2 class="card-title text-center">Update Barang</h2>
                </div>
                <div class="card-body">
                    <form name="update" method="POST" action="/updateBarang" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="photo">Foto Barang </label>
                            </div>
                            <div class="col-md-12" id="form">
                                <input name="photo" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Nama Barang </label>
                            </div>
                            <div class="col-md-12" id="form">
                                <input name="name" type="string" placeholder="name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="sum">Jumlah Barang </label> 
                            </div>
                            <div class="col-md-12" id="form">
                                <input name="sum" type="number" placeholder="sum" class="form-control">
                            </div>
                        </div>
                        <div class="container">
                            <input type="submit" name="upload" class="btn btn-outline-secondary" id="btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <x-footer />
    </body>
</html>