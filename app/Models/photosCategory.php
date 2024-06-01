<?php

namespace App\Models;

use App\Models\photo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photosCategory extends Model
{
    use HasFactory;

    protected $table = 'photosCategories';
    protected $fillable = [
        'photosCategory',
    ];

    public function photo ()
    {
        return $this->hasMany(photo::class);
    }
}
