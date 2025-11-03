<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atendimento;
use App\Models\Paciente;
use App\Models\Dentista;

class AtendimentoSeeder extends Seeder
{
    public function run(): void
    {
        $pacientes = Paciente::all();
        $dentistas = Dentista::all();

        foreach ($pacientes as $paciente) {
            foreach ($dentistas as $dentista) {
                Atendimento::create([
                    'paciente_id' => $paciente->id,
                    'dentista_id' => $dentista->id,
                    'data' => now()->addDays(rand(1, 30)),
                    'descricao' => 'Consulta de rotina',
                    'status' => 'Agendado'
                ]);
            }
        }
    }
}
