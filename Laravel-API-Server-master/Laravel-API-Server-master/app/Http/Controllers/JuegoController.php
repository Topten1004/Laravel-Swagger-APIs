<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Http\Resources\JuegoResource;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *    title="Laravel Api Juegos",
 *    version="1.0.1",
 *    description="Documentación de todos los endpoints de un aplicación que consiste en un CRUD de Juegos que contiene relaciones, donde se trabaja con el envió de archivos y también contiene filtros de búsqueda sobre resultados de los juegos que existen insertados, se puede registrar usuarios y también contiene autenticación por SANCTUM para poder realizar la acción de algunos endpoints.<br><br><a href='https://github.com/JAVI-CC/Laravel-API-Server' target='_blank'>https://github.com/JAVI-CC/Laravel-API-Server</a><br><br><a href='https://github.com/JAVI-CC/Laravel-API-Client' target='_blank'>https://github.com/JAVI-CC/Laravel-API-Client</a><br><br><a href='https://github.com/JAVI-CC/VUE3-API-client' target='_blank'>https://github.com/JAVI-CC/VUE3-API-client</a>",
 *  @OA\ExternalDocumentation(
 *    description="Mas informacion",
 *    url="https://github.com/JAVI-CC/Laravel-API-Server",
 *  ),
 * )
 */
class JuegoController extends Controller
{

    protected $juego;

    public function __construct(Juego $juego)
    {
        $this->juego = $juego;
    }


