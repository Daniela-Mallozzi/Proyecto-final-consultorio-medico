<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $role = auth()->user()->role;
        if ($role == 'admin') {
            $monthCounts = Appointment::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(1) as count')
            )
                ->groupBy('month')
                ->get()
                ->toArray();
            $counts = array_fill(0, 12, 0);
            foreach ($monthCounts as $monthCount) {
                $index = $monthCount['month'] - 1;
                $counts[$index] = $monthCount['count'];
            }

            //NUEVO
            $now = Carbon::now();
            $end = $now->format('Y-m-d');
            $start = $now->format('Y-m-d');

            return view('home', compact('counts', 'end', 'start'));
        }

        $citas = Appointment::where(function ($query) use ($role) {
            if ($role == 'doctor') {
                $query->where('doctor_id', auth()->id());
            } else {
                $query->where('patient_id', auth()->id());
            }
        })->get();
        
        $eventos = [];
        foreach ($citas as $cita) {
            if ($cita->status == 'Cancelada') {
                $className = 'bg-danger';
            }else if($cita->status == 'Atendida'){
                $className = 'bg-success';
            }else if($cita->status == 'Reservada'){
                $className = 'bg-warning';
            }else{
                $className = 'bg-info';
            }
            $evento = [
                'title' => 'Cita ' . $cita->scheduled_time, // Título del evento
                'start' => $cita->scheduled_date, // Fecha de inicio del evento
                'end' => $cita->scheduled_date, // Fecha de fin del evento si tienes
                'className' => $className, // Clase CSS opcional para el evento
            ];
            array_push($eventos, $evento);
        }
        
        return view('home1', compact('eventos'));        
    }

    public function doctorsJson(Request $request)
    {

        $start = $request->input('start');
        $end = $request->input('end');

        $doctors = User::doctors()
            ->select('name')
            ->withCount([
                'confirmAppointments' => function ($query) use ($start, $end) {
                    $query->whereBetween('scheduled_date', [$start, $end]);
                },
                'attendedAppointments' => function ($query) use ($start, $end) {
                    $query->whereBetween('scheduled_date', [$start, $end]);
                },
                'cancellAppointments' => function ($query) use ($start, $end) {
                    $query->whereBetween('scheduled_date', [$start, $end]);
                }
            ])
            ->orderBy('attended_appointments_count', 'desc')
            ->take(5)
            ->get();

        $data = [];
        $data['categories'] = $doctors->pluck('name');

        $series = [];
        $series1['name'] = 'Citas Atendidas';
        $series1['data'] = $doctors->pluck('attended_appointments_count');
        $series2['name'] = 'Citas Canceladas';
        $series2['data'] = $doctors->pluck('cancell_appointments_count');
        $series3['name'] = 'Citas Confirmadas';
        $series3['data'] = $doctors->pluck('confirm_appointments_count');

        $series[] = $series1;
        $series[] = $series2;
        $series[] = $series3;
        $data['series'] = $series;

        return $data;
    }
}
