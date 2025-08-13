<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowEmployees extends Component
{
    public $search = '';

    public function create()
    {
        return $this->redirect('/create');
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }
    
    public function modify($id)
    {
        //TODO
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
