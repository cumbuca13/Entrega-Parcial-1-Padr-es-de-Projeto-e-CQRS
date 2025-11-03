<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtendimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paciente_id' => 'sometimes|exists:pacientes,id',
            'dentista_id' => 'sometimes|exists:dentistas,id',
            'data' => 'sometimes|date',
            'descricao' => 'nullable|string',
            'status' => 'sometimes|in:Agendado,Concluído,Cancelado',
        ];
    }
}
