<?php

namespace App\Models;

use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'path'
    ];

    public function saveableFields(): array
    {
        return [
            'title' => StringField::new(),
            'path' => StringField::new(),
        ];
    }
}
