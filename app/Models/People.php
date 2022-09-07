<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class People extends Model
{
    use HasFactory;
    protected $guarded = [];


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
}
