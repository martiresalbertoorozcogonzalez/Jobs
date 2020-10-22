<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = [
       'titulo','imagen','descripcion','skills','categoria_id','experiencia_id','ubicacion_id','salario_id'
    ];

    //realacion uno a uno categoria y vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //realacion uno a uno salario y vacante
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //realacion uno a uno ubicacion y vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    //realacion uno a uno categoria y vacante
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    //Relacion de uno a uno 
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
