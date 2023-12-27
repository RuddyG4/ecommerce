<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/my-login.css') }}">
</head>

<body class="login">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <div class="offcanvas__logo bg-white px-10 py-4 rounded">
                            <a href="/store"><img src="assets/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Iniciar Sesión</h4>
                            @error('failedAuth')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Usuario o correo</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    @error('password')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Iniciar Sesión
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2023 &mdash; Sastreria Maya
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>