<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected function casts(): array
    {
        return [
            'birthday' => 'datetime:Y-m-d',
        ];
    }
}
