<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Scanner</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <link href="/css/scan.css" rel="stylesheet">
    </header>
    <body>
        @if($message=Session::get('error'))
            <div class="alert alert-danger" role="alert">
              {{$message}}
            </div>
        @endif
        <div class="ocrloader">
            <p>Scanning</p>
            <em></em>
          <span></span>
        </div>
        <div class="container col-lg-4 py-5">
            <div class="card bg-white shadow rounded-3 p-3 border-0">
                <form name="scanner" method="POST" action="{{route('postscan')}}">
                    @csrf
                    <input name="qr_code" type="text" autofocus>
                    <input type="submit" value="cari" class="btn btn-outline-secondary">
                    <div class="btn btn-outline-secondary" id="btn">
                    <a href="{{route('keluar')}}">Tutup</a>
                    </div>
                </form>
            </div>
        </div>
    <script>
        /*let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });*/
    </script>
    </body>
</html>
