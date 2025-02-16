<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    /** @use HasFactory<\Database\Factories\AtendimentoFactory> */
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'data_atendimento',
    ];

    protected $dates = [
        'data_atendimento',
    ];

    protected $casts = [
        'data_atendimento' => 'date',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function scopeSearch(Builder $query, $request)
    {
        return $query->when($request, function (Builder $query, $request) {
            $query->where(function (Builder $query) use ($request) {
                $query->when($request->medico, fn(Builder $query, $medico) => $query->where('medico_id', $medico))
                    ->when($request->paciente, fn(Builder $query, $paciente) => $query->where('paciente_id', $paciente))
                    ->when($request->data_inicio && $request->data_fim, fn(Builder $query) => $query->whereBetween('data_atendimento', [$request->data_inicio, $request->data_fim]));
            });
        });
    }
}
