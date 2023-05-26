<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'published'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->tz('Europe/Kiev')->format('d-m-Y H:i');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->tz('Europe/Kiev')->format('d-m-Y H:i');
    }

    public function getPublishedAttribute($value)
    {
        return $value ? 'published' : 'not published';
    }
}
