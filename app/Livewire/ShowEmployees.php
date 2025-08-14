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

    public function generatePaper()
    {
        $pdf = Pdf::loadView('pdfs.employees-paper', [
            'employees' => Employee::all(),
        ]);
        $pdf->setOption('defaultFont', 'sans-serif');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'relatorio.pdf');    
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
            ->paginate(10);

        return view('livewire.show-employees', [
            'employees' => $employees,
        ]);
    }
}
