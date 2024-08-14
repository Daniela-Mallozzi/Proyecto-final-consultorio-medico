<?php

namespace App\Exports;

use App\Models\Appointment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CitasExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $role = auth()->user()->role;
        $oldAppointments = Appointment::whereIn('status', ['Atendida', 'Cancelada'])
            ->where(function ($query) use ($role) {
                if ($role == 'doctor') {
                    // Doctor
                    $query->where('doctor_id', auth()->id());
                } elseif ($role == 'paciente') {
                    // Pacientes
                    $query->where('patient_id', auth()->id());
                }
                // No hay condiciones adicionales para el administrador
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('reportes.reportecita', [
            'oldAppointments' => $oldAppointments
        ]);
    }
}
