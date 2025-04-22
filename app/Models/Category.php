<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    /**
     * Get products for specific category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get contacts for specific category.
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
