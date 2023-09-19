<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory, \Illuminate\Database\Eloquent\SoftDeletes;
    protected $table = 'project_types';
    protected $fillable = [
        'project_type_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
