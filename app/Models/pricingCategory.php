<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricingCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pricingCategory',
    ];


    public function pricingCategory()
    {
        return $this->belongTo(pricingCategory::class);
    }
}
