<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['person_id', 'country_code', 'number'];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'foreign_key', 'person_id');
    }
}
