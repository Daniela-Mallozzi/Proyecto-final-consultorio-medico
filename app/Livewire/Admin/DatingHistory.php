<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class DatingHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
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
            ->where(function ($query) {
                // Aplicar búsqueda por paciente y especialidad
                $query->whereHas('patient', function ($subquery) {
                    $subquery->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('specialty', function ($subquery) {
                    $subquery->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('livewire.admin.dating-history', compact('oldAppointments', 'role'));
    }
}
