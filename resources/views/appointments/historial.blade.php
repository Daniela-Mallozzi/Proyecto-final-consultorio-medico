@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                <h3 class="mb-0"> <i class='far fa-clock' style='font-size:24px;color:dark'> Historial de Citas</i></h3>
                </div>
                <div>
                    <a class="btn btn-danger btn-sm" target="_blank" href="{{ route('reporte.citas.generarPdf') }}">PDF</a>
                    <a class="btn btn-success btn-sm" href="{{ route('reporte.citas.generarExcel') }}">Excel</a>
                </div>
            </div>

            @livewire('admin.dating-history')

        </div>

         <!-- //Quitar si estorba al tener citas pendientes -->
         <div class="text-center mt-5 mb-5">
            <a href="{{ url('/miscitas') }}" class="btn btn-sm btn-danger"><i class='fas fa-arrow-left'></i> Regresar</a>
            <br>
            </div>
    </div>
@endsection
