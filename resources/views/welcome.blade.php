@extends('layout')
@section('content')
<div class="row justify-content-between">
    @if(session('success'))
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Success!</h4>
        <p class="mb-0">Nova imagem adicionada com sucesso!</p>
    </div>
    @endif
    <div class="col-md-5">
        <h3>Adicionar Imagem</h3>
        <form action="/add-image" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="mt-4">Título da Imagem:</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror "
                    name="title"
                    placeholder="Insira o nome do produto"
                >
                <span class="text-danger">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="files" class="form-label mt-4">Upload da imagem:</label>
                <input
                    type="file"
                    name="images[]"
                    id=""
                    class="form-control"
                    accept="image/*"
                    multiple
                >
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Salvar imagem</button>
            </div>


        </form>
    </div>
</div>

@endsection
