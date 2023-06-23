<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'doc_documento';
    public $timestamps = false;

    //Relacionar Bases de datos
    public function procesos(){
        return $this->belongsTo(Proceso::class,'DOC_ID_PROCESO');
    }
}
