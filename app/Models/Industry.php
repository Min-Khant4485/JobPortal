<?php

namespace App\Models;

use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Blade;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry_name'
    ];

    public function saveableFields(): array
    {
        return [
            'industry_name' => StringField::new(),
        ];
    }

    public function employers(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /* protected static function booted()
    {
        parent::boot();

        $industries = Industry::all();
        $employer = new Employer();
        foreach ($industries as $industry) {
            if (request('industry_name') == $industry->industry_name) {
                $employer->industry->id = $industry->id;
                break;
            }
        }
        /*  Blade::directive('modelDropdown', function ($expression) {
            return "<?php echo app('App\View\DropdownGenerator')->generateDropdown($expression); ?>";
        });
    }*/
}
