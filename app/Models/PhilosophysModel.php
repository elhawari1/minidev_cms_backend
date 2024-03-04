<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhilosophysModel extends Model
{
    use HasFactory;
    protected $table = 'philosophys';
    protected $primaryKey = 'id_philosophy';
    protected $fillable = ['title_philosophy', 'description_philosophy', 'usercreate_philosophy', 'updateuser_philosophy'];
    public $timestamps = false;

}
