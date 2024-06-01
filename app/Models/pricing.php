<?php

namespace App\Models;

use App\Models\pricingCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'pricingCategory_id','details', 'amount',
    ];


    public function pricingCategory()
    {
        return $this->belongTo(pricingCategory::class);
    }
}
