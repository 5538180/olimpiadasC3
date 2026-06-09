<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'ciclo_id',
        'nombre',
        'apellidos',
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

    public function isAdmin()
    {
        return $this->email === env('ADMIN_EMAIL');
    }

    public function isTutor($grupo = null)
    {
        return isset($grupo)
            ? ($this->id === $grupo->tutor)
            : (Grupo::where('tutor', $this->id)->exists());
    }
    /* * Metodos de relacion */
    
   public function puntuacion(): HasOne
    {
        return $this->hasOne(Puntuacion::class,'puntuacion_id');
    }


    /* * Metodo es participante */
    public function isParticipante($usuario = null)
    {
        if (isset($usuario)){
            return $this->id === Participante::where('id', $usuario->id)->exists();

        }


        

        /* return isset($grupo)
            ? ($this->id === $grupo->participantes) // ? trae muchos
            : (Grupo::where('tutor', $this->id)->exists()); */
    }


}
