<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Parrainage extends Model
{
    use HasUuids;

    protected $fillable = [
        'parrain_id',
        'filleul_id',
        'filiere'
    ];
}
