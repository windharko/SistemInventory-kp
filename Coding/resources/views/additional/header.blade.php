<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link href="/css/header.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</header>
<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
    <div class="navbar-brand" id="navbar">
        <img src="{{asset('storage/images/GDM Logo.png')}}" class="d-inline block align-top" height="56px">
    </div>
    <div class="container-fluid">
        <div class='collapse navbar-collapse' id="navbar-nav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="{{route('home')}}" class="nav-link active">
                        Home
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{route('cariScan')}}" class="nav-link active">
                        Cari Barang
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{route('keluar')}}" class="nav-link active">
                        Barang Keluar
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{route('barang')}}" class="nav-link active">
                        Barang
                    </a>
                <li class="nav-item active">
                    <a href="{{route('laporan')}}" class="nav-link active">
                        Laporan
                    </a>
                </li>
            </ul>
        </div>    
        <div class="btn">
            <a href="{{route('logout')}}" role="button" class="btn-close btn-close-white" aria-label="Close"></a>
        </div>
    </div>
</nav>
