
<html lang=en>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <link href="/css/login.css" rel="stylesheet">
    </header>
    <body>
        @if($message=Session::get('error'))
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @endif
        <div class="global-container">
            <div id='login'>
                <div class="title-container">
                    <h2 class="card-title text-center">Login</h2>
                </div>
                <div class="navbar-brand text-center" id="logo">
                    <img src="{{asset('storage/images/smallLogo.jpg')}}" class="d-inline block align-top" height="170px">
                </div>
                <form name="login" method="POST" action="/login">
                    @csrf
                    @error('login')
                    <div class="alert alert-denger">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label" id="placeholder">Email</label>
                        <input id="email" class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="email">
                    </div>
                    @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>        
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" name="password" type="password" placeholder="password">
                    </div>
                    @error('password')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>        
                    </div>
                    @enderror
                    <div class="button">
                    <div class="login">
                        <button>Login</button>
                    </div>
                </form>
                <form method="get" action="/register">
                    <div class="register">
                        <button>Register</button>
                    </div>
                </form>
            </div>
        </div>
        <x-footer />
    </body>
</html>