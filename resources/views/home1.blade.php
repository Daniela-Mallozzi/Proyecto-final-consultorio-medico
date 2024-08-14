@extends('layouts.panel')

@section('content')
    <div class="container card">
        <div class="card-body">
            <div class="btn-group-lg" role="group" aria-label="Button group">
                <span class="badge rounded-pill bg-primary"> Confirmada </span>
                <span class="badge rounded-pill bg-danger"> Cancelada </span>
                <span class="badge rounded-pill bg-success"> Completada </span>
                <span class="badge rounded-pill bg-warning"> Pendiente </span>
            </div>
            <hr>
            <div id="calendar"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/dist/locale/es.js') }}"></script>

    <script>
        var CalendarApp = function() {
            this.$body = $("body")
            this.$calendar = $('#calendar'),
                this.$event = ('#calendar-events div.calendar-events'),
                this.$categoryForm = $('#add-new-event form'),
                this.$extEvents = $('#calendar-events'),
                this.$modal = $('#my-event'),
                this.$saveCategoryBtn = $('.save-category'),
                this.$calendarObj = null
        };

        /* Initializing */
        CalendarApp.prototype.init = function() {
            var eventos = @json($eventos); // Convertir los eventos de PHP a JSON
            var $this = this;
            $this.$calendarObj = $this.$calendar.fullCalendar({
                defaultView: 'month',
                locale: 'es',
                handleWindowResize: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: eventos, // Pasar los eventos aquí
            });
        };

        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp



        //initializing CalendarApp
        $(window).on('load', function() {

            $.CalendarApp.init()
        });
    </script>
@endsection
