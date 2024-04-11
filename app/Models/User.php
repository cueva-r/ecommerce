<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static function getSingle($id)
    {
        return User::find($id);
    }

    static public function getAdmin()
    {
        return User::select('users.*')
        ->where('es_admin', '=', 1)
        //->where('esta_eliminado', '=', 0)
        ->orderBy('id', 'desc')
        ->get();
    }

    static public function getClientes()
    {
        return User::select('users.*')
        ->where('es_admin', '=', 0)
        //->where('esta_eliminado', '=', 0)
        ->orderBy('id', 'desc')
        ->get();
    }

    static function checkEmail($email)
    {
        return User::select('users.*')
        ->where('email', '=', $email)
        ->first();
    }
}
