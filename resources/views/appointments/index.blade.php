@extends('layouts.panel')

@section('content')

        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                    <h3 class="mb-0"> <i class='far fa-address-book' style='font-size:24px;color:dark'> Mis Citas</i></h3>
                    <p> Aquí aparecerán tus citas, conforme los usuarios vayan solicitando.</p>
                    </div>                    
                </div>
            </div>
            <div class="card-body">

                {{-- <div class="btn-group mb-3" role="group" aria-label="Button group">
                    <span class="badge bg-success">Atender</span>
                    <span class="badge bg-danger">Cancelar</span>
                    <span class="badge bg-primary">Ver</span>
                </div> --}}


                @livewire('admin.my-dates')
                
            </div>

<!-- //Quitar si estorba al tener citas pendientes -->
<div class="text-center mt-5 mb-5">
            <a href="{{ url('/home') }}" class="btn btn-sm btn-danger"><i class='fas fa-arrow-left'></i> Regresar</a>
            <br>
            </div>

        </div>
    
@endsection