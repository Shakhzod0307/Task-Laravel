<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name','picture','short_description','full_description'];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
