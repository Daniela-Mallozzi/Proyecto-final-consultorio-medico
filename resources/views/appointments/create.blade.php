<?php
    use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card">

        <div class="card-body">

            <form action="{{ route('miscitas.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <label for="specialty">Especialidades Disponibles</label>
                        <select name="specialty_id" id="specialty" class="form-control"><br>
                            <option value="" selected>Seleccionar Especialidad</option>
                            <br>    
                            @foreach ($specialties as $especialidad)
                                <option value="{{ $especialidad->id }}"
                                    @if(old('specialty_id') == $especialidad->id) selected @endif>
                                    {{ $especialidad->name }}</option>
                            @endforeach
                        </select><div><br></div>
                    </div>
                    <br>
                    <div class="form-group col-md-12 mb-20">
                        <label for="doctor">Médicos Certificados</label><br>
                        <select name="doctor_id" id="doctor" class="form-control" required>
                            @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}"
                                @if(old('doctor_id') == $doctor->id) selected @endif>
                                {{ $doctor->name }}</option>
                            @endforeach  
                        </select>
                    </div> 
                    <br><div><br></div>
                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="form-group col-md-12 mb-10">
                        <label for="date">Selecciona la fecha </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            <input class="form-control"
                            id="date" min="{{date('Y-m-d')}}" name="scheduled_date"
                            type="date" value="{{ old('scheduled_date', date('Y-m-d')) }}">
                        </div>
                    </div>

                    <div class="form-group col-md-12 mb-6">
                        <div><br></div>
                        <label>Tipo de Servicio</label>
                        <div class="custom-control custom-radio mt-3 mb-3">
                            <input type="radio" id="type1" name="type" class="custom-control-input" 
                            @if(old('type') == 'Consulta') checked @endif value="Consulta">
                            <label class="custom-control-label" for="type1">Consulta</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="type2" name="type" class="custom-control-input"
                            @if(old('type') == 'Examen') checked @endif value="Examen">
                            <label class="custom-control-label" for="type2">Examen</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="type3" name="type" class="custom-control-input" 
                            @if(old('type') == 'Operación') checked @endif value="Operación">
                            <label class="custom-control-label" for="type3">Operación</label>
                        </div>
                    </div>
    
                    <div class="form-group col-md-12 mb-2">
                        <label for="description">Nota:</label>
                        <textarea name="description" id="description" type="text" class="form-control"
                        rows="5" placeholder="Agrega una descripción opcional de tu síntoma..." required></textarea>
                    </div>

                    <div class="form-group col-md-16 mb-2">
                        <label for="hours">Horario de atención</label>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h4 class="m-3" id="titleMorning"></h4>
                                    <div id="hoursMorning">
                                        @if($intervals)
                                            <h4 class="m-3 text-primary">Por la mañana</h4>
                                            @foreach ($intervals['morning'] as $key => $interval)
                                                <div class="custom-control custom-radio mb-3">
                                                <input type="radio" id="intervalMorning{{ $key }}" name="scheduled_time" value="{{ $interval['start'] }}" class="custom-control-input">
                                                <label class="custom-control-label" for="intervalMorning{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }}</label>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-info" role="alert">
                                                Selecciona un médico y una fecha, para ver sus horarios.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <h4 class="m-3" id="titleAfternoon"></h4>
                                    <div id="hoursAfternoon">
                                        @if($intervals)
                                            <h4 class="m-3 text-primary">Por la tarde</h4>
                                            @foreach ($intervals['afternoon'] as $key => $interval)
                                                <div class="custom-control custom-radio mb-3">
                                                <input type="radio" id="intervalAfternoon{{ $key }}" name="scheduled_time" value="{{ $interval['start'] }}" class="custom-control-input">
                                                <label class="custom-control-label" for="intervalAfternoon{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }}</label>
                                                </div>
                                            @endforeach
                                        @endif 
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                    </div>

                </div>
                
            </form>
        </div>

    </div>

@endsection

@section('scripts')

<script src="{{ asset('js/appointments/create.js') }}" ></script>

@endsection