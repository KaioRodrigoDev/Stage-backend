<?php

namespace App\Http\Controllers;

use App\Models\Subprocess;
use Illuminate\Http\Request;

class SubprocessController extends Controller
{
    public function createSubprocess(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'processId' => 'required|exists:processes,id'
        ]);


        Subprocess::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'process_id' => $request->input('processId'),
        ]);

        return response()->json(['message' => 'SubProcesso criado com sucesso']);
    }

    public function removeSubprocess(Request $request)
    {

        $subProcessId = $request->query('subProcessId');

        Subprocess::findOrFail($subProcessId)->delete();

        return response()->json(['message' => 'SubProcesso deletado com sucesso']);
    }
}
