{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="pt-BR">

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

<body style="background: #8430a5">
    <div id="app">
        <section class="section" style="box-shadow: #31123f">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('backend/assets/img/logo-market.png') }}" alt="logo-Bacalhau"
                                width="100" style="width: 70%; height: auto; box-shadow: none; border: none">
                        </div>

                        <div class="card card-primary" style="background: #5c2274; color: #ffffff; border: none">
                            <div class="card-header">
                                <h4>Recuperar Senha</h4>
                            </div>
                            <br>

                            @if (session('status'))
                                <p class="alert alert-warning">
                                    Enviamos por email seu link de redefinição de senha
                                </p>
                            @endif

                            <div class="card-body">

                                <form action="{{ route('password.email') }}" class="needs-validation" method="post"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">

                                        <input id="email" type="email" class="form-control" name="email"
                                            placeholder="Email de Acesso" tabindex="1" value="{{ old('email') }}"
                                            required autofocus>

                                        @if ($errors->get('email'))
                                            <code>{{ $errors->first('email') }}</code>
                                        @endif
                                        
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"
                                            style="background: #f4bb35; color: #000000">
                                            Recuperar
                                        </button>
                                    </div>

                                    <div style="text-align: center"><a href="{{ route('admin.login') }}"
                                            title="Voltar ao login" style="color: #ffffff">
                                            Voltar ao login
                                        </a></div>
                                </form>
                            </div>
                        </div>
                        {{-- Fim RECUPERAR SENHA --}}
                        <div class="mt-5 text-muted text-center" style="color: #fff">
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
