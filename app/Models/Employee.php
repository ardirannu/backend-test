<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function contract()
    {
        return $this->hasMany(Contract::class, 'employee_id', 'id');
    }
}
