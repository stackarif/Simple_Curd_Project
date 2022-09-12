<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function slug(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value),
            set: fn ($value) => Str::slug($value),
        );
    }

    function getRouteKeyName(){
        return 'slug';
    }

 
    public function sub_categories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function peoples(): HasMany
    {
        return $this->hasMany(People::class);
    }
}
