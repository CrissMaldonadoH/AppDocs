<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tip_tipo_doc';
    public $timestamps = false;

    public function documentos(){
        return $this->hasMany(Documento::class,'id');
    }
}
