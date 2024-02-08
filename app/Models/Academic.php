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
use Ramsey\Uuid\Type\Integer;

class Academic extends Model
{
    use HasFactory;

    protected $fillable = [
        'acad_type',
        'faculty',
        'acad_institue',
        'start_date',
        'end_date',
        'job_seeker_id'
    ];

    public function saveableFields(): array
    {
        return [
            'acad_type' => IntegerField::new(),
            'job_seeker_id' => IntegerField::new(),
            'faculty' => StringField::new(),
            'acad_institue' => StringField::new(),
            'start_date' => DateTimeField::new(),
            'end_date' => DateTimeField::new()
        ];
    }
    public static function getAcademicColumns()
    {
        $columns = DB::connection()->getSchemaBuilder()->getColumnListing('academics');
        return array_intersect($columns, [
            'id',
            'job_seeker_id',
            'acad_type',
            'faculty',
            'acad_institue',
            'start_date',
            'end_date'
        ]);
    }

    public function jobSeeker(): BelongsTo
    {
        return $this->belongsTo(JobSeeker::class);
    }
    public function academicType(): BelongsTo
    {
        return $this->belongsTo(AcadType::class);
    }
}
