<?php

namespace App\Livewire;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEmployees extends Component
{
    use WithPagination;

    public $search = '', $filter = 'id';

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
        $employees = Employee::where($this->filter, 'ilike', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.show-employees', [
            'employees' => $employees,
        ]);
    }
}
