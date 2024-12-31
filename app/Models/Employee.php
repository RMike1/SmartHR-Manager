<?php

namespace App\Models;

use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory, HasUlids;
    protected $guarded=[];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function jobtitle(){
        return $this->belongsTo(JobTitle::class,'job_title_id','id');
    }
}
