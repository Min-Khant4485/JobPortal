<?php

namespace App\Models;

use App\Models\Country;
use App\DB\Core\StringField;
use App\DB\Core\IntegerField;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function saveableFields(): array
    {
        return [
            'city_name' => StringField::new(),
            'country_id' => IntegerField::new(),
        ];
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class);
    }

    // public static function getCityColumns()
    // {
    //     $columns = DB::connection()->getSchemaBuilder()->getColumnListing('cities');
    //     return array_intersect($columns, ['id', 'city_name']);
    // }    

    /* protected static function booted()
    {
        Blade::directive('modelDropdown', function ($expression) {
            return "<?php echo app('App\View\DropdownGenerator')->generateDropdown($expression); ?>";
        });
    } */
}
