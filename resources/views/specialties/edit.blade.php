@extends('layouts.panel')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Editor de Especialidades</h3>
            </div>

            <hr>

            <form action="{{ route('specialties.update', $specialty->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="name">Nombre de la especialidad</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $specialty->name) }}" required>
                    </div>
                    <div><br></div>
                    <div class="form-group col-md-12 mb-2">
                        <label for="description">Descripción</label>
                        <textarea id="description" class="form-control" name="description" rows="3" placeholder="Descripción breve de la especialidad">{{ old('description', $specialty->description) }}</textarea>
                    </div>
                    <div><br></div>
                    <div class="form-group mb-2">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" id="imageInput" class="form-control">

                        <img id="previewImage" src="{{ Storage::url($specialty->image) }}" alt="Vista previa de la imagen"
                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                    </div>

                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-md btn-primary">Guardar</button>
                    <div><br></div>                    
                    <button type="button" class="btn btn-md btn-danger"><a href="{{ route('specialties.index') }}" class="btn btn-sm btn-danger">Regresar</a></button>
                </div>
                <div>
                
                </div>
            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('dist/js/summernote-es-ES.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Descripción',
                lang: 'es-ES', // default: 'en-US'
                tabsize: 1,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

        })
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
