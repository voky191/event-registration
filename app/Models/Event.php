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

    protected $appends = ['formatted_date'];

    public function getFormattedDateAttribute(): string
    {
        return Carbon::parse($this->attributes['date'])->toFormattedDateString();
    }

}
