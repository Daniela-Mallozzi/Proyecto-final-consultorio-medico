<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DoctorsTable extends Component
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
        $doctors = User::doctors()->where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(12);
        return view('livewire.admin.doctors-table', compact('doctors'));
    }
}
