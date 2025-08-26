<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateEmployees extends Component
{
    public Employee $employee;
    public array $employee_attr;

    public function mount()
    {
        $this->employee_attr = $this->employee->toArray();
    }

        protected function rules()
    {
        return [
            'employee_attr.name' => 'required',
            'employee_attr.email' => 'required|email',
            'employee_attr.cpf' => 'required|size:14|string|regex:#^([0-9]{3})\.([0-9]{3})\.([0-9]{3})\-([0-9]{2})$#',
            'employee_attr.registration' => 'required|digits:7|numeric',
            'employee_attr.birthday' => 'required|date',
            'employee_attr.street' => 'required',
            'employee_attr.number' => 'required|numeric',
            'employee_attr.linguee' => 'required',
            'employee_attr.gender' => 'required|in:m,f',
            'employee_attr.cep' => 'required|size:9|string|regex:#^([0-9]{5})\-([0-9]{3})$#', 
        ];
    }

    protected function validationAttributes()
    {
        return [
            'employee_attr.name' => 'nome',
            'employee_attr.registration' => 'matricula',
            'employee_attr.birthday' => 'data de nascimento',
            'employee_attr.street' => 'rua',
            'employee_attr.number' => 'numero',
            'employee_attr.linguee' => 'bairro',
            'employee_attr.gender' => 'sexo', 
        ];
    }

    public function update()
    {
        $this->validate();

        $this->employee_attr['cep'] = str_replace('-', '', $this->employee_attr['cep']);
        $this->employee_attr['cpf'] = str_replace(['-', '.'], '', $this->employee_attr['cpf']);

        $response = Http::get('https://viacep.com.br/ws/' . $this->employee_attr['cep'] . '/json');
        $response = json_decode($response, true);

        if (isset($response['erro']))
            return $this->addError('employee_attr.cep', 'O CEP inserido nao existe');

        $this->employee->update($this->employee_attr);

        session()->flash('message', 'funcionario atualizado com sucesso');
    }

    #[On('cep-input-filled')]
    public function fillLingueeByCEP()
    {
        $this->validateOnly('employee_attr.cep');

        $response = Http::get('https://viacep.com.br/ws/' . $this->employee_attr['cep'] . '/json');
        $response = json_decode($response, true);

        if (isset($response['erro']))
            return $this->addError('employee_attr.cep', 'O CEP inserido nao existe');

        if (!empty($response['bairro']))
            $this->employee_attr['linguee'] = $response['bairro'];
    }

    public function index()
    {
        return $this->redirect('/');
    }

    #[Layout('components.layouts.main')]
    public function render()
    {
        return view('livewire.update-employees');
    }
}
