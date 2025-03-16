<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subprocess extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'process_id', 'description'];

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

}
