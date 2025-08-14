<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEmployee extends Component
{
    public $name, $email, $cpf, $registration, $birthday, $street, $number, $linguee, $gender, $cep;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'cpf' => 'required|digits:11|numeric',
            'registration' => 'required|digits:7|numeric',
            'birthday' => 'required|date',
            'street' => 'required',
            'number' => 'required|numeric',
            'linguee' => 'required',
            'gender' => 'required|in:m,f',
            'cep' => 'required|digits:8|numeric', 
        ];
    }

    protected function validationAttributes()
    {
        return [
            'name' => 'nome',
            'registration' => 'matricula',
            'birthday' => 'data de nascimento',
            'street' => 'rua',
            'number' => 'numero',
            'linguee' => 'bairro',
            'gender' => 'sexo', 
        ];
    }

    public function store()
    {
        $this->validate();

        $response = Http::get('https://viacep.com.br/ws/' . $this->cep . '/json');
        $response = json_decode($response, true);

        if (isset($response['erro']))
            return $this->addError('cep', 'O CEP inserido nao existe');

        $employee = new Employee;

        $employee->name = $this->name;
        $employee->email = $this->email;
        $employee->cpf = $this->cpf;
        $employee->registration = $this->registration;
        $employee->birthday = $this->birthday;
        $employee->gender = $this->gender;
        $employee->street = $this->street;
        $employee->number = $this->number;
        $employee->linguee = $this->linguee;
        $employee->cep = $this->cep;
        
        $employee->save();

        $this->reset([
            'name',
            'email',
            'cpf',
            'registration',
            'birthday',
            'street',
            'number',
            'linguee',
            'gender',
            'cep'
        ]);

        session()->flash('message', 'funcionario cadastrado com sucesso');   
    }

    public function index()
    {
        return $this->redirect('/');
    }

    #[On('cep-input-filled')]
    public function fillLingueeByCEP()
    {
        $this->validateOnly('cep');

        $response = Http::get('https://viacep.com.br/ws/' . $this->cep . '/json');
        $response = json_decode($response, true);

        if (isset($response['erro']))
            return $this->addError('cep', 'O CEP inserido nao existe');

        if (!empty($response['bairro']))
            $this->linguee = $response['bairro'];
    }

    #[Layout('components.layouts.main')]
    public function render()
    {
        return view('livewire.add-employee');
    }
}
