<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Painel de Controle do Administrador</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section  >
            <div class="container mt-1">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        
                        {{-- LOGO --}}
                        <div class="login-brand">
                            <img src="{{ asset('backend/assets/img/logo-market.png') }}" alt="logo-Bacalhau"
                                width="100" style="width: 70%; height: auto; box-shadow: none; border: none">
                        </div>

                        
                        <div class="card card-primary" style="color: #ffffff; border: none">
                            <div class="card-header">
                                <h4>Acesso Administrativo</h4>
                            </div>

                            <div class="card-body">
                                
                                <form action="{{ route('login') }}" class="needs-validation" method="post"
                                    novalidate="">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" name="email"
                                            placeholder="Email de Acesso" tabindex="1" value="{{ old('email') }}"
                                            required autofocus
                                        >

                                        @if ($errors->has('email'))
                                            <code>{{ $errors->first('email') }}</code>
                                        @endif

                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <div class="d-block">

                                            <input id="password" type="password" class="form-control" name="password"
                                                placeholder="Senha de Acesso" tabindex="2"
                                                value="{{ old('password') }}" required
                                            >
                                            @if ($errors->has('password'))
                                                <code>{{ $errors->first('password') }}</code>
                                            @endif

                                            <!-- Remember Me -->
                                            <div class="float-right">
                                                @if (Route::has('admin.forgot'))
                                                    <a href="{{ route('admin.forgot') }}" class="text-small"
                                                        style="color: #ffffff">
                                                        Esqueceu sua senha?
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Lembrar senha</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"
                                            style="background: #f4bb35; color: #000000">
                                            Entrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- footer --}}
                        <div class="mt-1 text-muted text-center" style="color: #fff">
                            Criado por <a href="https//mldesigner.com.br" style="color: #fff">MLDesigner</a>
                        </div>

                        <div class="simple-footer" style="color: #fff">
                            Todos os direitos Reservados &copy; <?= date('Y') ?> MLDesigner
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
</body>

</html>
