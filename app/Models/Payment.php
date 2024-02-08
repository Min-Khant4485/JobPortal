<?php

namespace App\Models;

use App\DB\Core\DateTimeField;
use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_date',
        'payment_method',
        'amount',
        'transaction_no',
        'user_id'
    ];

    public function saveableFields(): array
    {
        return [
            'payment_date' => DateTimeField::new(),
            'payment_method' => IntegerField::new(),
            'amount' => IntegerField::new(),
            'transaction_no' => StringField::new(),
            'user_id' => IntegerField::new(),
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
