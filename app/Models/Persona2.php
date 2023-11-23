<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona2 extends Model
{
    use HasFactory;

    protected $table="persona2";


    protected $fillable=[
      'nombre',
      'direccion',
      'telefono'
    ];

}
