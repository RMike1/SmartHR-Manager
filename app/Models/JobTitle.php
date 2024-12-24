<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobTitle extends Model
{
    /** @use HasFactory<\Database\Factories\JobTitleFactory> */
    use HasFactory, HasUlids;
    protected $guarded = [];
    protected $table = 'job_titles';
    public function department(): BelongsTo{
        return $this->belongsTo(Department::class);
    }
    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
