@extends('admin.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Editar Slide</h1>
            {{-- Paginação --}}
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('slider.index') }}">Slide</a></div>
                <div class="breadcrumb-item">Editar Slide</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="color: white">Editar Slide</h4>

                            <div class="card-header-action">
                                <a href="https://www.youtube.com/watch?v=Zvm0qnkhWuI&list=PLGFwuV_B-U2VO_jIb7wUV9gIqfPfuK1zY&index=19"
                                    class="btn btn-primary">Ajuda?</a>
                            </div>

                        </div>
                        <div class="card-body">

                            <form action="{{ route('slider.update', $slider->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title" style="color: white">Capa</label>
                                    <br>
                                    <img id="imagePreview" src="{{ asset($slider->banner) }}" alt="{{ $slider->title_one }}"
                                        class="img-fluid" title="banner" width="30%" height="auto">
                                </div>

                                <div class="form-group">
                                    <label for="title" style="color: white">Imagem(1300x500px)</label>
                                    <input type="file" name="banner" class="form-control" onchange="previewImage(this)">
                                </div>

                                <div class="form-group">
                                    <label for="title" style="color: white">Titulo 1</label>
                                    <input type="text" name="title_one" class="form-control" 
                                        value="{{ old('title_one', $slider->title_one) }}">
                                </div>

                                <div class="form-group">
                                    <label for="title" style="color: white">Titulo 2</label>
                                    <input type="text" name="title_two" class="form-control"
                                        value="{{ old('title_two', $slider->title_two) }}">
                                </div>

                                <div class="form-group">
                                    <label for="title" style="color: white">Valor</label>
                                    <input type="text" id="mascara_valor" name="starting_price" class="form-control"
                                        placeholder="Adicione o valor"
                                        value="{{ old('starting_price', $slider->starting_price) }}">
                                </div>

                                <div class="form-group">
                                    <label for="title" style="color: white">Link</label>
                                    <input type="url" name="link" class="form-control" placeholder="Adicione o link"
                                        value="{{ old('link', $slider->link) }}">
                                </div>

                                <div class="form-group">
                                    <label for="title" style="color: white">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $slider->status == 1 ? 'selected' : null }}>Ativo</option>
                                        <option value="0" {{ $slider->status == 0 ? 'selected' : null }}>Inativo
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title" style="color: white">Ordem</label>
                                    <input type="number" name="serial" class="form-control"
                                        placeholder="Adicione a ordem de exibição"
                                        value="{{ old('serial', $slider->serial) }}">
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
@section('js')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>
