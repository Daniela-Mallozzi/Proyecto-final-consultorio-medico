<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CitasExport;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function generarPdf()
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

        $pdf = PDF::loadView('reportes.reportecita', compact('oldAppointments'));

        return $pdf->stream('reporte_citas.pdf');
    }

    public function generarExcel()
    {
        return Excel::download(new CitasExport, 'reporte_citas.xlsx');
    }
}
