<?php

namespace App\Models;

use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;


class Employer extends Model
{
    use HasFactory;

    // protected $table = 'employers';

    protected $fillable = [
        'company_name',
        'company_description',
        'num_of_employee',
        'industry_id',
        'user_id'
    ];

    public function saveableFields(): array
    {
        return [
            'company_name' => StringField::new(),
            'company_description' => StringField::new(),
            'num_of_employee' => StringField::new(),
            'industry_id' => IntegerField::new(),
            'user_id' => IntegerField::new()
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }
    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class);
    }


    public function payments(): HasMany

    {
        return $this->hasMany(Payment::class);
    }
}
