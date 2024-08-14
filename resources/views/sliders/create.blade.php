@extends('layouts.panel')

@section('content')
    <div class="card shadow">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Nuevo slider</h3>
                <a href="{{ route('sliders.index') }}" class="btn btn-sm btn-danger">Regresar</a>
            </div>

            <hr>

            <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="title">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                        placeholder="Título">
                </div>

                <div class="form-group mb-2">
                    <label for="subtitle">Sub Título</label>
                    <input type="text" name="subtitle" class="form-control" placeholder="Sub Título"
                        value="{{ old('subtitle') }}">
                </div>

                <div class="form-group mb-2">
                    <label for="url">Url</label>
                    <input type="url" name="url" class="form-control" placeholder="URL"
                        value="{{ old('url') }}">
                </div>

                <div class="form-group mb-2">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" class="form-control" id="imageInput">                 
                    <img id="previewImage" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-sm btn-primary">Crear</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('imageInput').onchange = function(evt) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('previewImage').style.display = 'block';
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection
