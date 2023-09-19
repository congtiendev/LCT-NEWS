<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, \Illuminate\Database\Eloquent\SoftDeletes;
    protected $table = 'projects';
    //Thêm chủ đầu tư
    protected $fillable = [
        'project_name',
        'description',
        'address',
        'price',
        'area',
        'location',
        'room_count',
        'project_type_id',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
