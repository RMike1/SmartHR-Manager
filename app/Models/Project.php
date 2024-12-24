<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Project extends Model
{
    use HasUlids;
    protected $guarded = [];
    protected $table = 'projects';
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
