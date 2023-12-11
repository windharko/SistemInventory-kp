<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>laporan</title>

        <link href="/css/laporan.css" rel="stylesheet">
    </header>
    <body>
        @include('additional.header')
        <div class="info">
            <div class='card-header py-2'>
                <h2 class="card-title text-center">LAPORAN</h2>
            </div>
            <div class="button-container">
                <button class="btn show-all" id="showAll">All</button>
                <button class="btn show-content" id="showKembali">Laporan Kembali</button>
                <button class="btn show-content" id="showLuar">Laporan Barang Keluar</button>
                <button class="btn show-content" id="showHistory">Laporan History</button>
            </div>
            <div class="content-container">
                <div class="content">
                    <div class='card-header py-2'>
                        <h2 class="card-title" id="kembali">Barang Baru Kembali</h2>
                    </div>
                    @if($kembali->count() > 0)
                    <div class="upper">
                        <form name="laporanKembali" method="GET" action="{{route('laporanKembali')}}">
                            <input type="text" name="search_kembali" placeholder="cari tanggal" value="{{old('search_kembali')}}">
                            <button type="submit">Search</button>
                        </form>
                        @if(!empty($searchKembali))
                            <div class="btn btn-outline-secondary">
                                <a href="{{route('pdfKembali',['search_kembali'=>$searchKembali])}}">Cetak Laporan Kembali</a>
                            </div>
                        @else
                            <div class="btn btn-outline-secondary">
                                <a href="{{route('pdfKembali')}}">Cetak Laporan Kembali</a>
                            </div>
                        @endif
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Keluar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Kembali</th>
                                <th>Hilang</th>
                                <th>Rusak</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forEach($kembali as $kembalis)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kembalis->tanggalKeluar}}</td>
                                <td>{{$kembalis->name}}</td>
                                <td>{{$kembalis->sum}}</td>
                                <td>{{$kembalis->kembali}}</td>
                                <td>{{$kembalis->hilang}}</td>
                                <td>{{$kembalis->rusak}}</td>
                                <td>{{$kembalis->admin}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="upper">
                        <form name="laporanKembali" method="GET" action="{{route('laporanKembali')}}">
                            <input type="text" name="search_kembali" placeholder="cari tanggal" value="{{old('search_kembali')}}">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">NO DATA</h5>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="content">
                    <div class='card-header py-2'>
                        <h2 class="card-title">Barang diluar</h2>
                    </div>
                    @if($luar->count() > 0)
                    <div class="upper">
                        <form name="laporanKeluar" method="GET" action="{{route('laporanKeluar')}}">
                                <input type="text" name="search_keluar" placeholder="cari tanggal">
                                <button type="submit">Search</button>
                        </form>
                        @if(!empty($searchQuery))
                            <div class="btn btn-outline-secondary">
                                <a href="{{route('pdfKeluar',['search_keluar'=>$searchKeluar])}}">Cetak Laporan Keluar</a>
                            </div>
                        @else
                            <div class="btn btn-outline-secondary">
                                <a href="{{route('pdfKeluar')}}">Cetak Laporan Keluar</a>
                            </div>
                        @endif
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($luar as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->sum}}</td>
                                <td>{{$data->admin}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="upper">
                        <form name="laporanKeluar" method="GET" action="{{route('laporanKeluar')}}">
                                <input type="text" name="search_keluar" placeholder="cari tanggal">
                                <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">NO DATA</h5>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="content">
                    <div class='card-header py-2'>
                        <h2 class="card-title" id="history">History</h2>
                    </div>
                    @if($history->count() > 0)
                    <div class="upper">
                        <form name="laporanHistory" method="GET" action="{{route('laporanHistory')}}">
                            <input type="text" name="search_history" placeholder="Masuk Tanggal" value="{{old('search_history')}}">
                            <button type="submit">Search</button>
                        </form>
                        @if(!empty($searchHistory))
                            <div class="btn btn-outline-secondary">
                                <a href="{{route('pdfHistory',['search_history'=>$searchHistory])}}">Cetak Laporan History</a>
                            </div>
                        @else
                            <div class="btn btn-outline-secondary">
                                <a href="{{route('pdfHistory')}}" >Cetak Laporan History</a>
                            </div>
                        @endif
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Keluar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forEach($history as $histories)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$histories->tanggalKeluar}}</td>
                                <td>{{$histories->name}}</td>
                                <td>{{$histories->sum}}</td>
                                <td>{{$histories->admin}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="upper">
                        <form name="laporanKeluar" method="GET" action="{{route('laporanKeluar')}}">
                                <input type="text" name="search_keluar" placeholder="cari tanggal">
                                <button type="submit">Search</button>
                        </form>
                    </div>
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
        <script>
        var numberList= document.querySelectorAll("#number-list");
        numberList.forEach(function(element,index){
            element.textContent=index+1;
        });

        document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".btn.show-content");
        const contents = document.querySelectorAll(".content");
        const showAllButton = document.querySelector(".btn.show-all");

        buttons.forEach((button, index) => {
            button.addEventListener("click", function() {
                hideAllContents();
                contents[index].style.display = "block";
                setActiveButton(buttons, button);
            });
        });

        showAllButton.addEventListener("click", function() {
            contents.forEach(content => {
                content.style.display = "block";
            });
            setActiveButton(buttons, null);
        });

        function hideAllContents() {
            contents.forEach(content => {
                content.style.display = "none";
            });
        }
        });
        function setActiveButton(buttons, activeButton) {
            buttons.forEach(button => {
                button.classList.remove("active");
            });
            if (activeButton !== null) {
                activeButton.classList.add("active");
            }
        }

        function resetActiveButtons() {
            buttons.forEach(button => {
                button.classList.remove("active");
            });
        }

        </script>
    </body>
</html>