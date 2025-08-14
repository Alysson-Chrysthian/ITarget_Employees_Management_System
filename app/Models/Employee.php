<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

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