    /**
     * @OA\Get(
     *   path="/api/juegos",
     *   tags={"Juegos"},
     *   summary="Obtener todos los juegos",
     *   description="Muestra todos los registros de juegos en formato JSON",
     *   operationId="getAllJuegos",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index()
    {
        $juegos = Juego::orderBy('id', 'DESC')->get();
        return response()->json(JuegoResource::collection(($juegos)), 200);
    }

    /**
     * @OA\Get(
     *   path="/api/juegos/paginate",
     *   tags={"Juegos"},
     *   summary="Obtener los juegos por una paginación de X elementos",
     *   description="Muestra los juegos a través de una paginación",
     *   operationId="getPaginateJuegos",
     *   @OA\Parameter(
     *     name="page",
     *     description="Numero de la paginación",
     *     in="query",
     *     required=false, 
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
     *     ),
     *   ),
     *   @OA\Parameter(
     *    name="items",
     *    description="Numero de juegos por página",
     *    in="query",
     *    required=true, 
     *    @OA\Schema(
     *      type="integer",
     *        example="8"
     *      ),
     *   ),
     *   @OA\Parameter(
     *   name="order",
     *   description="ordenar paginación de juegos (no es obligatorio). Opciones: [nombreAsc, nombrDesc, fechaAsc, fechaDesc]",
     *   in="query",
     *   required=false, 
     *   @OA\Schema(
     *     type="string",
     *      example=""
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function paginate(Request $request)
    {
        switch($request->input('order')) {
            case 'nombreAsc':
                $juegos = Juego::orderBy('nombre', 'ASC')->paginate($request->input('items'));
                break;
            case 'nombreDesc':
                $juegos = Juego::orderBy('nombre', 'DESC')->paginate($request->input('items'));
                break;
            case 'fechaAsc':
                $juegos = Juego::orderBy('fecha', 'ASC')->paginate($request->input('items'));
                break;
            case 'fechaDesc':
                $juegos = Juego::orderBy('fecha', 'DESC')->paginate($request->input('items'));
                break;
            default:
                $juegos = Juego::orderBy('id', 'DESC')->paginate($request->input('items'));
                break;
        }

        return response()->json(JuegoResource::collection(($juegos)), 200);
    }

    /**
     * @OA\Get(
     *   path="/api/juegos/random",
     *   tags={"Juegos"},
     *   summary="Obtener una lista de X juegos aleatorios",
     *   description="Muestra el resultado de X juegos de forma aleatoria",
     *   operationId="getRandomJuegos",
     *   @OA\Parameter(
     *     name="items",
     *     description="Numero de juegos",
     *     in="query",
     *     required=true, 
     *     @OA\Schema(
     *       type="integer",
     *       example="6"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function random(Request $request)
    {
        $juegos = Juego::all()->random($request->input('items'));
        return response()->json(JuegoResource::collection(($juegos)), 200);
    }

    /**
     * @OA\Post(
     *   path="/api/juegos",
     *   tags={"Juegos"},
     *   summary="Insertar un juego",
     *   description="Insertar el registro de un juego nuevo con parametros.",
     *   operationId="addJuego",
     *   @OA\Parameter(
     *     name="Juego",
     *     in="query",
     *     required=true,
     *     description="{nombre, descripcion, desarrolladora, fecha, generos, imagen}",
     *     @OA\Schema(
     *       @OA\Property(property="nombre", ref="#/components/schemas/Juego/properties/nombre"),
     *       @OA\Property(property="descripcion", ref="#/components/schemas/Juego/properties/descripcion"),
     *       @OA\Property(property="desarrolladora", ref="#/components/schemas/Juego/properties/desarrolladora"),
     *       @OA\Property(property="imagen", ref="#/components/schemas/Juego/properties/imagen"),
     *       @OA\Property(property="fecha", ref="#/components/schemas/Juego/properties/fecha"),
     *       @OA\Property(property="generos[0]", type="string", example="accion"),
     *       @OA\Property(property="generos[1]", type="string", example="first-person-shooter"),
     *       @OA\Property(property="generos[2]", type="string", example="multijugador"),
     *     ),
     *   ),
     *   security={ * {"SANCTUM": {}}, * },
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=220, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(Request $request)
    {

        $validator = $this->juego->validation_add($request);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 220);
        } else {
            $juego = $this->juego->add_juego($request);
            return response()->json(new JuegoResource($juego), 201);
        }
    }

    /**
     * @OA\Get(
     *   path="/api/juegos/{slug}",
     *   tags={"Juegos"},
     *   summary="Obtener un juego",
     *   description="Muestra la información de un juego especifico segun el valor del parametro slug.",
     *   operationId="getJuego",
     *   @OA\Parameter(
     *     name="slug",
     *     description="Url del nombre del juego",
     *     in="path",
     *     required=true, 
     *     @OA\Schema(
     *       type="string",
     *       example="test123"
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
        $juego = Juego::WHERE('slug', $slug)->first();
        $juego = $this->juego->exists_slug($juego);
        if (isset($juego->original['error'])) {
            return $juego;
        }
        //return $juego;
        return response()->json(new JuegoResource($juego), 200);
    }


    /**
     * @OA\Post(
     *   path="/api/juegos/edit",
     *   tags={"Juegos"},
     *   summary="Actualizar un juego",
     *   description="Actulizar un juego ya existente",
     *   operationId="editJuego",
     *   @OA\Parameter(
     *     name="Juego",
     *     in="query",
     *     required=true,
     *     description="{nombre, descripcion, desarrolladora, fecha, generos, slug, imagen}",
     *     @OA\Schema(
     *       @OA\Property(property="nombre", ref="#/components/schemas/Juego/properties/nombre"),
     *       @OA\Property(property="descripcion", ref="#/components/schemas/Juego/properties/descripcion"),
     *       @OA\Property(property="desarrolladora", ref="#/components/schemas/Juego/properties/desarrolladora"),
     *       @OA\Property(property="imagen", ref="#/components/schemas/Juego/properties/imagen"),
     *       @OA\Property(property="fecha", ref="#/components/schemas/Juego/properties/fecha"),
     *       @OA\Property(property="generos[0]", type="string", example="aventura"),
     *       @OA\Property(property="generos[1]", type="string", example="rpg-de-accion"),
     *       @OA\Property(property="generos[2]", type="string", example="multijugador"),
     *       @OA\Property(property="slug", ref="#/components/schemas/Juego/properties/slug"),
     *     ),
     *   ),
     *   security={ * {"SANCTUM": {}}, * },
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=220, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(Request $request)
    {
        $juego = $this->juego->show_id($request->input('slug'));
        if (isset($juego->original['error'])) {
            return $juego;
        } else {
            $validator = $this->juego->validation_update($request, $juego->nombre);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 220);
            } else {
                $juego = $this->juego->exists_id_update($juego, $request);
                return response()->json(new JuegoResource($juego), 200);
            }
        }
    }

    /**
     * @OA\Delete(
     *   path="/api/juegos/delete/{slug}",
     *   tags={"Juegos"},
     *   summary="Eliminar un juego",
     *   description="Elimina un juego especifico segun el valor del parametro slug.",
     *   operationId="deleteJuego",
     *   @OA\Parameter(
     *     name="slug",
     *     description="Url del nombre del juego",
     *     in="path",
     *     required=true, 
     *     @OA\Schema(
     *       type="string",
     *       example="test123"
     *     ),
     *   ),
     *   security={ * {"SANCTUM": {}}, * },
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function delete($slug)
    {
        $id_juego = $this->juego->show_id($slug);
        $juego = $this->juego->exists_id_delete($id_juego);
        return $juego;
    }

    /**
     * @OA\Post(
     *   path="/api/juegos/filter/search",
     *   tags={"Juegos"},
     *   summary="Busqueda",
     *   description="Busqueda por nombres de juegos y también ordena el resultado de distintas maneras.",
     *   operationId="filterJuego",
     *   @OA\Parameter(
     *     name="search",
     *     description="Nombre del juego que quieres buscar",
     *     in="query",
     *     required=true, 
     *     @OA\Schema(
     *       type="string",
     *       example="dark"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="filter",
     *     description="Ordenar por diferente tipo. Ejemplos ['nombre', 'descripcion', 'fecha'] ",
     *     in="query",
     *     required=false, 
     *     @OA\Schema(
     *       type="string",
     *       example="fecha"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="order",
     *     description="ordenar de forma 'ASC' o 'DESC'",
     *     in="query",
     *     required=false, 
     *     @OA\Schema(
     *       type="string",
     *       example="DESC"
     *     ),
     *   ),
     * 
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=220, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function filter(Request $request)
    {
        $juegos = $this->juego->search($request);

        if (isset($juegos->original)) {
            return $juegos;
        } else {
            return response()->json(JuegoResource::collection(($juegos)), 200);
        }
    }
}
