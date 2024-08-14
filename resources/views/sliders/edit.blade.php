@extends('layouts.panel')

@section('content')

    <div class="card shadow">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Editar slider</h3>
                <a href="{{ route('sliders.index') }}" class="btn btn-sm btn-danger">Regresar</a>
            </div>

            <hr>

            <form action="{{ route('sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="title">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" placeholder="Título">
                </div>

                <div class="form-group mb-2">
                    <label for="subtitle">Sub Título</label>
                    <input type="text" name="subtitle" class="form-control" placeholder="Sub Título" value="{{ old('subtitle', $slider->subtitle) }}">
                </div>

                <div class="form-group mb-2">
                    <label for="url">Url</label>
                    <input type="url" name="url" class="form-control" placeholder="URL"
                        value="{{ old('url', $slider->url) }}">
                </div>

                <div class="form-group mb-2">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" class="form-control" id="imageInput">

                    <img id="previewImage" src="{{ Storage::url($slider->image) }}" alt="Vista previa de la imagen" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-sm btn-primary">Modificar</button>
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
