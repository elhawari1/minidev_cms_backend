<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannersModel extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $primaryKey = 'id_banner';
    protected $fillable = ['image_banner', 'title_banner', 'description_banner', 'usercreate_banner', 'updateuser_banner'];
    public $timestamps = false;

}
