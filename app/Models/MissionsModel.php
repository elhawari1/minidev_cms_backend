<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionsModel extends Model
{
    use HasFactory;
    protected $table = 'missions';
    protected $primaryKey = 'id_mission';
    protected $fillable = ['title_mission', 'description_mission', 'usercreate_mission', 'updateuser_mission'];
    public $timestamps = false;

}
