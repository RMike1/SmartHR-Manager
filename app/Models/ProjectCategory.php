<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectCategoryFactory> */
    use HasFactory , HasUlids;
    protected $guarded=[];

    protected $table = 'project_categories';
}
