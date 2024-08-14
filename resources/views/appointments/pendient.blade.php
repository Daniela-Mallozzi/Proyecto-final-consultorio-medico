@extends('layouts.panel')

@section('content')

        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0"> <i class='far fa-calendar-times' style='font-size:24px;color:dark'> Citas Pendientes</i></h3>
                    </div>                    
                </div>
            </div>

            <div class="card-body">

                @livewire('admin.pending-appointments')
                
            </div>

            <!-- //Quitar si estorba al tener citas pendientes -->
            <div class="text-center mt-5 mb-5">
            <a href="{{ url('/miscitas') }}" class="btn btn-sm btn-danger"><i class='fas fa-arrow-left'></i> Regresar</a>
            <br>
            </div>
        </div>
    
@endsection