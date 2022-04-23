<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','employe_id','designation','country','state','city','mobile','gender','image'];

    public function employe_details()
    {
        return $this->hasOne('App\Models\employe', 'id','employe_id');
    }
}
