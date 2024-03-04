<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutsModel extends Model
{
    use HasFactory;

    protected $table = 'abouts';
    protected $primaryKey = 'id_about';
    protected $fillable = ['title_about', 'description_about', 'usercreate_about', 'updateuser_about'];
    public $timestamps = false;

}
