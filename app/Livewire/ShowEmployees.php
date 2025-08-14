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

    public function generatePaper()
    {
        $pdf = Pdf::loadView('pdfs.employees-paper', [
            'employees' => Employee::all(),
        ]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOptions([
            'defaultFont' => 'sans-serif',
            'fontHeightRatio' => 0.8,

        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'relatorio.pdf');    
    }

    #[Layout('components.layouts.main')]
    public function render()
    {
        $employees = Employee::where($this->filter, 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.show-employees', [
            'employees' => $employees,
        ]);
    }
}
