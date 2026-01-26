<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class L1GI extends Model
{
    public $incrementing = false; // empêche l'auto-incrémentation
    protected $keyType = 'string'; // la clé primaire sera une string

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    protected $fillable = [
        'matricule',
        'nom',
        'telephone',
        'email',
    ];

    public function setTelephoneAttribute($value)
    {
        if ($value) {
            // Enlever les espaces
            $value = preg_replace('/\s+/', '', $value);

            // Si le numéro ne commence pas déjà par +225
            if (!str_starts_with($value, '+225')) {
                $value = '+225' . $value;
            }

            $this->attributes['telephone'] = $value;
        }
    }

    public function parrainage(){
        return $this->hasOne(Parrainage::class, 'filleul_id');
    }

}
