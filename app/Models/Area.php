<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Process;
use App\Models\User;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function processes()
    {
        return $this->belongsToMany(Process::class, 'area_process');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'area_user');
    }
}

