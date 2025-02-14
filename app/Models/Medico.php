<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /** @use HasFactory<\Database\Factories\MedicoFactory> */
    use HasFactory;

    protected $fillable = ['nome', 'crm', 'especialidade'];

    public function scopeSearch(Builder $query, $request)
    {
        return $query->when($request, function (Builder $query, $request) {
            $query->where(function (Builder $query) use ($request) {
                $query->when($request->nome, fn(Builder $query, $nome) => $query->where('nome', 'like', '%' . $nome . '%'))
                    ->when($request->crm, fn(Builder $query, $crm) => $query->orWhere('crm', $crm ))
                    ->when($request->especialidade, fn(Builder $query, $especialidade) => $query->orWhere('especialidade', 'like', '%' . $especialidade . '%'));
            });
        });
    }
}
