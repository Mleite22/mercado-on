<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <h1>Painel Administrador</h1>
            <p>Administrador(a): {{ Auth::user()->name }}</p>

            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Perfil') }}
            </x-dropdown-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Sair') }}
                </x-dropdown-link>
            </form>

        </div>
    </div>


</body>

</html>
