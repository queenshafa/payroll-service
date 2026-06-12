<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'position',
        'salary',
        'join_date'
    ];

    public function salaries() {
        return $this->hasMany(Salary::class);
    }
}
