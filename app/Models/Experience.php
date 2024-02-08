<?php

namespace App\Models;

use App\DB\Core\DateTimeField;
use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Experience extends Model
{
    use HasFactory;

    // protected $table = 'educations';

    protected $fillable = [
        'exp_title',
        'work_at',
        'exp_details',
        'start_date',
        'end_date',
    ];

    public function saveableFields(): array
    {
        return [
            'job_seeker_id' => IntegerField::new(),
            'exp_title' => StringField::new(),
            'work_at' => StringField::new(),
            'exp_details' => StringField::new(),
            'start_date' => DateTimeField::new(),
            'end_date' => DateTimeField::new(),
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jobSeeker(): BelongsTo
    {
        return $this->belongsTo(JobSeeker::class);
    }

   
}
