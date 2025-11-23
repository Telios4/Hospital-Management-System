<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Akaunting\Sortable\Traits\Sortable;

class Speciality extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name'
    ];
    
    public $sortable = ['name']; // lowercase 's'

    public function practitioners(): HasMany
    {
        return $this->hasMany(Practitioner::class); // Singular
    }
    
    public function Subspecialities(): HasMany
    {
        return $this->hasMany(Subspeciality::class); // lowercase 'h', singular
    }
}