<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Akaunting\Sortable\Traits\Sortable;
class Speciality extends Model
{
    use HasFactory,Sortable;

    protected $fillable = [
        'name'
    ];
    public $Sortable=['name'];

    public function practitioners():HasMany{
        return $this->hasMany(Practitioners::class);
    }
    public function subSpecialities():HasMany{
        return $this->hasMany(SubSpecialities::class);
    }
    
    

}