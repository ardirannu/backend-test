<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
