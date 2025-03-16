<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area; // Ensure that the Area class exists in this namespace or correct the namespace if different
use App\Models\Subprocess;
use App\Models\User;

class Process extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'description',
        'tools',
        'documentation',
    ];

    protected $casts = [
        'tools' => 'array',
    ];

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function subprocesses()
    {
        return $this->hasMany(Subprocess::class);
    }

}
