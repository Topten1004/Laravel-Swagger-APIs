<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFind;
use App\Traits\HasSlug;

/**
 * @OA\Schema(
 *   @OA\Xml(name="Desarrolladora"),
 *   @OA\Property(property="nombre", description="Nombre de la desarrolladora", type="string", example="Test123 Studios"),
 *   @OA\Property(property="slug", type="string", description="Url amigable del nombre de la desarrolladora", example="test123-studios")
 * )
 **/
class Desarrolladora extends Model
{
    use HasFind, HasSlug;

    public $timestamps = false;
    protected $fillable = ['nombre', 'slug'];

    //Relacion de muchos a muchos polimorfica
    public function juegables()
    {
        return $this->morphToMany(Juego::class, 'juegable');
    }

    public function showNames()
    {
        $desarrolladoras = Desarrolladora::select('nombre')->orderBy('nombre', 'ASC')->get()->toArray();
        $array = array_column($desarrolladoras, 'nombre');
        return $array;
    }

    public function similar_name($compare, $percentage = 75)
    {
        $data = $this->showNames();
        foreach ($data as $key => $value) {
            if (similar_text(strtolower($value), strtolower($compare), $calculated_percentage)) {
                if ($percentage <= $calculated_percentage) {
                    $value = Desarrolladora::select('id')->where('nombre', $value)->first();
                    return $value;
                    continue;
                }
            }
        }

        //En caso de que el nombre de la desarrolladora no coincida con ningún otro nombre
        $slug = $this->sluggable($compare);
        $des = Desarrolladora::create(['nombre' => $compare, 'slug' => $slug]);
        return $des;
    }

    public function search_desarrolladora($juegos, $nombre)
    {
        $desarrolladoras = $this->findByNombre($nombre);

        if(!isset($desarrolladoras['error'])){
          $desarrolladoras = $desarrolladoras->juegables;
          $juegos = $juegos->merge($desarrolladoras);
          return $juegos;
        }
        
        return $juegos;
    }

}
