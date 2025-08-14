<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'cep',
        'cpf',
        'registration',
        'birthday',
        'street',
        'gender',
        'number',
        'linguee',
    ];

    protected function casts(): array
    {
        return [
            'birthday' => 'datetime:Y-m-d',
        ];
    }
}
