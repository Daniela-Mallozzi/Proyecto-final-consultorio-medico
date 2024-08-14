@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-body">
            
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Slider</h3>
                <a href="{{ route('sliders.create') }}" class="btn btn-sm btn-primary">Nueva</a>
            </div>
            <hr>
            
            <div class="table-responsive">
                <table class="table align-items-center" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Subtítulo</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <th scope="row">
                                    {{ $slider->title }}
                                </th>
                                <td>
                                    {{ $slider->subtitle }}
                                </td>
                                <td>
                                    <img src="{{ Storage::url($slider->image) }}" width="50" alt="{{ $slider->title }}">
                                </td>
                                <td>
                                    <a href="{{ route('sliders.edit', $slider) }}"
                                        class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
        
                                    <a href="{{ route('sliders.destroy', $slider) }}"
                                        class="btn btn-sm btn-danger delete-item"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>      
        </div>

    </div>
@endsection
