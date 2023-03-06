<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\JuegoResource;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    protected $genero;

    public function __construct(Genero $genero)
    {
        $this->genero = $genero;
    }

    /**
     * @OA\Get(
     *   path="/api/juegos/generos/show/all",
     *   tags={"Generos"},
     *   summary="Obtener todos los generos",
     *   description="Muestra la información de todos los generos que se encuentran insertados en la base de datos.",
     *   operationId="getAllGeneros",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index()
    {
        $generos = Genero::orderBy('nombre', 'ASC')->get();
        return response()->json(GeneroResource::collection(($generos)), 200);
    }

    /**
     * @OA\Get(
     *   path="/api/juegos/generos/{slug}",
     *   tags={"Generos"},
     *   summary="Obtener los juegos de un genero",
     *   description="Muestra la información de los juegos que pertenece a un genero en especifico segun el valor del parametro slug.",
     *   operationId="getGenero",
     *   @OA\Parameter(
     *     name="slug",
     *     description="Url del nombre del genero",
     *     in="path",
     *     required=true, 
     *     @OA\Schema(
     *       type="string",
     *       example="carreras"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function show($slug)
    {
        $id_gen = $this->genero->findBySlug($slug);
        if (isset($id_gen['error'])) {
            return response()->json(['error' => 'Genero no encontrado'], 200);
        }
        return response()->json(JuegoResource::collection(($id_gen->juegables)), 200);
    }
}
