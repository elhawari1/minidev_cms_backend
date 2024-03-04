<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalsModel extends Model
{
    use HasFactory;
    protected $table = 'goals';
    protected $primaryKey = 'id_goals';
    protected $fillable = ['title_goals', 'description_goals', 'usercreate_goals', 'updateuser_goals'];
    public $timestamps = false;

}
