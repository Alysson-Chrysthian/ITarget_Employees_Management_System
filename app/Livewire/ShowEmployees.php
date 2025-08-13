<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowEmployees extends Component
{
    public function create()
    {
        return $this->redirect('/create');
    }

    #[Layout('components.layouts.main')]
    public function render()
    {
        $employees = Employee::all();

        return view('livewire.show-employees', [
            'employees' => $employees,
        ]);
    }
}
