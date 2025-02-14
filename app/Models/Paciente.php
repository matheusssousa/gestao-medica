<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /** @use HasFactory<\Database\Factories\PacienteFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'data_nascimento',
    ];

    protected $dates = [
        'data_nascimento',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function scopeSearch(Builder $query, $request)
    {
        return $query->when($request, function (Builder $query, $request) {
            $query->where(function (Builder $query) use ($request) {
                $query->when($request->nome, fn(Builder $query, $nome) => $query->where('nome', 'like', '%' . $nome . '%'))
                    ->when($request->cpf, fn(Builder $query, $cpf) => $query->orWhere('cpf', 'like', '%' . $cpf . '%'))
                    ->when($request->email, fn(Builder $query, $email) => $query->orWhere('email', 'like', '%' . $email . '%'));
            });
        });
    }
}
