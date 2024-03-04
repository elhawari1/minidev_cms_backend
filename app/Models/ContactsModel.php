<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactsModel extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $primaryKey = 'id_contacts';
    protected $fillable = ['phonenumber_contact', 'email_contact', 'usernameig_contact', 'usercreate_contacts', 'updateuser_contacts'];
    public $timestamps = false;

}
