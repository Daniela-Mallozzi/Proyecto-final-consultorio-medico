@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-body">
            
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Especialidades</h3>
                <a href="{{ route('specialties.create') }}" class="btn btn-lg btn-primary">Agregar</a>
            </div>
            <hr>
            
            @livewire('admin.specialties-table')

        </div>

    </div>
@endsection
