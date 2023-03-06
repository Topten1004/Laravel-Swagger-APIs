<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFind;
use App\Traits\HasSlug;

/**
 * @OA\Schema(
 *   @OA\Xml(name="Genero"),
 *   @OA\Property(property="nombre", description="Nombre del genero", type="string", example="Rpg de Acción"),
 *   @OA\Property(property="slug", type="string", description="Url amigable del nombre del genero", example="rpg-de-accion")
 * )
 **/
class Genero extends Model
{
    use HasFind, HasSlug;

    public $timestamps = false;
    protected $fillable = ['nombre', 'slug'];
    
    //Relacion de muchos a muchos polimorfica
    public function juegables()
    {
        return $this->morphToMany(Juego::class, 'juegable');
    }

    public function search_genero($juegos, $nombre)
    {
        $generos = $this->findByNombre($nombre);
        if(!isset($generos['error'])){
          $generos = $generos->juegables;
          $juegos = $juegos->merge($generos);
          return $juegos;
        }

        return $juegos;
    }

}
