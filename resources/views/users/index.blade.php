@extends('layouts.panel')

@section('content')

        <div class="card shadow">
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Usuarios</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Nuevo</a>
                </div>
                <hr>

                @livewire('admin.users-table')

            </div>
        </div>
    
@endsection
