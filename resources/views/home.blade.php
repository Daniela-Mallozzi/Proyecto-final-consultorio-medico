@extends('layouts.panel')

@section('content')
    <div class="row">
        <div class="card col-md-6">
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input class="form-control" id="startDate" type="date" value="{{ $start }}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input class="form-control" id="endDate" type="date" value="{{ $end }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="container-medico">

                </div>
            </div>
        </div>

        <div class="card col-md-6">
            <div class="card-body">
                <div id="container-citas">

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        Highcharts.chart('container-citas', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Citas registradas mensualmente'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Cantidad de citas'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Citas registradas',
                data: @json($counts),
                color: 'rgba(101, 40, 252, 0.7)' // Cambia el color de las barras aquí
            }]
        });
    </script>

    <script src="{{ asset('js/charts/doctors.js') }}"></script>
@endsection
