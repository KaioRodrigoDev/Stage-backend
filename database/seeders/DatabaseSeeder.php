<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Area;
use App\Models\Process;
use App\Models\Subprocess;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('secret')
        ]);

        $area1 = Area::create(['name' => 'Área de Pessoas']);
        $area2 = Area::create(['name' => 'Área Administrativa']);

        $process1 = Process::create([
            'name' => 'Desligamento',
            'description' => 'Processo de desligamento de colaboradores.',
            'tools' => json_encode(['Sistema de folha de pagamento', 'Trello']),
            'documentation' => 'Procedimentos de desligamento, formulários de rescisão.'
        ]);
        $process2 = Process::create([
            'name' => 'Recrutamento e Seleção',
            'description' => 'Processo de recrutamento e seleção de candidatos.',
            'tools' => json_encode(['Trello', 'Notion']),
            'documentation' => 'Fluxo de recrutamento, guias de entrevista.'
        ]);

        $process3 = Process::create([
            'name' => 'Salario',
            'description' => 'Processo responsavel por pagamento salarial',
            'tools' => json_encode(['Nubank', 'Binance']),
            'documentation' => 'Fluxo de pagamento'
        ]);

        $area1->processes()->attach([$process2->id]);
        $area2->processes()->attach([$process1->id, $process2->id, $process3->id]);

        Subprocess::create([
            'name' => 'Definição de critérios de avaliação',
            'description' => 'Descricao de avaliação',
            'process_id' => $process2->id,
        ]);


        Subprocess::create([
            'name' => 'Notificação formal de desligamento',
            'description' => 'Descricao de desligamento',
            'process_id' => $process3->id,
        ]);

        Subprocess::create([
            'name' => 'Pagamento',
            'description' => 'Descricao de pagamento',
            'process_id' => $process3->id,
        ]);

    }


}
