<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\ProjectCategory;
use App\Enums\ProjectPriority;
use App\Enums\ProjectNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Project extends Model
{
    use HasUlids;
    protected $guarder=[];
    protected $table = 'projects';
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'notification' => ProjectNotification::class,
        'project_priority'=>ProjectPriority::class,
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function category(){
        return $this->belongsTo(ProjectCategory::class,'category_id','id');
    }
}
