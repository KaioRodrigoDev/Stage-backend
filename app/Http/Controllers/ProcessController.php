<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;
use App\Models\Area;

class ProcessController extends Controller
{

    public function getAllProcesses(Request $request)
    {
        $process = Process::with('subprocesses')->get();

        return $process->toArray();
    }

    public function assignProcessToArea(Request $request)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'process_id' => 'required|exists:processes,id',
        ]);

        $area = Area::findOrFail($request->area_id);
        $process = Process::findOrFail($request->process_id);

        if ($area->processes()->where('process_id', $process->id)->exists()) {
            return response()->json(['message' => 'O processo já está atribuído a esta área.'], 400);
        }

        $area->processes()->attach($process->id);

        return response()->json(['message' => 'Processo atribuído com sucesso.']);
    }

    public function unassignProcessFromArea(Request $request)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'process_id' => 'required|exists:processes,id',
        ]);

        $area = Area::findOrFail($request->area_id);
        $process = Process::findOrFail($request->process_id);

        if (!$area->processes()->where('process_id', $process->id)->exists()) {
            return response()->json(['message' => 'O processo não está atribuído a esta área.'], 400);
        }

        $area->processes()->detach($process->id);

        return response()->json(['message' => 'Processo removido da área com sucesso.']);
    }

    public function createProcess(Request $request)
    {

        $request->validate([
            'name' => 'string',
            'description' => 'string',
        ]);


        Process::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'documentation' => $request->input('documentation')
        ]);

        return response()->json(['message' => 'Processo criado com sucesso']);
    }

    public function deleteProcess(Request $request)
    {


        $processId = $request->query('processId');

        Process::findOrFail($processId)->delete();
        return response()->json(['message' => 'Processo removido com sucesso']);
    }

    public function createTools(Request $request)
    {
        $request->validate([
            'processId' => 'required|exists:processes,id',
            'tools' => 'required|array',
        ]);

        $process = Process::findOrFail($request->input('processId'));


        $process->update([
            'tools' => json_encode($request->input('tools')),
        ]);

        return response()->json(['message' => 'Ferramentas atualizadas com sucesso!', 'tools' => $request->tools], 200);
    }

}
