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
        return $this->redirect('/update/' . $id);
    }

    #[Layout('components.layouts.main')]
    public function render()
    {
        $employees = Employee::where('id', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('cpf', 'like', '%' . $this->search . '%')
            ->orWhere('cep', 'like', '%' . $this->search . '%')
            ->orWhere('street', 'like', '%' . $this->search . '%')
            ->orWhere('linguee', 'like', '%' . $this->search . '%')
            ->orWhere('registration', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.show-employees', [
            'employees' => $employees,
        ]);
    }
}
