<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VissionsModel extends Model
{
    use HasFactory;

    protected $table = 'vissions';
    protected $primaryKey = 'id_vission';
    protected $fillable = ['title_vission', 'description_vission', 'usercreate_vission', 'updateuser_vission'];
    public $timestamps = false;

}
