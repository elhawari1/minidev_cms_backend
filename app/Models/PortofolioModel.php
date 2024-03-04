<?php

namespace App\Models;

use App\Models\ServicesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortofolioModel extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    protected $primaryKey = 'id_portofolio';
    protected $fillable = ['id_service', 'image_portofolio', 'title_portofolio', 'date_start', 'date_end', 'description_portofolio', 'usercreate_portofolio', 'updateuser_portofolio'];
    public $timestamps = false;

    public function services()
    {
        return $this->belongsTo(ServicesModel::class, 'id_service', 'id_service');
    }

}
