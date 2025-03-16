<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Process;

class DashboardController extends Controller
{

    public function getDashboardData()
    {
        $area = Area::all()->count();
        $process = Process::all()->count();

        return [
            'area' => $area,
            'process' => $process
        ];
    }
}
