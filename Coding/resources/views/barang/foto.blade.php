<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Deskripsi Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <link href="/css/foto.css" rel="stylesheet">
    </header>
    <body>
        <div class="content">
            <div class="card text-center">
                <div class="card-header">
                    <div class="thumbnail">
                        <img style="width:50%" src="{{asset('storage/images/'. $data->realName)}}" class="card-img-top">
                    </div>
                </div>
            </div>
            <a class="btn btn-outline-secondary" href="{{route('barang')}}">Cancel</a>
        </div>
    </body>
</html>