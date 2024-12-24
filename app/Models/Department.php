<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory, HasUlids;
    protected $guarded=[];
    public function jobtitle(): HasMany{
        return $this->hasMany(JobTitle::class);
    }
    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
