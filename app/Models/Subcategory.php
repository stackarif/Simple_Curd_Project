<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function slug(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value),
            set: fn ($value) => Str::slug($value),
        );
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function level_three(): HasMany
    {
        return $this->hasMany(Level_three::class, 'subcategory_id', 'id');
    }

    public function peoples()
    {
        return $this->hasMany(People::class, 'subcategory_id');
    }

}
