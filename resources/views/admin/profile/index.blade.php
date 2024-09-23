{{-- Chama tudo que está no master com extends --}}
@extends('admin.layout.master')

@section('content')
    {{-- Conteúdo --}}
<section class="section">
<div class="section-header">
<h1>Meus Dados</h1>
<div class="section-header-breadcrumb">
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
<div class="breadcrumb-item">Perfil do Usuario</div>
</div>
</div>
<div class="section-body">

<div class="row mt-sm-4">
{{-- INICIO BLOCO 1 --}}
<div class="col-12 col-md-12 col-lg-7">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <form action="{{ route('admin.profile.uptade') }}" method="post" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Editar Perfil</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">

                                        <div class="mb-3">
                                            
                                            @if (Auth::user()->image !=null)
                                            <img src="{{ asset(Auth::user()->image) }}"
                                                alt="{{ Auth::user()->name }}" class="img-thumbnail" title="{{ Auth::user()->name }}"
                                                style="width: 80px; height: auto; object-fit: cover; border-radius: 50%">
                                                
                                                @else
                                                <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                                                    alt="{{ Auth::user()->name }}" class="img-thumbnail" title="{{ Auth::user()->name }}"
                                                    style="width: 80px; height: auto; object-fit: cover; border-radius: 50%">
                                                
                                            @endif
                                        </div>

                                        <label>Foto de Perfil</label>
                                        <input type="file" class="form-control" name="image">

                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}" required="">

                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}" required="">

                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
</div>
{{-- FIM BLOCO 1 --}}

{{-- INICIO BLOCO 2 --}}
<div class="col-12 col-md-12 col-lg-7">

@if ($errors->any())
@foreach ($errors->all(); as $errors)
<div class="alert alert-danger show fade"> {{ $errors }}</div>   
@endforeach
@endif   

@if (session('successSenha'))
<div class="alert alert-success alert-dismissible show fade"> {{ session('successSenha') }}</div>
@endif

<div class="card">

<form action="{{ route('admin.profile.password') }}" method="post" class="needs-validation"
novalidate="" enctype="multipart/form-data">
@csrf
<div class="card-header">
<h4>Editar Senha</h4>
</div>
<div class="card-body">
<div class="row">

<div class="form-group col-12">
<label>Senha Atual</label>
<input type="password" class="form-control" name="current_password" placeholder="Digite sua senha atual">
</div>

<div class="form-group col-12">
<label>Nova Senha</label>
<input type="password" class="form-control" name="password" placeholder="Digite sua nova senha de no minimo 8 digitos">
</div>

<div class="form-group col-12">
<label>Confirmar Senha</label>
<input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha">
</div>

</div>

</div>

<div class="card-footer text-right">
<button class="btn btn-primary">Salvar</button>
</div>

</form>
</div>
</div>
{{-- FIM BLOCO 2 --}}
</div>
</div>
</section>
@endsection
