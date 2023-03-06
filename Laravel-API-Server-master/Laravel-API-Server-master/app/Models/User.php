<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Schema(
 *   @OA\Xml(name="User"),
 *   @OA\Property(property="name", description="Nombre del usuario", type="string", example="prueba"),
 *   @OA\Property(property="email", description="Email del usuario", type="string", example="prueba@email.com"),
 *   @OA\Property(property="password", description="Password del usuario", type="string", example="12345678"),
 * )
 * 
 **/
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function validation_register($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        return $validator;
    }

    public function validation_login($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);

        return $validator;
    }

    public function add_register($request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email')
        ]);

        //$request->headers->set('Authorization', 'Bearer '.$user->createToken('API Token')->plainTextToken);
        return ['token' => 'Bearer '.$user->createToken('API Token')->plainTextToken, 'name' => $request->input('name'), 'email' => $request->input('email')];
    }

    public function login($request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return ['error' => 'Las credenciales no són correctas'];
        }

        return ['token' => 'Bearer '.auth()->user()->createToken('API Token')->plainTextToken, 'name' => auth()->user()->name, 'email' => auth()->user()->email];
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return ['message' => 'Tokens Revoked'];
    }

    public function deleteUser($user, $nombre)
    {
        $user->tokens()->delete();
        $user->delete();
        return response()->json(['message' => 'El usuario ' . $nombre . ' se ha eliminado correctamente'], 200);
    }
    
}
