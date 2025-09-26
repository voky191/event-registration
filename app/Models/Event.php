<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'date', 'capacity'];

    protected $appends = ['formatted_date', 'registration_allowed'];

    public function getFormattedDateAttribute(): string
    {
        return Carbon::parse($this->attributes['date'])->toFormattedDateString();
    }

    public function getRegistrationAllowedAttribute(): string
    {
        return $this->attributes['date'] > now();
    }

    public function registrations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Registration::class);
    }
}
