<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesModel extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'id_service';
    protected $fillable = ['name_service', 'usercreate_services', 'updateuser_services'];
    public $timestamps = false;

}
