<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function getAllAreas()
    {
        $areas = Area::with('processes')->get();

        return $areas->toArray();
    }

    public function getAreaByUser(Request $request)
    {

        $area = Area::with('processes')->get();

        return $area->toArray();
    }

    public function createArea(Request $request)
    {
        $area = Area::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $area->save();

        return response()->json(['message' => 'Area Criada com sucesso', 'area' => $area], 200);
    }

    public function removeArea(Request $request)
    {
        $areaId = $request->query('area_id');

        if (!$areaId || !Area::where('id', $areaId)->exists()) {
            return response()->json(['message' => 'Área não encontrada'], 404);
        }

        Area::destroy($areaId);

        return response()->json(['message' => 'Área excluída com sucesso'], 200);
    }

}
