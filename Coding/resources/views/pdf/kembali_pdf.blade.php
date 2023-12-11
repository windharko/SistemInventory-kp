<html lang=en>
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </header>
    <body>
        <div class="content">
            <div class='card-header py-2'>
                <h2 class="card-title text-center">Barang Baru Kembali</h2>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="border-width: 1.75px;">No</th>
                        <th style="border-width: 1.75px;">Tanggal Keluar</th>
                        <th style="border-width: 1.75px;">Nama Barang</th>
                        <th style="border-width: 1.75px;">Jumlah</th>
                        <th style="border-width: 1.75px;">Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @forEach($kembali as $kembalis)
                    <tr>
                        <td style="border-width: 1.75px;">{{$loop->iteration}}</td>
                        <td style="border-width: 1.75px;">{{$kembalis->created_at}}</td>
                        <td style="border-width: 1.75px;">{{$kembalis->name}}</td>
                        <td style="border-width: 1.75px;">{{$kembalis->sum}}</td>
                        <td style="border-width: 1.75px;">{{$kembalis->admin}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>