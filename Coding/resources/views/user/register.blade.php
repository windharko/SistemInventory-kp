<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>register</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <link href="/css/register.css" rel="stylesheet">

    </header>
    <body>
        <div class="global-container">
            <div id="register">
                <div class="title-container">
                    <h2 class="card-title text-center">Register</h2>
                </div>
                <div class="navbar-brand text-center" id="logo">
                    <img src="{{asset('storage/images/smallLogo.jpg')}}" class="d-inline block align-top" height="200px">
                </div>
            <form method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" name="name" value="{{ old('name') }}" type="text" placeholder="name">
                    @error('name')
                    <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>        
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email" value="{{old('email')}}" type="text" placeholder="email">
                    @error('email')
                    <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>        
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" name="password" type="password" placeholder="password">
                    @error('password')
                    <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>        
                    </div>
                    @enderror
                </div>
                <div class="button">
                    <button>register</button>
                </div>
            </form>
            </div>
        </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            @if(Session('message'))
            <div class="alert">
            <strong>{{ Session('message') }}</strong>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
            <x-footer />
        <script>
            setTimeout(function() {
                        document.querySelector('.alert').style.display = 'none';
                        document.querySelector('invalid-feedback').style.display='none'
                    }, 5000);
        </script>
    </body>
</html>