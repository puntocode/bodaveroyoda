<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'respuestas' => 'array',
        'correctas' => 'array',
    ];

    public function setNombreAttribute($value){
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function getCreatedAtAttribute(){
        return date('d-m-Y H:i:s', strtotime($this->attributes['created_at']));
      }


}
