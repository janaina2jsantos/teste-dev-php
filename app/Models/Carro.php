<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
   protected $table    = 'carros';
	protected $fillable = [
   	'id_marca', 'modelo', 'ano' 
   ];

   public function marca()
	{
	   return $this->hasOne(Marca::class, "id", "id_marca");
	}
}
