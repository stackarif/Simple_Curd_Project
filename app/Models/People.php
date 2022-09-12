<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class People extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function slug(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value),
            set: fn ($value) => Str::slug($value),
        );
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sub()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function level_three()
    {
        return $this->belongsTo(Level_three::class, 'level_three_id');
    }
}
