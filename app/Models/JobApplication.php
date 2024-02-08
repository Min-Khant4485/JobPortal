<?php

namespace App\Models;

use App\DB\Core\IntegerField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    // protected $table = 'job_applications';

    protected $fillable = [
        'appl_status',
        'job_post_id',
        'user_id'
    ];

    public function saveableFields(): array
    {
        return [
            'job_post_id' => IntegerField::new(),
            'appl_status' => IntegerField::new(),
            'user_id' => IntegerField::new()
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jobPost(): BelongsTo
    {
        return $this->belongsTo(JobPost::class);
    }
}
