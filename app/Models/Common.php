<?php

namespace App\Models;

use App\DB\Core\StringField;
use App\Models\Scopes\CurrencyScope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;

class Common extends Model
{
    use HasFactory;

    protected $fillable = ['details'];

    public function saveableFields(): array
    {
        return [
            'details' => StringField::new(),
        ];
    }

    public function jobpost(): HasMany
    {
        return $this->hasMany(JobPost::class);
    }

    public static function getAcadType()
    {
        return Common::whereIn('id', [41, 42, 43, 44, 45, 46, 47])->get();
    }

    public static function getCurrency()
    {
        return Common::whereIn('id', [48, 49, 50, 51, 52, 53, 54, 55])->get();
    }

    public static function getJobType()
    {
        return Common::whereIn('id', [56, 57, 58, 59, 60])->get();
    }
    public static function getJobPostStatus()
    {
        return Common::whereIn('id', [32, 33, 34, 35, 36, 37, 38, 39])->get();
    }

    public static function getUserRole()
    {
        return Common::whereIn('id', [18, 19, 20, 21, 22, 23, 24, 25, 26])->get();
    }





    // public function getAcadType(string $acad_Type)
    // {
    //     $acad_Type = DB::table('commons')
    //         ->whereIn('id', [41, 42, 43, 44, 45, 46, 47])
    //         ->select('details')
    //         ->get();
    //     return $acad_Type;
    // }
    // public function getCurrency(string $currency)
    // {
    //     $currency = DB::table('commons')
    //         ->whereIn('id', [48, 49, 50, 51, 52, 53, 54, 55])
    //         ->select('details')
    //         ->get();
    //     return $currency;
    // }
    // public function getJobType(string $job_Type)
    // {
    //     $job_Type = DB::table('commons')
    //         ->whereIn('id', [56, 57, 58, 59, 60])
    //         ->select('details')
    //         ->get();
    //     return $job_Type;
    // }




}
