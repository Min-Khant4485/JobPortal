<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcadType extends Model
{
    use HasFactory;

    // public static function getAcadType($academic)
    // {
    //     $acadType = $academic->pluck('acad_types')->unique();
    //     $acadTypes = AcadType::whereIn('id', $acadType)->get();

    //     return $acadTypes;
    // }
    // public function academic(): HasMany
    // {
    //     return $this->hasMany(Academic::class);
    // }
}
