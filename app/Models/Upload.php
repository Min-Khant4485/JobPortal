<?php

namespace App\Models;

use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_id',
        'genre',
        'upload_url',
    ];

    public function saveableFields(): array
    {
        return [
            'link_id' => IntegerField::new(),
            'genre' => StringField::new(),
            'upload_url' => StringField::new(),
            'upload_cv' => StringField::new(),

        ];
    }
}
