<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\DB\Core\DateTimeField;
use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use App\Http\Traits\CommonTrait;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CommonTrait;

    // protected $table = 'users';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone_no',
        'email',
        'dob',
        'password',
        'join_date',
        'resign_date',
        'role',
        'status',

    ];

    public function saveableFields(): array
    {
        return [
            'first_name' => StringField::new(),
            'middle_name' => StringField::new(),
            'last_name' => StringField::new(),
            'phone_no' => StringField::new(),
            'email' => StringField::new(),
            'dob' => DateTimeField::new(),
            'password' => StringField::new(),
            'join_date' => DateTimeField::new(),
            'resign_date' => DateTimeField::new(),
            'role' => StringField::new(),
            'status' => IntegerField::new(),

        ];
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function jobPost(): HasMany
    {
        return $this->hasMany(JobPost::class);
    }

    public function employer(): HasOne
    {
        return $this->hasOne(Employer::class);
    }



    public function academics(): HasMany

    {
        return $this->hasMany(Academic::class);
    }

    // public function experiences(): HasMany
    // {
    //     return $this->hasMany(Experience::class);
    // }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function skillsSet(): HasMany
    {
        return $this->hasMany(SkillsSet::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function jobSeeker(): HasOne
    {
        return $this->hasOne(JobSeeker::class);
    }

    // public function isEmployer()
    // {

    //     if ($this->getCommons('Employer') === User::getRole()) {
    //         return true;
    //     }

    //     return false;
    // }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            if (!is_null($user->company_name)) {
                $user->role = 'Employer';
            }
        });
    }

    public static function isAdmin()
    {
        $userid = auth()->user()->id;
        $userDetails = User::find($userid);
        if ($userDetails['role'] == Config::get('role.system_admin')) {
            return true;
        }
        return false;
    }

    public static function isJobSeeker()
    {
        $userid = auth()->user()->id;
        $userDetails = User::find($userid);
        if ($userDetails['role'] == Config::get('role.jobseeker')) {
            return true;
        }
        return false;
    }
    public static function isEmployer()
    {
        $userid = auth()->user()->id;
        $userDetails = User::find($userid);
        if ($userDetails['role'] == Config::get('role.employer')) {
            return true;
        }
        return false;
    }
}
