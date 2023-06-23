<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    protected $table = 'pro_proceso';
    public $timestamps = false;

    public function documentos(){
        return $this->hasMany(Documento::class,'id');
    }
}
