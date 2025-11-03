<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtendimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paciente_id' => 'required|exists:pacientes,id',
            'dentista_id' => 'required|exists:dentistas,id',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
            'status' => 'nullable|in:Agendado,Concluído,Cancelado',
        ];
    }
}
