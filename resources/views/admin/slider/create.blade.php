@extends('admin.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Cadastrar Novo Slide</h1>
      {{-- Paginação --}}
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div> 
        <div class="breadcrumb-item active"><a href="{{ route('slider.index') }}">Slide</a></div>        
        <div class="breadcrumb-item">Cadastro</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 style="color: white">Criar Slide</h4>
 
              <div class="card-header-action">
                <a href="https://www.youtube.com/watch?v=Zvm0qnkhWuI&list=PLGFwuV_B-U2VO_jIb7wUV9gIqfPfuK1zY&index=19" class="btn btn-primary">Ajuda?</a>
              </div>

            </div>
            <div class="card-body">

              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title" style="color: white">Imagem(1300x500px)</label>
                  <input type="file" name="" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="title" style="color: white">Titulo 1</label>
                  <input type="text" name="" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="title" style="color: white">Titulo 2</label>
                  <input type="text" name="" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="title" style="color: white">Valor</label>
                  <input type="text" name="" class="form-control" placeholder="Adicione o valor">
                </div>
                
                <div class="form-group">
                  <label for="title" style="color: white">Link</label>
                  <input type="url" name="" class="form-control" placeholder="Adicione o link">
                </div>
                
                <div class="form-group">
                  <label for="title" style="color: white">Status</label>
                  <select name="" class="form-control">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="title" style="color: white">Ordem</label>
                  <input type="number" name="" class="form-control" placeholder="Adicione a ordem de exibição">
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>

              </form>

            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection