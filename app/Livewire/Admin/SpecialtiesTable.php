<?php

namespace App\Livewire\Admin;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialtiesTable extends Component
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
        $specialties = Specialty::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(12);
        return view('livewire.admin.specialties-table', compact('specialties'));
    }
}
