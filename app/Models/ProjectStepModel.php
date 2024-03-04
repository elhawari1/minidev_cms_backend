<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStepModel extends Model
{
    use HasFactory;
    protected $table = 'project_step';
    protected $primaryKey = 'id_projectstep';
    protected $fillable = ['image_projectstep', 'name_projectstep', 'usercreate_projectstep', 'userupdate_projectstep'];
    public $timestamps = false;

}

