<?php

namespace App\Models;

use App\DB\Core\StringField;
use App\Models\City;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    use HasFactory;

    // protected $table = 'countries';

    protected $fillable = [
        'country_name'
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function saveableFields(): array
    {
        return [
            'country_name' => StringField::new(),
        ];
    }

    // public static function getCountryColumns()
    // {
    //     $columns = DB::connection()->getSchemaBuilder()->getColumnListing('countries');
    //     return array_intersect($columns, ['id', 'country_name']);
    // }    

    /* protected static function booted()
    {
        Blade::directive('modelDropdown', function ($expression) {
            return "<?php echo app('App\View\DropdownGenerator')->generateDropdown($expression); ?>";
        });
    } */
}
